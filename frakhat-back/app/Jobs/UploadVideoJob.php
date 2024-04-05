<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Modules\Video\Database\Models\Video;

class UploadVideoJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $video;
    protected $filePath;

    public function __construct(Video $video, $filePath)
    {
        $this->video = $video;
        $this->filePath = $filePath;
    }

    public function handle()
    {
        try {
            // Get the MIME type of the file
            $mime_type = Storage::disk('local')->mimeType($this->filePath);

            // Get the size of the file
            $size = Storage::disk('local')->size($this->filePath);

            // Set the URL for the video
            $url = '';

            // Store the file in chunks
            $chunk_size = 1024 * 1024 * 5; // 5 MB
            $handle = fopen(Storage::path($this->filePath), 'rb');
            $i = 0;

            while (!feof($handle)) {
                $chunk = fread($handle, $chunk_size);
                $encrypted_chunk = encrypt($chunk);
                Storage::disk('local')->put("temp/{$i}.enc", $encrypted_chunk);
                $i++;
            }

            fclose($handle);

            // Merge the chunks and store the video file
            $merged_file = '';

            for ($j = 0; $j < $i; $j++) {
                $encrypted_contents = Storage::disk('local')->get("temp/{$j}.enc");
                if ($encrypted_contents === false) {
                    throw new \Exception('Failed to retrieve encrypted file chunk');
                }

                $decrypted_contents = decrypt($encrypted_contents);
                if ($decrypted_contents === false) {
                    throw new \Exception('Failed to decrypt file chunk');
                }

                $merged_file .= $decrypted_contents;
                Storage::disk('local')->delete("temp/{$j}.enc");
            }

            $url = Storage::disk('public')->put("videos/{$this->video->id}", $merged_file);

            // Update the video record with the URL, MIME type, and size
            $this->video->url = Storage::url("videos/{$this->video->id}");
            $this->video->mime_type = $mime_type;
            $this->video->size = $size;
            $this->video->save();
        } catch (\Exception $e) {
            // Log the error and re-queue the job
            \Log::error('Error uploading video: ' . $e->getMessage());
            $this->release(30);
        }
    }
}

<?php

namespace App\Services\Uploader;

use App\Jobs\UploadVideoJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Modules\Video\Database\Models\Video;
//FileUploader
class VideoUploader
{
    protected $request;
    protected $video;
    protected $storage;
    //post 50 m , course 500 m

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->video = new Video();
        $this->storage = Storage::disk('public');
    }

    public function upload()
    {
        $this->video->filename = $this->request->file('video')->getClientOriginalName();
        $this->video->size = $this->request->file('video')->getSize();
        $this->video->save();

        $chunkSize = 1024 * 1024 * 10; // 10MB chunks
        $chunks = ceil($this->video->size / $chunkSize);

        for ($i = 0; $i < $chunks; $i++) {
            $startByte = $i * $chunkSize;
            $endByte = min(($i + 1) * $chunkSize, $this->video->size);
            $chunk = $this->request->file('video')->get($startByte, $endByte - $startByte);

            UploadVideoJob::dispatch($this->video, $chunk, $i, $chunks)->onQueue('video-upload');
        }
    }
}

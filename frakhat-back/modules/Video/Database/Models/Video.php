<?php

namespace Modules\Video\Database\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $fillable=['videoable_id', 'videoable_type', 'size', 'mime_type'];
    protected $hidden = ['url'];
    public function videoable()
    {
        return $this->morphTo();
    }
}


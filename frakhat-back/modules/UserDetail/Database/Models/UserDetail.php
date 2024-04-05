<?php

namespace Modules\UserDetail\Database\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Image\Database\Models\Image;

class UserDetail extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::Class);
    }
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

}

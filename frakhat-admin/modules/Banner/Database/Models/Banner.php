<?php

namespace Modules\Banner\Database\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Category\Database\Models\CategoryTranslation;
use Modules\Post\Database\Models\PostTranslation;
use Modules\Tag\Database\Models\TagTranslation;

class Banner extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::Class);
    }

}

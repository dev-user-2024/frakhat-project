<?php

namespace Modules\Language\Database\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Category\Database\Models\CategoryTranslation;
use Modules\Post\Database\Models\PostTranslation;
use Modules\Tag\Database\Models\TagTranslation;

class Language extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable=['title', 'user_id', 'code'];

    public function user()
    {
        return $this->belongsTo(User::Class);
    }
    public function categoryTranslations()
    {
        return $this->hasMany(CategoryTranslation::Class);
    }
    public function tagTranslations()
    {
        return $this->hasMany(TagTranslation::Class);
    }
    public function postTranslations()
    {
        return $this->hasMany(PostTranslation::Class);
    }
}

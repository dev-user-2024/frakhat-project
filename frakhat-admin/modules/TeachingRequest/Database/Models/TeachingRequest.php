<?php

namespace Modules\TeachingRequest\Database\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Category\Database\Models\CategoryTranslation;
use Modules\Post\Database\Models\PostTranslation;
use Modules\Tag\Database\Models\TagTranslation;

class TeachingRequest extends Model
{
    use HasFactory;
    protected $fillable=['subject', 'user_id', 'message', 'status'];

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

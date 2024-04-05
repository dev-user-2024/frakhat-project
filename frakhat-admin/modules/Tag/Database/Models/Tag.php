<?php

namespace Modules\Tag\Database\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Post\Database\Models\Post;

class Tag extends Model
{
    use HasFactory;
    protected $fillable=['user_id'];

    public function posts()
    {
        return $this->morphedByMany(Post::class, 'taggable');
    }
    public function user()
    {
        return $this->belongsTo(User::Class);
    }
    public function tagTranslations()
    {
        return $this->hasMany(TagTranslation::Class);
    }
    protected static function booted()
    {
        static::deleting(function ($tag) {
            $tag->tagTranslations()->delete();
        });
    }
}

<?php

namespace Modules\Post\Database\Models;

use App\Models\User;
use Hashids\Hashids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Category\Database\Models\Category;
use Modules\Comment\Database\Models\Comment;
use Modules\Image\Database\Models\Image;
use Modules\Like\Database\Models\Like;
use Modules\Tag\Database\Models\Tag;
use Illuminate\Support\Str;
use Modules\Video\Database\Models\Video;


class Post extends Model
{
    use HasFactory;
    protected $fillable=['type', 'user_id', 'status', 'image', 'short_link', 'url', 'code'];

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
    public function categories()
    {
        return $this->morphToMany(Category::class, 'categoryable');
    }
    public function user()
    {
        return $this->belongsTo(User::Class);
    }
    public function images()
    {
        return $this->hasMany(Image::class, 'imageable_id');
    }
    public function videos()
    {
        return $this->hasMany(Video::class, 'videoable_id');
    }
    public function postTranslations()
    {
        return $this->hasMany(PostTranslation::Class);
    }

    public static function createShortLink($url)
    {
        $hashids = new Hashids('shortlink', 6);
        return $hashids->encode(time());
    }

    public static function getUrlFromCode($code)
    {
        $link = self::where('code', $code)->first();
        if ($link) {
            return $link->url;
        }
        return null;
    }
    public static function generateShortLink()
    {
        do {
            $shortLink = Str::random(10);
        } while (self::where('short_link', $shortLink)->exists());

        return $shortLink;
    }

}

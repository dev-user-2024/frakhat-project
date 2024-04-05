<?php

namespace Modules\Post\Database\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Language\Database\Models\Language;
use Modules\Post\Database\Models\Post;

class PostTranslation extends Model
{
    use HasFactory;
    protected $fillable=['post_id', 'language_id', 'title', 'slug', 'content', 'summary'];

    public function post()
    {
        return $this->belongsTo(Post::Class);
    }
    public function language()
    {
        return $this->belongsTo(Language::Class);
    }
}

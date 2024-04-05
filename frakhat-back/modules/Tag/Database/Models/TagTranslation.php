<?php

namespace Modules\Tag\Database\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Language\Database\Models\Language;

class TagTranslation extends Model
{
    use HasFactory;
    protected $fillable=['tag_id', 'language_id', 'title', 'slug'];

    public function tag()
    {
        return $this->belongsTo(Tag::Class);
    }
    public function language()
    {
        return $this->belongsTo(Language::Class);
    }
}

<?php

namespace Modules\Category\Database\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Language\Database\Models\Language;

class CategoryTranslation extends Model
{
    use HasFactory;
    protected $fillable=['category_id', 'language_id', 'title', 'slug'];

    public function category()
    {
        return $this->belongsTo(Category::Class);
    }
    public function language()
    {
        return $this->belongsTo(Language::Class);
    }
}

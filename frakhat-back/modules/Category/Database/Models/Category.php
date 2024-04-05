<?php

namespace Modules\Category\Database\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Discount\Database\Models\Discount;
use Modules\Discount\Database\Models\DiscountMarketer;
use Modules\Post\Database\Models\Post;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['user_id', 'parent_id', 'categoryable_type'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($category) {
            // Check if the category has any children
            if ($category->children()->count() > 0) {
                throw new \Exception('Cannot delete category with children');
            }
        });
    }


    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function posts()
    {
        return $this->morphedByMany(Post::class, 'taggable');
    }
    public function categoryTranslations()
    {
        return $this->hasMany(CategoryTranslation::Class);
    }
    public function user()
    {
        return $this->belongsTo(User::Class);
    }
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

}

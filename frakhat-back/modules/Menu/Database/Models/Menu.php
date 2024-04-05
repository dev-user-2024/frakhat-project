<?php

namespace Modules\Menu\Database\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Category\Database\Models\Category;


class Menu extends Model
{
    use HasFactory;
    protected $fillable=['position', 'user_id', 'category_id'];

    public function user()
    {
        return $this->belongsTo(User::Class);
    }
    public function category()
    {
        return $this->belongsTo(Category::Class);
    }

}

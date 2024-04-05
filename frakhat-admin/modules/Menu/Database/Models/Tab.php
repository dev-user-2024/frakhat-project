<?php

namespace Modules\Menu\Database\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Lang;
use Modules\Category\Database\Models\Category;

class Tab extends Model
{
    use HasFactory;
    protected $fillable=['position', 'user_id', 'section_id', 'category_id', 'type'];

    public function getTypeAttribute($value)
    {
        return config('menu_config.'.$value);
    }
    public function getPositionAttribute($value)
    {
        return config('menu_config.'.strval($value));
    }

    public function user()
    {
        return $this->belongsTo(User::Class);
    }
    public function section()
    {
        return $this->belongsTo(Section::Class);
    }
    public function category()
    {
        return $this->belongsTo(Category::Class);
    }
}

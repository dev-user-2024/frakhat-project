<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Discount\Database\Models\Discount;

class CourseCategory extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function courses()
    {
        return $this->hasMany(Course::class, 'course_category_id');
    }
    public function discounts()
    {
        return $this->hasMany(Discount::class, 'type_id');
    }
}

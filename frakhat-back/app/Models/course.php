<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Modules\CartItem\Database\Models\License;
use Modules\Discount\Database\Models\Discount;
use Modules\Discount\Database\Models\DiscountUsage;
use Modules\CartItem\Database\Models\Order;

class course extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function licenses()
    {
        return $this->hasMany(License::class, 'course_id');
    }
    public function discounts()
    {
        return $this->hasMany(Discount::class, 'type_id');
    }

    public function courseCategory()
    {
        return $this->belongsTo(CourseCategory::class, 'course_category_id');
    }
    public function discountUsage()
    {
        return $this->hasMany(DiscountUsage::Class);
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_items', 'course_id', 'order_id');
    }
}

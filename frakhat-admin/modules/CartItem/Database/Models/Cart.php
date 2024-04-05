<?php

namespace Modules\CartItem\Database\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['user_id', 'total_price', 'discounted_total_price', 'course_count'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function updateTotalPrice()
    {
        $totalPrice = $this->cartItems()->sum('price');
        $this->total_price = $totalPrice;
        $this->save();
    }

    public function updateDiscountedTotalPrice()
    {
        $discountedTotalPrice = $this->cartItems()->sum('discounted_price');
        $this->discounted_total_price = $discountedTotalPrice;
        $this->save();
    }

    public function updateCourseCount()
    {
        $courseCount = $this->cartItems()->count();
        $this->course_count = $courseCount;
        $this->save();
    }

}

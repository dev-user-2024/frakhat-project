<?php

namespace Modules\CartItem\Database\Models;

use App\Models\course;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class CartItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['discounted_price', 'course_id', 'price', 'cart_id'];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

}

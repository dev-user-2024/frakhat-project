<?php

namespace Modules\CartItem\Database\Models;

use App\Models\course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['user_id', 'total_price', 'discounted_total_price', 'course_count'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function courses()
    {
        return $this->belongsToMany(course::class, 'order_items', 'order_id', 'course_id');
    }

}

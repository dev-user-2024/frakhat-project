<?php

namespace Modules\Discount\Services;

use Modules\CartItem\Database\Models\Cart;
use Modules\CartItem\Database\Models\Fee;
use Modules\CartItem\Database\Models\License;
use Modules\CartItem\Database\Models\Order;
use Modules\Discount\Database\Models\Discount;
use Modules\Discount\Database\Models\DiscountMarketer;
use Modules\Discount\Database\Models\DiscountUsage;

class DiscountProvider
{
    public function getAllLicense()
    {
        return License::query()->get();
    }
    public function getDiscountByUser($userId)
    {
        return Discount::where('user_id', $userId)->get();
    }
    public function getAllDiscountMarketers()
    {
        return  Discount::where('type' , 'course_category')->get();
    }
    public function getAllDiscounts($type)
    {
        return  Discount::where('type' , $type)->get();
    }
    public function getAllDiscountUsage()
    {
        return  DiscountUsage::query()->get();
    }
    public function getAllFees()
    {
        return  Fee::query()->get();
    }
    public function getAllCarts()
    {
        return  Cart::query()->get();
    }

    public function getAllOrders()
    {
        return  Order::query()->get();
    }


    public function getDiscountByid($id)
    {
        return Discount::query()->find($id);
    }
}

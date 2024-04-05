<?php

namespace Modules\CartItem\Services;

use Modules\CartItem\Database\Models\CartItem;

class CartItemProvider
{
    public function getAllCartItems()
    {
        return  CartItem::query()->get();
    }

    public function getCartItemByid($id)
    {
        return CartItem::query()->find($id);
    }
}

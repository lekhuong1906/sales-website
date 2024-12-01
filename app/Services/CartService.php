<?php

namespace App\Services;
use App\Models\Cart;

class CartService extends BaseService
{
    public function getCart()
    {
        if (auth()->check()) {
            // Lấy giỏ hàng từ MongoDB
            return Cart::where('user_id', auth()->id())->first()->items ?? [];
        }

        // Lấy giỏ hàng từ session
        return session()->get('cart', []);
    }

    public function addToCart($productId, $quantity = 1)
    {
        $cart = $this->getCart();
        $cart[$productId] = ($cart[$productId] ?? 0) + $quantity;

        if (auth()->check()) {
            // Lưu giỏ hàng vào MongoDB
            Cart::updateOrCreate(
                ['user_id' => auth()->id()],
                ['items' => $cart]
            );
        } else {
            // Lưu giỏ hàng vào session
            session()->put('cart', $cart);
        }
        
    }

    public function removeFromCart($productId)
    {
        $cart = $this->getCart();
        unset($cart[$productId]);

        if (auth()->check()) {
            // Lưu giỏ hàng vào MongoDB
            Cart::updateOrCreate(
                ['user_id' => auth()->id()],
                ['items' => $cart]
            );
        } else {
            // Lưu giỏ hàng vào session
            session()->put('cart', $cart);
        }
    }
}
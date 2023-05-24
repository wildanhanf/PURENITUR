<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartComponent extends Component
{
    public function increaseQuantity(Request $request)
    {
        $product = Cart::get($request->rowId);
        $qty = $product->qty + 1;
        Cart::update($request->rowId, $qty);
        return redirect()->route('cart');
    }

    public function decreaseQuantity(Request $request)
    {
        $product = Cart::get($request->rowId);
        $qty = $product->qty - 1;
        Cart::update($request->rowId, $qty);
        return redirect()->route('cart');
    }

    public function render()
    {
        return view('livewire.cart-component');
    }
}

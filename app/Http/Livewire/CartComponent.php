<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartComponent extends Component
{
    // untuk menambah quantity
    public function increaseQuantity(Request $request)
    {
        $product = Cart::get($request->rowId);
        $qty = $product->qty + 1;
        Cart::update($request->rowId, $qty);
        if (Cart::count() > 0) {
            return redirect()->route('cart');
        } else {
            return redirect()->route('catalog');
        }
    }

    public function decreaseQuantity(Request $request)
    {
        // dd($request->rowId);
        $product = Cart::get($request->rowId);
        $qty = $product->qty - 1;
        Cart::update($request->rowId, $qty);
        if (Cart::count() > 0) {
            return redirect()->route('cart');
        } else {
            return redirect()->route('catalog');
        }
    }

    public function render()
    {
        return view('livewire.cart-component');
    }
}

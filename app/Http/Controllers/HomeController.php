<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class HomeController extends Controller
{
    public function index()
    {
        // $data_catalog = Product::all();
        $data_catalog = Product::inRandomOrder()->limit(6)->get();
        return view('index', ['data' => $data_catalog]);
    }

    public function shipment()
    {
        $data_catalog = Product::inRandomOrder()->limit(5)->get();
        return view('auth.shipment', ['data' => $data_catalog,]);
    }

    public function shoppingCart()
    {
        return view('store.cart');
    }

    public function payment()
    {
        return view('store.payment');
    }

    public function productDetail(Request $request)
    {
        $id_one_product = $request->id_per_product;
        $data_products = Product::select('*')
            ->join('product_details', 'products.sku', '=', 'product_details.sku')
            ->where('products.id', '=', $id_one_product)
            ->get();
        // dd($data_products);
        $data_catalogs = Product::inRandomOrder()->limit(5)->get();
        // dd([
        //     'data_product' => $data_products,
        //     'data_catalog' => $data_catalogs
        // ]);
        return view('livewire.product-detail-component', [
            'data_selected_product' => $data_products,
            'data_catalog' => $data_catalogs,
        ]);
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)->associate('\App\Models\Product');
        session()->flash('success_message', 'Item added in Cart');
        return redirect()->route('livewire.cart-component');
    }
}

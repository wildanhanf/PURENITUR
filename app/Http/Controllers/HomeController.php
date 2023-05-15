<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        // $data_catalog = Product::all();
        $data_catalog = Product::select('*')
            ->where('id', '<', 6)
            ->get();
        return view('index', ['data' => $data_catalog]);
    }

    public function shoppingCart()
    {
        return view('store.cart');
    }
    
    public function productDetail()
    {
        return view('auth.productDetail');
    }
}

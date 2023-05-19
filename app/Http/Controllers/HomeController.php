<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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
    
    public function productDetail(Request $request)
    {
        $id_one_product = $request->id_per_product;
        $data_product = Product::select('*')
            ->where('id', '=', $id_one_product)
            ->get();
        // dd($data_product);
        $data_catalog = Product::inRandomOrder()->limit(5)->get();
        return view('auth.productDetail', [
            'data_selected_product' => $data_product,
            'data' => $data_catalog,
        ]);
    }
}

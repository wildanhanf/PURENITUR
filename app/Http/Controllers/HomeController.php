<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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

    public function productDetail(Request $request)
    {
        $id_one_product = $request->id_per_product;
        $data_product = Product::select('*')
            ->where('id', '=', $id_one_product)
            ->get();
        // dd($data_product);
        return view('auth.productDetail', [
            'data_selected_product' => $data_product,
        ]);
    }
}

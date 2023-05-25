<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductDetailComponent extends Component
{
    public function callPage(Request $request)
    {
        $id_one_product = $request->id_per_product;
        $data_products = Product::select('*')
            ->join('product_details', 'products.sku', '=', 'product_details.sku')
            ->where('products.id', '=', $id_one_product)
            ->get();
        // dd($id_one_product);
        $data_catalogs = Product::inRandomOrder()->limit(5)->get();
        // dd([
        //     'data_product' => $data_products,
        //     'data_catalog' => $data_catalogs
        // ]);
        return view('livewire.product-detail-component', [
            'data_selected_product' => $data_products,
            'data_catalog' => $data_catalogs,
        ]);
        // return view('livewire.product-detail-component');
    }

    public function render(Request $request)
    {
        $id_one_product = $request->id_per_product;
        $data_products = Product::select('*')
            ->join('product_details', 'products.sku', '=', 'product_details.sku')
            ->where('products.id', '=', $id_one_product)
            ->get();
        // dd($id_one_product);
        $data_catalogs = Product::inRandomOrder()->limit(5)->get();
        // dd([
        //     'data_product' => $data_products,
        //     'data_catalog' => $data_catalogs
        // ]);
        return view('livewire.product-detail-component', [
            'data_selected_product' => $data_products,
            'data_catalog' => $data_catalogs,
        ]);
        // return view('livewire.product-detail-component');
    }

    public function store(Request $request)
    {
        //1 = quantitiy
        Cart::add($request->id, $request->name_product, 1, $request->price)->associate('\App\Models\Product');
        session()->flash('success_message', 'Item added in Cart');
        return redirect()->route('cart');
    }
}

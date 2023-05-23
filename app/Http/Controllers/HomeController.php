<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\View\View;

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
        return view('auth.shipment', ['data' => $data_catalog]);
    }

    public function shoppingCart()
    {
        return view('store.cart');
    }

    public function create_order(Request $request)
    {
        // dd(
        //     $request->id,
        //     $request->cart,
        //     $request->total_price,
        //     $request->discount_id,
        //     $request->final_price,
        //     $request->payment_method,
        // );

        $json = json_decode($request->get('json'));

        $str1 = $request->total_price;
        $str2 = $request->final_price;
        $val1 = (float) str_replace(',', '', $str1);
        $val2 = (float) str_replace(',', '', $str2);

        // dd($val1);
        $createOrder = array(
            "user_id" => $request->id,
            "cart" => $request->cart,
            "price_total" => $val1,
            "discount_id" => $request->discount_id,
            "final_price" => $val2,
            "payment_type" => $request->payment_method,
        );
        Order::create($createOrder);

        return redirect('/payment');
    }

    public function payment(Request $request)
    {
        $data_orders = Order::select('*')
            ->where('user_id', '=', $request->user()->id)
            ->get();

        // dd($data_orders);

        return view('store.payment', ['data_order' => $data_orders]);
    }

    public function checkout(Request $request): View
    {
        // dd(
        //     $request->id,
        //     $request->cart,
        //     $request->total_price,
        //     $request->discount_id,
        //     $request->final_price,
        //     $request->payment_method,
        // );
        return view('store.checkout', [
            'cart' => $request->cart,
            'total_price' => $request->total_price,
            'user' => $request->user(),
        ]);
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

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\Discount;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\View\View;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $data_catalog = Product::inRandomOrder()->limit(6)->get();
        return view('index', ['data' => $data_catalog]);
    }

    public function shipment()
    {
        $data_catalog = Product::inRandomOrder()->limit(5)->get();
        $data_shipment = Order::select('*')
            ->where('user_id', '=', auth()->user()->id)
            ->get();

        return view('auth.shipment', [
            'data' => $data_catalog,
            'shipment' => $data_shipment,
        ]);
    }

    public function order_detail(Request $request)
    {
        $data_catalog = Product::inRandomOrder()->limit(5)->get();
        $data_shipment = Order::select('*')
            ->where('id', '=', $request->id)
            ->get();

        return view('auth.shipmentDetail', [
            'data' => $data_catalog,
            'shipment' => $data_shipment,
        ]);
    }

    public function shoppingCart()
    {
        return view('store.cart');
    }

    public function create_order(Request $request)
    {
        $json = json_decode($request->get('json'));

        $str1 = $request->total_price;
        $str2 = $request->final_price;
        $val1 = (float) str_replace(',', '', $str1);
        $val2 = (float) str_replace(',', '', $str2);

        $createOrder = array(
            "user_id" => $request->id,
            "cart" => $request->cart,
            "price_total" => $val1,
            "discount_id" => $request->discount_name,
            "final_price" => $val2,
            "payment_type" => $request->payment_method,
            "shipment_address" => $request->shipment_address,
        );
        Order::create($createOrder);

        Cart::destroy();

        return redirect('/payment');
    }

    public function update_order(Request $request)
    {
        $json = json_decode($request->cart);

        foreach ($json as $data) {
            $arr[] = $data->id;
        }

        for ($i = 0; $i < sizeof($arr); $i++) {
            $param1 = Product::where('id', $arr[$i])->get('sold');
            $param2 = Product::where('id', $arr[$i])
                ->update([
                    'sold' => $param1[0]->sold + 1,
                ]);
        }

        $validatedData  = $request->validate([
            'image_payment' => 'required'
        ]);

        $validatedData['transaction_id'] = $request->id;
        $validatedData['status_payment'] = "WAITING FOR CONFIRMATION";
        $validatedData['image_payment'] = $request->image_payment;
        $validatedData['updated_at'] = Carbon::now()->setTimezone('Asia/Jakarta');

        if ($request->file('image_payment')) {
            $validatedData['image_payment'] = $request->file('image_payment')->store('img_payment');
        }

        $profile1 = Order::where('id', $request->id)
            ->update($validatedData);

        return redirect('/payment');
    }

    public function payment(Request $request)
    {
        $data_orders = Order::select('*')
            ->where('user_id', '=', $request->user()->id)
            ->get();

        return view('store.payment', ['data_order' => $data_orders]);
    }

    public function checkout(Request $request): View
    {
        $json = json_decode($request->cart);

        $data_discount = Discount::all();

        return view('store.checkout', [
            'cart' => $request->cart,
            'json' => $json,
            'total_price' => $request->total_price,
            'user' => $request->user(),
            'discount' => $data_discount,
        ]);
    }

    public function productDetail(Request $request)
    {
        $id_one_product = $request->id_per_product;

        $data_products = Product::select('*')
            ->join('product_details', 'products.sku', '=', 'product_details.sku')
            ->where('products.id', '=', $id_one_product)
            ->get();

        $data_catalogs = Product::inRandomOrder()->limit(5)->get();

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

    public function customization(Request $request)
    {
        $id_one_product = $request->id_per_product;
        $data_products = Product::select('*')
            ->join('product_details', 'products.sku', '=', 'product_details.sku')
            ->where('products.id', '=', $id_one_product)
            ->get();
        $data_catalogs = Product::select('*')
            ->where('category', '=', 'Meja')
            ->orWhere('category', '=', 'Kompartemen')
            ->get();
        return view('livewire.customization-product', [
            'data_selected_product' => $data_products,
            'data_catalog' => $data_catalogs,
        ]);
    }

    public function AdminUsers()
    {
        return view('admin.users');
    }
}

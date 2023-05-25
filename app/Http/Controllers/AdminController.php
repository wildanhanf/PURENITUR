<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Shipment;
use App\Models\Customize_Product;
use App\Models\Discount;

class AdminController extends Controller
{
    public function visit_dashboard()
    {
        return view('admin.adminDashboard');
    }

    public function visit_user()
    {
        $data_user = User::select('*')->get();
        return view('admin.adminUser', ['data_user' => $data_user]);
    }

    public function visit_product()
    {
        $data_product = Product::select('*')
            ->join('product_details', 'products.sku', '=', 'product_details.sku')
            ->get();
        return view('admin.adminProduct', ['data_product' => $data_product]);
    }

    public function visit_order()
    {
        $data_order = Order::select('*')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->get();
        return view('admin.adminOrder', ['data_order' => $data_order]);
    }

    public function visit_shipment()
    {
        $data_shipment = Shipment::select('*');
        return view('admin.adminShipment', ['data_shipment' => $data_shipment]);
    }

    public function visit_discount()
    {
        $data_discount = Discount::select('*');
        return view('admin.adminDiscount', ['data_discount' => $data_discount]);
    }

    public function visit_customize_product()
    {
        $data_customize_product = Customize_Product::select('*')
            ->join('users', 'users.id', '=', 'customize__products.user_id')
            ->get();
        return view('admin.adminCustomizeProduct', ['data_customize_product' => $data_customize_product]);
    }
}

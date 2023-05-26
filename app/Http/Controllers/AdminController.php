<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Shipment;
use App\Models\Customize_Product;
use App\Models\Discount;
use App\Models\ProductDetail;

class AdminController extends Controller
{
    public function visit_dashboard()
    {
        if (auth()->user()->is_admin == 1) {
            return view('admin.adminDashboard');
        } else {
            return redirect('/');
        }
    }

    public function visit_user()
    {
        if (auth()->user()->is_admin == 1) {
            $data_user = User::select('*')->get();
            return view('admin.adminUser', ['data_user' => $data_user]);
        } else {
            return redirect('/');
        }
    }

    public function visit_user_edit(Request $request)
    {
        if (auth()->user()->is_admin == 1) {
            $data_user = User::select('*')
                ->where('id', '=', $request->id)
                ->get();
            return view('admin.edit.adminUserEdit', ['data_user' => $data_user]);
        } else {
            return redirect('/');
        }
    }

    public function user_update(Request $request)
    {
        if (auth()->user()->is_admin == 1) {
            $param = User::where('id', $request->id)
                ->update([
                    'id' => $request->id,
                    'email' => $request->email,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'gender' => $request->gender,
                    'address' => $request->address,
                    'telephone' => $request->telephone,
                    'is_admin' => $request->is_admin,
                ]);
            return redirect('/admin/users');
        } else {
            return redirect('/');
        }
    }

    public function user_delete(Request $request)
    {
        if (auth()->user()->is_admin == 1) {
            $param = User::where('id', $request->id)->delete();
            return redirect('/admin/users');
        } else {
            return redirect('/');
        }
    }

    public function visit_product()
    {
        if (auth()->user()->is_admin == 1) {
            $data_product = Product::select('*')
                ->join('product_details', 'products.id', '=', 'product_details.id')
                ->get();
            return view('admin.adminProduct', ['data_product' => $data_product]);
        } else {
            return redirect('/');
        }
    }

    public function visit_product_edit(Request $request)
    {
        if (auth()->user()->is_admin == 1) {
            $data_product = Product::select('*')
                ->join('product_details', 'products.id', '=', 'product_details.id')
                ->where('products.id', '=', $request->id)
                ->where('product_details.id', '=', $request->id)
                ->get();
            return view('admin.edit.adminProductEdit', [
                'data_product' => $data_product,
            ]);
        } else {
            return redirect('/');
        }
    }

    public function product_update(Request $request)
    {
        if (auth()->user()->is_admin == 1) {
            $param1 = Product::select('*')
                ->where('id', $request->id)
                ->update([
                    'id' => $request->id,
                    'name_product' => $request->name_product,
                    'category' => $request->category,
                    'sku' => $request->sku,
                    'price' => $request->price,
                    'rating' => $request->rating,
                    'sold' => $request->sold,
                ]);
            $param2 = ProductDetail::select('*')
                ->where('id', $request->id)
                ->update([
                    'id' => $request->id,
                    'name_product' => $request->name_product,
                    'sku' => $request->sku,
                    'feature_1' => $request->feature_1,
                    'feature_2' => $request->feature_2,
                    'feature_3' => $request->feature_3,
                    'feature_4' => $request->feature_4,
                ]);
            return redirect('/admin/products');
        } else {
            return redirect('/');
        }
    }

    public function product_delete(Request $request)
    {
        if (auth()->user()->is_admin == 1) {
            $param = Product::where('id', $request->id)->delete();
            $param = ProductDetail::where('id', $request->id)->delete();
            return redirect('/admin/products');
        } else {
            return redirect('/');
        }
    }

    public function visit_order()
    {
        if (auth()->user()->is_admin == 1) {
            $data_order = Order::select('*')
                ->get();

            return view('admin.adminOrder', ['data_order' => $data_order]);
        } else {
            return redirect('/');
        }
    }

    public function visit_order_edit(Request $request)
    {
        if (auth()->user()->is_admin == 1) {
            $data_order = Order::select('*')
                // ->join('users', 'users.id', '=', 'orders.user_id')
                ->where('orders.id', '=', $request->id)
                ->get();

            // dd($data_order);
            return view('admin.edit.adminOrderEdit', [
                'data_order' => $data_order,
            ]);
        } else {
            return redirect('/');
        }
    }

    public function order_update(Request $request)
    {
        if (auth()->user()->is_admin == 1) {
            $param = Order::where('id', $request->id)
                ->update([
                    'id' => $request->id,
                    'user_id' => $request->user_id,
                    'discount_id' => $request->discount_id,
                    'final_price' => $request->final_price,
                    'status_payment' => $request->status_payment,
                    'shipment_id' => $request->shipment_id,
                    'shipment_status' => $request->shipment_status,
                    'shipment_address' => $request->shipment_address,
                ]);
            return redirect('/admin/orders');
        } else {
            return redirect('/');
        }
    }

    public function order_delete(Request $request)
    {
        if (auth()->user()->is_admin == 1) {
            $param = Order::where('id', $request->id)->delete();
            return redirect('/admin/orders');
        } else {
            return redirect('/');
        }
    }

    public function visit_shipment()
    {
        if (auth()->user()->is_admin == 1) {
            $data_shipment = Shipment::select('*')->get();
            return view('admin.adminShipment', ['data_shipment' => $data_shipment]);
        } else {
            return redirect('/');
        }
    }

    public function visit_discount()
    {
        if (auth()->user()->is_admin == 1) {
            $data_discount = Discount::select('*')->get();
            return view('admin.adminDiscount', ['data_discount' => $data_discount]);
        } else {
            return redirect('/');
        }
    }

    public function visit_customize_product()
    {
        if (auth()->user()->is_admin == 1) {
            $data_customize_product = Customize_Product::select('*')
                ->join('users', 'users.id', '=', 'customize__products.user_id')
                ->get();
            return view('admin.adminCustomizeProduct', ['data_customize_product' => $data_customize_product]);
        } else {
            return redirect('/');
        }
    }
}

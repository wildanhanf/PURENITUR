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
use Illuminate\Support\Facades\Hash;

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

    public function visit_user_create()
    {
        if (auth()->user()->is_admin == 1) {
            return view('admin.create.adminUserCreate');
        } else {
            return redirect('/');
        }
    }

    public function user_create(Request $request)
    {
        if (auth()->user()->is_admin == 1) {
            $param = User::create([
                'email' => $request->email,
                'username' => $request->username,
                'password' => Hash::make($request->password),
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

    public function user_update(Request $request)
    {
        if (auth()->user()->is_admin == 1) {
            $param = User::where('id', $request->id)
                ->update([
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

    public function visit_product_create()
    {
        if (auth()->user()->is_admin == 1) {
            return view('admin.create.adminProductCreate');
        } else {
            return redirect('/');
        }
    }

    public function product_create(Request $request)
    {
        $template_sku = "PRNTNRNEW";
        $get_last_sku = Product::select('id')->orderBy('id', 'DESC')->limit(1)->get();
        $create_sku = $template_sku . strval($get_last_sku[0]->id + 2);

        $get_price = $request->price . '.00';

        $get_rating = $request->rating;
        if ($request->rating == '1') {
            $get_rating = $request->rating . '.0';
        } elseif ($request->rating == '2') {
            $get_rating = $request->rating . '.0';
        } elseif ($request->rating == '3') {
            $get_rating = $request->rating . '.0';
        } elseif ($request->rating == '4') {
            $get_rating = $request->rating . '.0';
        } elseif ($request->rating == '5') {
            $get_rating = $request->rating . '.0';
        }
        if (auth()->user()->is_admin == 1) {
            $param1 = Product::create([
                'name_product' => $request->name_product,
                'category' => $request->category,
                'sku' => $create_sku,
                'price' => $get_price,
                'image' => $request->image,
                'rating' => $get_rating,
                'sold' => 0,
            ]);
            $param2 = ProductDetail::create([
                'name_product' => $request->name_product,
                'sku' => $create_sku,
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
                ->where('orders.id', '=', $request->id)
                ->get();

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

    public function view_cart(Request $request)
    {
        if (auth()->user()->is_admin == 1) {
            $json = json_decode($request->cart);
            return view('admin.view.viewCart', [
                'json' => $json,
            ]);
        } else {
            return redirect('/');
        }
    }

    public function view_user(Request $request)
    {
        if (auth()->user()->is_admin == 1) {
            $param = User::where('id', '=', $request->user_id)->get();
            return view('admin.view.viewUser', [
                'data_user' => $param,
            ]);
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

    public function visit_discount_create()
    {
        if (auth()->user()->is_admin == 1) {
            return view('admin.create.adminDiscountCreate');
        } else {
            return redirect('/');
        }
    }

    public function discount_create(Request $request)
    {
        if (auth()->user()->is_admin == 1) {
            $param = Discount::create([
                'name_discount' => $request->name_discount,
                'percentage' => $request->percentage,
            ]);
            return redirect('/admin/discounts');
        } else {
            return redirect('/');
        }
    }

    public function visit_discount_edit(Request $request)
    {
        if (auth()->user()->is_admin == 1) {
            $data_discount = Discount::select('*')
                ->where('discounts.id', '=', $request->id)
                ->get();

            return view('admin.edit.adminDiscountEdit', [
                'data_discount' => $data_discount,
            ]);
        } else {
            return redirect('/');
        }
    }

    public function discount_update(Request $request)
    {
        if (auth()->user()->is_admin == 1) {
            $param = Discount::where('id', $request->id)
                ->update([
                    'id' => $request->id,
                    'name_discount' => $request->name_discount,
                    'percentage' => $request->percentage,
                ]);
            return redirect('/admin/discounts');
        } else {
            return redirect('/');
        }
    }

    public function discount_delete(Request $request)
    {
        if (auth()->user()->is_admin == 1) {
            $param = Discount::where('id', $request->id)->delete();
            return redirect('/admin/discounts');
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

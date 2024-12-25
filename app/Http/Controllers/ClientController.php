<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\category;
use App\Models\Order;
use App\Models\product;
use App\Models\shippinginfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    
    public function category_page($id){
        $category = category::findOrFail($id);
        $products = product::where('product_category_id', $id)->latest()->get();
        return view('home.category', compact('category', 'products'));
    }

    public function single_product($id){
        $products = product::where('id', $id)->latest()->get();
        $subcategory_id = product::where('id', $id)->value('product_subcategory_id');
        $related_products = product::where('product_subcategory_id', $subcategory_id)->orderBy('id', 'desc')->take(6)->get();
        return view('home.singleproduct', compact('products', 'related_products'));
    }

    public function add_to_cart(){
        $userid = Auth::id();
        $cart_items = cart::where('user_id', $userid)->latest()->get();
        return view('home.addtocart', compact('cart_items'));
    }

    public function add_product_to_cart(Request $request){
        
        $product_price = $request->product_price;
        $quantity = $request->product_quantity;
        $price = $product_price * $quantity;

        $request->validate([
            'product_quantity' => 'required'
        ]);
        
        cart::insert([
            'product_id' => $request->product_id,
            'user_id' => Auth::id(),
            'quantity' => $request->product_quantity,
            'price' => $price
        ]);

        return redirect()->route('addtocart')->with('message', 'Your item added to cart successfully!');
    }

    public function remove_cart_item($id){
        cart::findOrFail($id)->delete();

        return redirect()->route('addtocart')->with('message', 'Your item removed from cart successfully!');
    }

    public function check_out(){
        $user_id = Auth::id();
        $cart_items = cart::where('user_id', $user_id)->get();
        $shipping_informations = shippinginfo::where('user_id', $user_id)->get();
        return view('home.checkout', compact('cart_items', 'shipping_informations'));
    }

    public function shipping_address(){
        return view('home.shippingaddress');
    }

    public function add_shipping_address(Request $request){
        
        $request->validate([
            'full_name' => 'required',
            'Email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'postal_code' => 'required',
            'country' => 'required',
        ]);

        
        shippinginfo::insert([
            'user_id' => Auth::id(),
            'full_name' => $request->full_name,
            'Email' => $request->Email,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
            'country' => $request->country,
        ]);

        return redirect()->route('checkout')->with('message', 'Please Check Your Shipping information and Products details');
    }

    public function place_order(){
        $user_id = Auth::id();
        $cart_items = cart::where('user_id', $user_id)->get();
        $shipping_info = shippinginfo::where('user_id', $user_id)->first();
        
        foreach ($cart_items as $item){
            Order::insert([
                'user_id' => Auth::id(),
                'full_name' => $shipping_info->full_name,
                'Email' => $shipping_info->Email,
                'phone' => $shipping_info->phone,
                'address' => $shipping_info->address,
                'city' => $shipping_info->city,
                'state' => $shipping_info->state,
                'postal_code' => $shipping_info->postal_code,
                'country' => $shipping_info->country,
                'product_id' => $item->product_id,
                'qantity' => $item->quantity,
                'total_price' => $item->price,
            ]);

            $id = $item->id;
            Cart::findOrFail($id)->delete();
        }

        shippinginfo::where('user_id', $user_id)->first()->delete();

        return redirect()->route('userpendingorders')->with('message', 'Your Order has been placed successfully!');
    }

    public function user_profile(){

        $Approved_orders = Order::where('status', 'Approved')->latest()->get();
        return view('home.userprofile', compact('Approved_orders'));
    }

    public function user_pending_orders(){
        $pending_orders = Order::where('status', 'pending')->latest()->get();
        return view('home.userpendingorders', compact('pending_orders'));
    }

    public function order_history(){
        return view('home.orderhistory');
    }

    public function profile_info(){
        return view('home.profileinfo');
    }

    public function log_out(){
        return view('home.userlogout');
    }

    public function best_seller(){
        return view('home.bestseller');
    }

    public function gift_idea(){
        return  view('home.giftidea');
    }

    public function new_releases(){
        return view('home.newreleases');
    }

    public function todays_deal(){
        return view('home.todaysdeal');
    }

    public function customer_service(){
        return view('home.customerservice');
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function pending_orders(){
        $pending_orders = Order::where('status', 'pending')->latest()->get();
        return view('admin.pendingorders', compact('pending_orders'));
    }

    public function approve_order(Request $request){
        $id = $request->approve_order_id;
        Order::findOrFail($id)->update([
            'status' => $request->approve_order_status,
        ]);

        return redirect()->route('pendingorders'); 
    }

    public function completed_orders(){
        return view('admin.completedorders');
    }

    public function canceled_orders(){
        return view('admin.canceledorders');
    }

}

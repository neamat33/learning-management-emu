<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::latest()->paginate(2);
        return view('admin.order.index',compact('orders'));
    }
    public function pending($id){
        $order = Order::where('id',$id)->first();
        $order->status = 'pending';
        $order->save();
        return back()->with('success', 'Status change Successfully!');
    }
    public function confirm($id){
        $order = Order::where('id',$id)->first();
        $order->status = 'confirm';
        $order->save();
        return back()->with('success', 'Status change Successfully!');
    }
}

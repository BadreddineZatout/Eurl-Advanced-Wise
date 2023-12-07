<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('orders.index');
    }

    public function getOrders()
    {
        return Order::where('customer_id', auth()->id())->orderBy('id', 'desc')->get();
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function store(Request $request)
    {
        $order = Order::create([
            'customer_id' => auth()->id(),
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'total' => $request->total,
        ]);

        return response()->json(['order' => $order], 201);
    }

    public function cancel(Order $order)
    {
        $order->status = 'cancelled';
        $order->save();

        return response()->json(['message' => 'Canceled successfully'], 200);
    }
}

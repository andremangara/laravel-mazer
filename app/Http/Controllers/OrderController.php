<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //

    public function getName()
    {
        $n = 5;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }
    public function index()
    {
        $orders = Order::all();
        return view("order", compact("orders"));
    }
    public function create()
    {
        $products = Product::where("status", "Published")->get();
        $orderitems = OrderItem::where("id_order", null)->get();
        return view("order-tambah", compact("products", "orderitems"));
    }
    public function store(Request $request, $id)
    {
        $invoiceid = str($request->order_date) . '-' . OrderController::getName();
        $orderitemsum = OrderItem::where("id_order", null)->sum("subtotal");
        $order = Order::create([
            'id_invoice' => $invoiceid,
            'order_status' => $request->order_status,
            'order_total' => $orderitemsum,
            'id_user' => Auth::user()->id,
            'order_date' => $request->order_date,
        ]);

        $orderitems = OrderItem::where('id_order', null)->get();
        foreach ($orderitems as $item) {
            $item->update([
                'id_order' => $order->id_order,
            ]);
        }
        return redirect()->route("order.index");
    }
}

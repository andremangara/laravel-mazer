<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $omset = Order::all()->sum("order_total");
        $user = User::all()->count();
        $kategoricount = Kategori::all()->count();
        $productcount = Product::all()->count();
        $ordernew = Order::where("order_status", "Pending")->count();
        $orderonprog = Order::where("order_status", "On_Progress")->count();
        $orderdelivered = Order::where("order_status", "Delivered")->count();
        $orderdone = Order::where("order_status", "Done")->count();
        return view("dashboard", compact("omset", "user", "kategoricount", "productcount", "ordernew", "orderonprog", "orderdelivered", "orderdone"));
    }
}

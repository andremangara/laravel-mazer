<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    //
    public function index()
    {
        return view("");
    }
    public function store(Request $request)
    {
        $product = Product::findorfail($request->id_produk);
        OrderItem::create([
            'id_produk' => $request->id_produk,
            'nama_produk' => $product->nama_produk,
            'harga_produk' => $product->harga,
            'kuota' => $request->kuota,
            'subtotal' => $product->harga * $request->kuota,
        ]);
        return redirect()->route('order.tambah');
    }
    public function destroy($id)
    {
        OrderItem::destroy($id);
        return redirect()->route('order.tambah');
    }
}

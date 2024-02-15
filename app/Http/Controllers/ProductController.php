<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::with("parent")->get();
        return view("product", compact("products"));
    }
    public function create()
    {
        $kategoris = Kategori::with("parent")->get();
        return view("product-tambah", compact("kategoris"));
    }
    public function store(Request $request)
    {
        $product = Product::create(request()->all());
        return redirect()->route('product.index');
    }
    public function edit($id)
    {
        $dropdowns = Kategori::with("parent")->get();
        $product = Product::findOrFail($id);
        return view('product-edit', compact('product', 'dropdowns'));
    }
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('product.index');
    }
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index');
    }
}

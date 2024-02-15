<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    //
    public function index()
    {
        $kategoris = Kategori::with("parent")->get();
        return view("kategori", compact("kategoris"));
    }
    public function store()
    {
        $kategoris = Kategori::create(request()->all());
        return redirect()->route('kategori.index');
    }
    public function edit($id)
    {
        $kategoris = Kategori::findOrFail($id);
        $dropdowns = Kategori::with("parent")->get();
        return view('kategori-edit', compact('kategoris', 'dropdowns'));
    }
    public function update(Request $request, $id)
    {
        $kategoris = Kategori::findOrFail($id);
        $kategoris->update($request->all());
        return redirect()->route('kategori.index');
    }
    public function destroy($id)
    {
        $kategoris = Kategori::findOrFail($id);
        $kategoris->delete();
        return redirect()->route('kategori.index');
    }
}

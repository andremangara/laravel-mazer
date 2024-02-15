<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_produk';
    protected $fillable = [
        'nama_produk',
        'deskripsi',
        'status',
        'id_kategori',
        'harga',
        'berat',
        'url_img',
    ];

    public function parent()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_order_item';
    protected $table = 'orderitems';
    protected $fillable = [
        'id_order',
        'id_produk',
        'nama_produk',
        'harga_produk',
        'kuota',
        'subtotal',
    ];
    public function parent()
    {
        return $this->belongsTo(Product::class, 'id_produk');
    }
}

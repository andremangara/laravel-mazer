<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $primaryKey = "id_kategori";
    protected $fillable = [
        "nama_kategori",
        "id_parent",
    ];
    public function parent()
    {
        return $this->belongsTo(Kategori::class, "id_parent");
    }
}

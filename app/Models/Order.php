<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_order';
    protected $fillable = [
        'id_invoice',
        'order_status',
        'order_total',
        'id_user',
        'order_date',
    ];
    public function parent()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $primaryKey = 'order_detail_id';

    // === PERBAIKAN ADA DI SINI ===
    protected $fillable = [
        'order_id',  // <--- INI YANG WAJIB DITAMBAHKAN
        'menu_id',
        'quantity',
        'price'
    ];

    // Relasi ke Order
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }

    // Relasi ke Menu
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'menu_id');
    }
}
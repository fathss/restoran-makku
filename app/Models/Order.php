<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $primaryKey = 'order_id';

    protected $fillable = [
        'user_id', 'total_amount', 'status', 'order_type', 'order_time'
    ];

    protected $casts = [
        'order_time' => 'datetime',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function details()
    {
        return $this->hasMany(OrderDetail::class, 'order_id', 'order_id');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    const STATUS_PENDING = 'pending';
    const STATUS_COMPLETED = 'completed';
    const STATUS_CANCELED = 'cancelled';

    use HasFactory;

    protected $primaryKey = 'reservation_id';

    // IZINKAN KOLOM INI DIISI
    protected $fillable = [
        'user_id',
        'table_number',
        'amount_people',
        'reservation_time',
        'status'
    ];

    protected $casts = [
        'reservation_time' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'menu_id';
    
    protected $fillable = [
        'menu_name', 'description', 'price', 'category', 'available', 'image_url'
    ];

    protected $casts = [
        'image_url' => 'array',
    ];
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu; 

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil 3 menu terbaru (available) untuk dipajang di halaman depan
        $menus = Menu::where('available', true)->latest()->take(3)->get(); 
        
        // Mengirim data $menus ke view 'customer.home'
        return view('customer.home', compact('menus'));
    }
}

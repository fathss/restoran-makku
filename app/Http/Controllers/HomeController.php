<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu; 

class HomeController extends Controller
{
    public function index()
    {
        $menus = Menu::where('available', true)->latest()->take(3)->get(); 
        
        return view('customer.home', compact('menus'));
    }
}

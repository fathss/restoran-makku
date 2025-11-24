<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $query = Menu::where('available', true);

        if ($request->has('search')) {
            $query->where('menu_name', 'like', '%' . $request->search . '%');
        }

        $menus = $query->get();

        return view('customer.menu', compact('menus'));
    }
}
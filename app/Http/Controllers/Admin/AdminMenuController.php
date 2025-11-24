<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $menus = Menu::query();

        if ($request->has('search')) {
            $menus->where('menu_name', 'like', '%' . $request->search . '%');
        }

        $menus = $menus->get();

        $order_details = OrderDetail::whereHas('order', function ($q) {
            $q->where('status', 'completed');
        })->get();

        return view('admin.menu.index', compact('menus', 'order_details'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'menu_name' => 'required|string|max:50',
            'description' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'category' => 'required|in:Makanan,Minuman,Snack',
            'available' => 'required|in:0,1',
            'image_url' => 'nullable|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $validatedData;

        if ($request->hasFile('image_url')) {

            $imageFile = $request->file('image_url');
            $extension = $imageFile->getClientOriginalExtension();
            $fileName = Carbon::now()->timestamp . '.' . $extension;
            $path = $imageFile->storeAs('img', $fileName, 'public_uploads');
            $data['image_url'] = $path;
        }

        Menu::create($data);

        return redirect()->route('admin.menus.index')
            ->with('success', 'Menu berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $menu = Menu::findOrFail($id);
        return view('admin.menu.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'menu_name' => 'required|string|max:50',
            'description' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'category' => 'required|in:Makanan,Minuman,Snack',
            'available' => 'required|in:0,1',
            'image_url' => 'nullable|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $menu = Menu::findOrFail($id);

        $data = $validatedData;

        if ($request->hasFile('image_url')) {

            $imageFile = $request->file('image_url');
            $extension = $imageFile->getClientOriginalExtension();
            $fileName = Carbon::now()->timestamp . '.' . $extension;
            $path = $imageFile->storeAs('img', $fileName, 'public_uploads');
            $data['image_url'] = $path;
        }

        $menu->update($data);

        return redirect()->route('admin.menus.index')
            ->with('success', 'Menu berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->route('admin.menus.index')
            ->with('success', 'Menu berhasil dihapus!');
    }
}

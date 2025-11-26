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
            'image_url.*' => 'nullable|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        $data = $validatedData;

        // Handle multiple images
        if ($request->hasFile('image_url')) {
            $images = [];
            foreach ($request->file('image_url') as $imageFile) {
                $extension = $imageFile->getClientOriginalExtension();
                $fileName = Carbon::now()->timestamp . '-' . uniqid() . '.' . $extension;
                $path = $imageFile->storeAs('img', $fileName, 'public_uploads');
                $images[] = $path;
            }
            $data['image_url'] = $images;
        } else {
            $data['image_url'] = [];
        }

        Menu::create($data);

        return redirect()->route('admin.menus.index')
            ->with('success', 'Menu berhasil ditambahkan!');
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
        $menu = Menu::findOrFail($id);

        $validatedData = $request->validate([
            'menu_name' => 'required|string|max:50',
            'description' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'category' => 'required|in:Makanan,Minuman,Snack',
            'available' => 'required|in:0,1',
            'image_url.*' => 'nullable|mimes:jpeg,png,jpg,webp|max:2048',
            'replace_image.*' => 'nullable|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $validatedData;

        $existingImages = $menu->image_url ?? [];
        if (!is_array($existingImages)) $existingImages = [$existingImages];

        $replaceImages = $request->file('replace_image', []);
        foreach ($replaceImages as $index => $file) {
            if ($file) {
                $filename = \Carbon\Carbon::now()->timestamp . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('img', $filename, 'public_uploads');

                if (isset($existingImages[$index])) {
                    $existingImages[$index] = $path;
                }
            }
        }

        $newImages = $request->file('image_url', []);
        foreach ($newImages as $file) {
            if ($file) {
                $filename = \Carbon\Carbon::now()->timestamp . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('img', $filename, 'public_uploads');
                $existingImages[] = $path;
            }
        }

        $data['image_url'] = $existingImages;

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

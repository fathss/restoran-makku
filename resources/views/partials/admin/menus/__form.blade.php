@csrf
<div class="mb-4">
    <label class="form-label" for="image_url">Upload Gambar</label>
    <div class="input-group">
        <input type="file" name="image_url" 
            class="form-control"
            accept="image/*">
    </div>
    @if ($menu && $menu->image_url)
        <div class="mt-3">
            <img src="{{ asset($menu->image_url) }}" alt="Current Image" class="menu-img-preview">
            <p class="small text-muted mt-2">Gambar saat ini</p>
        </div>
    @endif
</div>

<div class="mb-4">
    <label class="form-label" for="menu_name">Nama Menu</label>
    <input type="text" name="menu_name" 
        class="form-control @error('menu_name') is-invalid @enderror" 
        placeholder="Masukkan Nama Menu" 
        value="{{ old('menu_name', $menu->menu_name ?? '') }}">
    <x-input-error :messages="$errors->get('menu_name')" class="text-danger small mt-1" />
</div>
<div class="mb-4">
    <label class="form-label" for="description">Deskripsi</label>
    <textarea type="text" name="description" 
        class="form-control"     
        placeholder="Masukkan deskripsi (Opsional)">{{ old('description', $menu?->description ?? '') }}</textarea>
</div>
<div class="mb-4">
    <label class="form-label" for="price">Harga</label>
    <div class="input-group">
        <span class="input-group-text">Rp</span>
        <input type="number" name="price" 
            class="form-control @error('price') is-invalid @enderror" 
            placeholder="Masukkan harga menu"
            value="{{ old('price', $menu?->price ?? 0) }}">
    </div>
    <x-input-error :messages="$errors->get('price')" class="text-danger small mt-1" />
</div>
<div class="mb-4">
    <label class="form-label" for="category">Kategori</label>
    <select class="form-select  @error('category') is-invalid @enderror" name="category">
        <option selected disabled value="Not Selected">Pilih kategori Menu</option>
        <option value="Makanan" {{ old('category', $menu?->category) == 'Makanan' ? 'selected' : '' }}>Makanan</option>
        <option value="Minuman" {{ old('category', $menu?->category) == 'Minuman' ? 'selected' : '' }}>Minuman</option>
        <option value="Snack" {{ old('category', $menu?->category) == 'Snack' ? 'selected' : '' }}>Snack</option>
    </select>
    <x-input-error :messages="$errors->get('category')" class="text-danger small mt-1" />
</div>
<div class="mb-4">
    <label class="form-label d-block" for="available">Ketersediaan</label>
    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
        <input type="radio" name="available" id="tidak_tersedia" 
            class="btn-check" 
            value="0" 
            autocomplete="off"
            {{ old('available', $menu?->available) == '0' ? 'checked' : '' }}>
        <label class="btn btn-outline-danger" for="tidak_tersedia">Not Available</label>

        <input type="radio" name="available" id="tersedia" 
            class="btn-check"
            value="1" 
            autocomplete="off" 
            {{ old('available', $menu?->available) == '1' ? 'checked' : '' }}>
        <label class="btn btn-outline-danger" for="tersedia">Available</label>
    </div>
    <x-input-error :messages="$errors->get('available')" class="text-danger small mt-1" />
</div>
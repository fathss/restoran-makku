@csrf
<div class="form-row">
    <div class="form-group col-12">
        @if(isset($menu))
            <label for="image_url">Gambar Menu</label>

            @if ($menu->image_url)
                @php
                    $imgData = $menu->image_url;
                    if (!is_array($imgData)) {
                        $imgData = [$imgData];
                    }
                    $images = array_values(array_filter($imgData));
                @endphp

                @if(count($images) > 0)
                    <p class="small text-muted fw-light mb-2 mt-2">Gambar saat ini</p>
                    <div class="d-flex flex-wrap gap-3">
                        @foreach($images as $index => $img)
                            <div class="text-center">
                                <img src="{{ asset($img) }}" 
                                    alt="Gambar Saat Ini"
                                    style="width: 150px; height: 150px; object-fit: cover;" 
                                    class="img-thumbnail mb-1">
                                <input type="file" name="replace_image[{{ $index }}]" 
                                    class="form-control form-control-sm" 
                                    accept=".jpg,.jpeg,.png,.webp">
                                <p class="small text-muted fw-light mt-1 mb-0">Ganti gambar ini</p>
                            </div>
                        @endforeach
                    </div>
                @endif
            @else
                <p class="small text-muted fw-light mb-2 mt-2">Menu belum memiliki gambar</p>
            @endif


            <div class="mt-3">
                <label for="add_image">Tambah Gambar Baru</label>
                <input type="file" name="image_url[]" class="form-control" accept=".jpg,.jpeg,.png,.webp" multiple>
                <p class="small text-muted fw-light mt-1 mb-0">Tambahkan satu atau beberapa gambar baru</p>
            </div>
        @else
            <label for="image_url">Upload Gambar</label>
            <input type="file" name="image_url[]" class="form-control" accept=".jpg,.jpeg,.png,.webp" multiple>
            <p class="small text-muted fw-light mt-1 mb-0">Pilih satu atau beberapa gambar untuk menu baru</p>
        @endif
    </div>

    <div class="form-group col-12">
        <label for="menu_name">Nama Menu</label>
        <input type="text" name="menu_name"
            class="form-control @error('menu_name') is-invalid @enderror"
            value="{{ old('menu_name', $menu->menu_name ?? '') }}"
            placeholder="Masukkan Nama Menu">
        <x-input-error :messages="$errors->get('menu_name')" class="text-danger small mt-1" />
    </div>

    <div class="form-group col-12">
        <label for="description">Deskripsi</label>
        <textarea name="description" class="form-control"
                placeholder="Masukkan deskripsi (Opsional)">{{ old('description', $menu->description ?? '') }}</textarea>
    </div>

    <div class="form-group col-md-6">
        <label for="price">Harga</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Rp</span>
            </div>
            <input type="number" name="price" class="form-control"
                placeholder="Masukkan harga menu"
                value="{{ old('price', $menu->price ?? 0) }}">
        </div>
    </div>

    <div class="form-group col-md-6">
        <label for="category">Kategori</label>
        <select name="category"
                class="form-control @error('category') is-invalid @enderror">
            <option disabled selected value="Not Selected">Pilih kategori Menu</option>
            <option value="Makanan" {{ old('category', $menu->category ?? '') == 'Makanan' ? 'selected' : '' }}>Makanan</option>
            <option value="Minuman" {{ old('category', $menu->category ?? '') == 'Minuman' ? 'selected' : '' }}>Minuman</option>
            <option value="Snack"   {{ old('category', $menu->category ?? '') == 'Snack' ? 'selected' : '' }}>Snack</option>
        </select>
        <x-input-error :messages="$errors->get('category')" class="text-danger small mt-1" />
    </div>

    <div class="form-group col-12">
        <label class="d-block">Ketersediaan</label>

        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="tidak_tersedia" name="available"
                class="custom-control-input" value="0"
                {{ old('available', $menu->available ?? '') == '0' ? 'checked' : '' }}>
            <label class="custom-control-label text-danger" for="tidak_tersedia">Not Available</label>
        </div>

        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="tersedia" name="available"
                class="custom-control-input" value="1"
                {{ old('available', $menu->available ?? '') == '1' ? 'checked' : '' }}>
            <label class="custom-control-label text-danger" for="tersedia">Available</label>
        </div>
    </div>
</div>

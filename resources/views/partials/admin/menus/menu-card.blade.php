<div class="col-lg-3 col-md-4 col-sm-6 mb-4">
    <div class="card h-100 shadow-sm border-0 hover-effect">
        <div class="position-relative">
            <img src="{{ $menu->image_url ? asset($menu->image_url) : 'https://placehold.co/300x200?text=No+Image' }}" 
                class="card-img-top menu-img" 
                alt="{{ $menu->menu_name }}"
                style="{{ $menu->available == 0 ? 'filter: blur(5px);' : '' }}">
            @if ($menu->available == 0)
                <div class="position-absolute top-50 start-50 translate-middle" style="z-index: 10;">
                    <span class="badge bg-danger fs-6 px-4 py-2" style="filter: none;">Not Available</span>
                </div>
            @endif
            <button type="button" class="btn btn-danger rounded-circle position-absolute top-0 end-0 m-2" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $menu->menu_id }}" style="z-index: 10; filter: none;">
                <i class="bi bi-trash"></i>
            </button>
        </div>
        
        <div class="card-body d-flex flex-column">
            <h5 class="card-title fw-bold">{{ $menu->menu_name }}</h5>
            
            <p class="text-muted small flex-grow-1">
                {{ Str::limit($menu->description, 50) }}
            </p>
            
            <hr class="my-2">

            <div class="d-flex justify-content-between align-items-center mt-2">
                <div>
                    <span class="fw-bold text-danger fs-5 d-block">
                        Rp {{ number_format($menu->price, 0, ',', '.') }}
                    </span>
                    @php
                        $orderDetailsCollection = $order_details ?? collect();
                        // Sum the quantity if present, otherwise count entries
                        $totalOrdered = $orderDetailsCollection->where('menu_id', $menu->menu_id)->sum('quantity');
                    @endphp
                    <small class="text-muted">Total Order: <span class="fw-bold">{{ $totalOrdered }}</span></small>
                </div>
                
                @auth
                    <a href="{{ route('admin.menus.edit', $menu->menu_id) }}" class="btn btn-outline-danger btn-sm rounded-pill" style="filter: none; opacity: 1;">
                        <i class="fas fa-pen-to-square"></i> Edit
                    </a>
                @else
                    <button type="button" class="btn btn-outline-danger btn-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#authModal">
                        <i class="fas fa-plus"></i> Pesan
                    </button>
                @endauth
            </div>
        </div>
    </div>
</div>

@include('partials.admin.menus.delete-confirm-modal', ['menu' => $menu])
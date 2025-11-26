<div class="col-lg-3 col-md-4 col-sm-6 mb-4">
    <div class="card card-outline card-danger h-100 shadow-sm hover-effect">
        
        <div class="card-img-top overflow-hidden position-relative" style="height: 200px;">
            @php
                $imgData = $menu->image_url ?? [];
                if (!is_array($imgData)) {
                    $imgData = [$imgData];
                }
                $images = array_values(array_filter($imgData));
            @endphp

            @if(count($images) > 1)
                <div id="carousel-{{ $menu->menu_id }}" class="carousel slide h-100" data-ride="carousel" data-interval="3000">
                    <div class="carousel-inner h-100">
                        @foreach($images as $key => $image)
                            <div class="carousel-item h-100 {{ $key == 0 ? 'active' : '' }}">
                                <img src="{{ asset($image) }}" class="d-block w-100 h-100" style="object-fit: cover; {{ $menu->available == 0 ? 'filter: blur(5px);' : '' }}" alt="{{ $menu->menu_name }}">
                            </div>
                        @endforeach
                    </div>

                    <a class="carousel-control-prev" href="#carousel-{{ $menu->menu_id }}" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-{{ $menu->menu_id }}" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            @else
                <img src="{{ !empty($images) ? asset($images[0]) : 'https://placehold.co/300x200?text=No+Image' }}" 
                     class="w-100 h-100" 
                     style="object-fit: cover; {{ $menu->available == 0 ? 'filter: blur(5px);' : '' }}" 
                     alt="{{ $menu->menu_name }}">
            @endif

            @if ($menu->available == 0)
                <div class="position-absolute" style="top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 10;">
                    <span class="badge badge-danger fs-6 px-4 py-2" style="filter: none;">Not Available</span>
                </div>
            @endif
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
                        $totalOrdered = $orderDetailsCollection->where('menu_id', $menu->menu_id)->sum('quantity');
                    @endphp
                    <small class="text-muted">Total Order: <span class="fw-bold">{{ $totalOrdered }}</span></small>
                </div>
                
                <div class="d-flex align-items-center">
                    <a href="{{ route('admin.menus.edit', $menu->menu_id) }}"
                        class="btn btn-outline-danger btn-sm rounded-pill mr-2">
                        <i class="fas fa-pen-to-square"></i>
                    </a>
                    <button type="button"
                            class="btn btn-outline-danger btn-sm rounded-pill"
                            data-toggle="modal" data-target="#deleteModal{{ $menu->menu_id }}">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@include('partials.admin.menus.delete-confirm-modal', ['menu' => $menu])

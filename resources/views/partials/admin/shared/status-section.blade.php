<div class="card card-outline card-danger mb-4">
    <div class="card-header">
        <h3 class="card-title">
            <i class="{{ $icon }} mr-1"></i> {{ $title }}

            @if ($count > 0)
                <span class="badge badge-{{ $badgeColor }} ml-2">{{ $count }}</span>
            @endif
        </h3>
        
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>

    <div class="card-body">
        @if ($items->isEmpty())
            <p class="text-center">Tidak ada data {{ strtolower($title) }}.</p>
        @else
            <div class="row">
                @foreach ($items as $item)
                    @include($cardPartial, [$itemName => $item])
                @endforeach
            </div>
        @endif
    </div>
</div>

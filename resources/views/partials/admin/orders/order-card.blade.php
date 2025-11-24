<div class="col-lg-3 col-md-4 col-sm-6">
    <div class="card h-100 p-3 mb-4 shadow-sm border-0">
        <div class="card-body d-flex flex-column">
            <div class="card-title mb-3">
                <h5 class="card-title fw-bold">Order #{{ $order->order_id }}</h5>
            </div>

            <p class="card-text"><strong>Customer:</strong> {{ $order->user->name }}</p>
            <p class="card-text"><strong>Total Amount:</strong> Rp {{ number_format($order->total_amount, 0, ',', '.') }}</p>
            <p class="card-text"><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
            {{-- <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-primary">View Details</a> --}}
        </div>
    </div>
</div>
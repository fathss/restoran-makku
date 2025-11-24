<div class="col-lg-3 col-md-4 col-sm-6">
    <div class="card mb-4 shadow-sm border-0">
        <div class="card-header bg-danger text-white">
            <h5 class="card-title fw-bold">Order #{{ $order->order_id }}</h5>
        </div>
        <div class="card-body d-flex flex-column">

            <p class="card-text"><strong>Customer:</strong> {{ $order->user->name }}</p>
            <p class="card-text"><strong>Total Amount:</strong> Rp {{ number_format($order->total_amount, 0, ',', '.') }}</p>
            <p class="card-text"><strong>Tanggal Order:</strong> {{ $order->order_time->format('d-m-Y') }} </p>
            <p class="card-text"><strong>Waktu Order:</strong> {{ $order->order_time->format('H:i:s') }} </p>
            <p class="card-text"><strong>Tipe Order:</strong> 
                @if ($order->order_type == 'dine_in')
                    Dine In
                @elseif ($order->order_type == 'takeaway')
                    Takeaway
                @else
                    Delivery
                @endif
            </p>
            <p class="card-text"><strong>Status:</strong> 
                <span class="badge bg-warning text-dark">Pending</span>
            </p>
        </div>
        <div class="card-footer mb-2">
            <div class="d-flex justify-content-center align-items-center mt-2">
                <a href="{{ route('admin.orders.approve', $order->order_id) }}" class="btn btn-success me-2">
                    <i class="bi bi-check-lg"></i>
                </a>
                <a href="{{ route('admin.orders.cancel', $order->order_id) }}" class="btn btn-danger">
                    <i class="bi bi-x"></i>
                </a>
            </div>
        </div>
    </div>
</div>
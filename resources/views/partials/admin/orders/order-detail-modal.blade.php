<div class="modal fade" id="orderDetailModal{{ $order->order_id }}" tabindex="-1" role="dialog"
    aria-labelledby="orderDetailLabel{{ $order->order_id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="orderDetailLabel{{ $order->order_id }}">
                    Detail Order #{{ $order->order_id }}
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <p><strong>Customer:</strong> {{ $order->user->name }}</p>
                        <p><strong>Tipe Order:</strong> 
                            {{ $order->order_type == 'dine_in' ? 'Dine In' : 'Takeaway' }}
                        </p>
                        <p><strong>Status:</strong> 
                            @include('partials.admin.shared.status-badge', ['status' => $order->status])
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Tanggal:</strong> {{ $order->order_time->format('d-m-Y') }}</p>
                        <p><strong>Waktu:</strong> {{ $order->order_time->format('H:i:s') }}</p>
                        <p><strong>Total Amount:</strong> Rp {{ number_format($order->total_amount, 0, ',', '.') }}</p>
                    </div>
                </div>
                <hr>

                <h5 class="mb-3">Item Pesanan</h5>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th>Menu</th>
                                <th class="text-center">Qty</th>
                                <th class="text-right">Harga</th>
                                <th class="text-right">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $grandTotal = 0; @endphp
                            @foreach ($order->details as $detail)
                                @php
                                    $subtotal = $detail->quantity * $detail->menu->price;
                                    $grandTotal += $subtotal;
                                @endphp
                                <tr>
                                    <td>{{ $detail->menu->menu_name }}</td>
                                    <td class="text-center">{{ $detail->quantity }}</td>
                                    <td class="text-right">Rp {{ number_format($detail->menu->price, 0, ',', '.') }}</td>
                                    <td class="text-right">Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3" class="text-right">Total Harga:</th>
                                <th class="text-right">Rp {{ number_format($grandTotal, 0, ',', '.') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-end">
                @if ($order->status === 'pending')
                    <a href="{{ route('admin.orders.approve', $order->order_id) }}" 
                    class="btn btn-success mx-1">
                        <i class="bi bi-check-lg"></i> Terima
                    </a>
                    <a href="{{ route('admin.orders.cancel', $order->order_id) }}" 
                    class="btn btn-danger mx-1">
                        <i class="bi bi-x"></i> Tolak
                    </a>
                @endif

                <button class="btn btn-secondary mx-1" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

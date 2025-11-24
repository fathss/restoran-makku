@if ($status == 'pending')
    <span class="badge bg-warning text-dark">Pending</span>
@elseif ($status == 'completed')
    <span class="badge bg-success text-white">Completed</span>
@else
    <span class="badge bg-secondary text-white">Canceled</span>
@endif

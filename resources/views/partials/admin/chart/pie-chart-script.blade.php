<script>
$(function () {
    var ctxOrder = $('#orderTypePieChart').get(0).getContext('2d');
    new Chart(ctxOrder, {
        type: 'pie',
        data: {
            labels: ['Dine In', 'Takeaway'],
            datasets: [{
                data: [{{ $dineInCount }}, {{ $takeawayCount }}],
                backgroundColor: ['#17a2b8', '#dc3545']
            }]
        },
        options: { maintainAspectRatio: false, responsive: true }
    });

    var ctxMenu = $('#menuTypePieChart').get(0).getContext('2d');
    new Chart(ctxMenu, {
        type: 'pie',
        data: {
            labels: ['Makanan', 'Minuman', 'Snack'],
            datasets: [{
                data: [{{ $makananCount }}, {{ $minumanCount }}, {{ $snackCount }}],
                backgroundColor: ['#28a745', '#17a2b8', '#ffc107']
            }]
        },
        options: { maintainAspectRatio: false, responsive: true }
    });
});
</script>

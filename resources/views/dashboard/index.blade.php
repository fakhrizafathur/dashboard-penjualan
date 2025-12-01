@extends('layouts.app')

@section('content')
<div class="dashboard-container">
    <!-- Header -->
    <div class="dashboard-header mb-4">
        <div>
            <h1 class="fw-bold text-dark mb-1">Dashboard Penjualan</h1>
            <p class="text-muted">Pantau performa penjualan Anda secara real-time</p>
        </div>
    </div>

    <!-- Filter Tanggal -->
    <div class="filter-card mb-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <form method="GET" action="{{ route('dashboard.sales') }}" id="filterForm">
                    <div class="row g-3 align-items-end">
                        <div class="col-lg-4">
                            <label for="start_date" class="form-label fw-semibold text-dark">Tanggal Mulai</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0"><i class="fas fa-calendar"></i></span>
                                <input type="date" class="form-control border-start-0" id="start_date" name="start_date" 
                                       value="{{ $startDate ?? '' }}">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label for="end_date" class="form-label fw-semibold text-dark">Tanggal Akhir</label>
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0"><i class="fas fa-calendar"></i></span>
                                <input type="date" class="form-control border-start-0" id="end_date" name="end_date" 
                                       value="{{ $endDate ?? '' }}">
                            </div>
                        </div>
                        <div class="col-lg-4 d-flex gap-2">
                            <button type="submit" class="btn btn-primary flex-grow-1 fw-semibold">
                                <i class="fas fa-filter me-2"></i>Filter
                            </button>
                            <a href="{{ route('dashboard.sales') }}" class="btn btn-outline-secondary fw-semibold">
                                <i class="fas fa-redo me-2"></i>Reset
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Statistik Cards -->
    <div class="row mb-4 g-3">
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm stat-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <p class="text-muted mb-2">Total Penjualan</p>
                            <h3 class="fw-bold text-success mb-0">Rp {{ number_format($totalSales, 0, ',', '.') }}</h3>
                        </div>
                        <div class="stat-icon bg-success bg-opacity-10">
                            <i class="fas fa-money-bill-wave text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm stat-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <p class="text-muted mb-2">Total Item Terjual</p>
                            <h3 class="fw-bold text-info mb-0">{{ $totalQuantity }} <span class="fs-6">unit</span></h3>
                        </div>
                        <div class="stat-icon bg-info bg-opacity-10">
                            <i class="fas fa-shopping-cart text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm stat-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <p class="text-muted mb-2">Jumlah Transaksi</p>
                            <h3 class="fw-bold text-warning mb-0">{{ count($sales) }} <span class="fs-6">transaksi</span></h3>
                        </div>
                        <div class="stat-icon bg-warning bg-opacity-10">
                            <i class="fas fa-receipt text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Data Penjualan -->
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="card-title fw-bold mb-0">Data Penjualan Detail</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="fw-semibold">No</th>
                                    <th class="fw-semibold">Nama Produk</th>
                                    <th class="fw-semibold">Tanggal Penjualan</th>
                                    <th class="fw-semibold">Kuantitas</th>
                                    <th class="fw-semibold">Harga (Rp)</th>
                                    <th class="fw-semibold">Total (Rp)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($sales as $item)
                                <tr class="table-row-hover">
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="fw-semibold">{{ $item->product_name }}</td>
                                    <td>
                                        <span class="badge bg-light text-dark">
                                            {{ $item->sale_date->format('d M Y') }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge bg-info">{{ $item->quantity }}</span>
                                    </td>
                                    <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                    <td class="fw-bold text-success">Rp {{ number_format($item->quantity * $item->price, 0, ',', '.') }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <div class="text-muted">
                                            <i class="fas fa-inbox fs-3 d-block mb-2"></i>
                                            Tidak ada data penjualan
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Grafik Tren Penjualan -->
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="card-title fw-bold mb-0">Tren Penjualan</h5>
                </div>
                <div class="card-body">
                    @if($chartData->count() > 0)
                        <div class="chart-container">
                            <canvas id="chartTren"></canvas>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <p class="text-muted">Tidak ada data untuk ditampilkan</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
<script>
    const chartLabels = {!! json_encode($chartData->keys()->toArray()) !!};
    const chartValues = {!! json_encode($chartData->values()->toArray()) !!};

    if (chartLabels.length > 0) {
        const ctx = document.getElementById('chartTren').getContext('2d');
        let chartInstance = null;

        function createChart() {
            if (chartInstance) {
                chartInstance.destroy();
            }
            
            chartInstance = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: chartLabels,
                    datasets: [{
                        label: 'Total Penjualan (Rp)',
                        data: chartValues,
                        borderColor: '#0d6efd',
                        backgroundColor: 'rgba(13, 110, 253, 0.08)',
                        borderWidth: 3,
                        tension: 0.4,
                        fill: true,
                        pointRadius: 6,
                        pointBackgroundColor: '#0d6efd',
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2,
                        pointHoverRadius: 8,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                            labels: {
                                usePointStyle: true,
                                padding: 20,
                                font: { size: 14, weight: 'bold' }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return 'Rp ' + value.toLocaleString('id-ID');
                                },
                                font: { size: 12 }
                            },
                            grid: {
                                drawBorder: false,
                            }
                        },
                        x: {
                            grid: {
                                drawBorder: false,
                                display: false
                            }
                        }
                    }
                }
            });
        }

        // Inisialisasi chart pertama kali
        createChart();

        // Handle window resize
        let resizeTimer;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                createChart();
            }, 250);
        });
    }
</script>
@endsection
@endsection
@extends('layouts.admin')

@section('title', 'Laporan - Sistem Perpustakaan MAN 2 Kota Payakumbuh')
@section('page-title', 'Laporan Pengunjung Perpustakaan')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/laporan.css') }}">
@endpush

@section('content')
<div class="laporan-container">
    <div class="laporan-header">
        <div class="laporan-title-section">
            <h1>Laporan Pengunjung</h1>
            <p>Analisis data kunjungan perpustakaan</p>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="filter-section">
        <form id="filterForm" method="GET" action="{{ route('admin.laporan') }}" class="filter-form">
            <div class="form-group">
                <label class="form-label">Periode</label>
                <select name="periode" class="form-select" id="periodeSelect">
                    <option value="hari_ini" {{ $periode == 'hari_ini' ? 'selected' : '' }}>Hari Ini</option>
                    <option value="minggu_ini" {{ $periode == 'minggu_ini' ? 'selected' : '' }}>Minggu Ini</option>
                    <option value="bulan_ini" {{ $periode == 'bulan_ini' ? 'selected' : '' }}>Bulan Ini</option>
                    <option value="tahun_ini" {{ $periode == 'tahun_ini' ? 'selected' : '' }}>Tahun Ini</option>
                    <option value="custom" {{ $periode == 'custom' ? 'selected' : '' }}>Custom</option>
                </select>
            </div>

            <div class="form-group" id="startDateGroup" style="{{ $periode == 'custom' ? '' : 'display: none;' }}">
                <label class="form-label">Dari Tanggal</label>
                <input type="date" name="start_date" class="form-control" value="{{ $startDate }}">
            </div>

            <div class="form-group" id="endDateGroup" style="{{ $periode == 'custom' ? '' : 'display: none;' }}">
                <label class="form-label">Sampai Tanggal</label>
                <input type="date" name="end_date" class="form-control" value="{{ $endDate }}">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-filter">
                    <i class="fas fa-filter"></i>
                    Filter
                </button>
            </div>

            <div class="form-group">
                <button type="button" class="btn btn-export" id="exportBtn">
                    <i class="fas fa-download"></i>
                    Export
                </button>
            </div>
        </form>
    </div>

    <!-- Statistics Cards -->
    <div class="stats-container">
        <div class="stat-card">
            <div class="stat-icon primary">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-content">
                <div class="stat-value">{{ number_format($totalPengunjung) }}</div>
                <div class="stat-label">Total Pengunjung</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon success">
                <i class="fas fa-calendar-day"></i>
            </div>
            <div class="stat-content">
                <div class="stat-value">{{ number_format($pengunjungHariIni) }}</div>
                <div class="stat-label">Hari Ini</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon warning">
                <i class="fas fa-calendar-alt"></i>
            </div>
            <div class="stat-content">
                <div class="stat-value">{{ number_format($pengunjungBulanIni) }}</div>
                <div class="stat-label">Bulan Ini</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon info">
                <i class="fas fa-chart-line"></i>
            </div>
            <div class="stat-content">
                <div class="stat-value">{{ number_format($totalSemuaPengunjung) }}</div>
                <div class="stat-label">Total Semua Waktu</div>
            </div>
        </div>
    </div>

    <!-- Chart Section -->
    <div class="chart-section">
        <div class="chart-header">
            <h3 class="chart-title">
                <i class="fas fa-chart-bar"></i>
                Grafik Kunjungan
            </h3>
        </div>
        <div class="chart-container">
            <div class="chart-bars">
                @php
                    $maxData = max($grafikData['data']) > 0 ? max($grafikData['data']) : 1;
                @endphp

                @foreach ($grafikData['data'] as $index => $value)
                    @php
                        $height = $maxData > 0 ? ($value / $maxData) * 180 : 5;
                    @endphp

                    <div class="chart-bar" style="height: {{ $height }}px" data-value="{{ $value }}"
                         title="{{ $grafikData['labels'][$index] }}: {{ $value }} pengunjung">
                        <div class="chart-bar-value">{{ $value }}</div>
                    </div>
                @endforeach
            </div>

            <div class="chart-labels">
                @foreach ($grafikData['labels'] as $label)
                    <div class="chart-label" title="{{ $label }}">{{ $label }}</div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Gender Statistics -->
    <div class="gender-stats">
        <div class="gender-card">
            <div class="gender-icon male">
                <i class="fas fa-male"></i>
            </div>
            <div class="gender-count">{{ $statistikJenisKelamin['Laki-laki'] ?? 0 }}</div>
            <div class="gender-label">Laki-laki</div>
        </div>

        <div class="gender-card">
            <div class="gender-icon female">
                <i class="fas fa-female"></i>
            </div>
            <div class="gender-count">{{ $statistikJenisKelamin['Perempuan'] ?? 0 }}</div>
            <div class="gender-label">Perempuan</div>
        </div>
    </div>

    <!-- Purpose Statistics -->
    <div class="data-section">
        <div class="section-header">
            <h3 class="section-title">
                <i class="fas fa-chart-pie"></i>
                Statistik Keperluan Kunjungan
            </h3>
        </div>
        <div class="card-body">
            <div class="purpose-stats">
                @foreach ($statistikKeperluan as $item)
                    @php
                        $percentage = $totalSemuaPengunjung > 0 ? ($item->total / $totalSemuaPengunjung) * 100 : 0;
                    @endphp
                    <div class="purpose-item">
                        <div class="purpose-name">{{ $item->keperluan }}</div>
                        <div class="purpose-count">{{ $item->total }}</div>
                        <div class="purpose-bar">
                            <div class="purpose-progress" style="width: {{ $percentage }}%"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Data Table -->
    <div class="data-section">
        <div class="section-header">
            <h3 class="section-title">
                <i class="fas fa-table"></i>
                Data Kunjungan
            </h3>
        </div>
        <div class="card-body p-0">
            @if($pengunjungs->count() > 0)
            <div class="table-responsive">
                <table class="laporan-table table table-hover">
                    <thead>
                        <tr>
                            <th width="50">#</th>
                            <th>Nama Lengkap</th>
                            <th width="100">Jenis Kelamin</th>
                            <th width="80">Usia</th>
                            <th>Keperluan</th>
                            <th>Yang Dicari</th>
                            <th width="120">Tanggal</th>
                            <th width="100">Jam</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pengunjungs as $index => $pengunjung)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <strong>{{ $pengunjung->nama_lengkap }}</strong>
                            </td>
                            <td>
                                <span class="badge {{ $pengunjung->jenis_kelamin == 'Laki-laki' ? 'badge-primary' : 'badge-info' }}">
                                    {{ $pengunjung->jenis_kelamin }}
                                </span>
                            </td>
                            <td>{{ $pengunjung->usia }} thn</td>
                            <td>{{ $pengunjung->keperluan }}</td>
                            <td>{{ $pengunjung->yang_dicari ?? '-' }}</td>
                            <td>
                                <span class="badge badge-success">
                                    {{ \Carbon\Carbon::parse($pengunjung->tanggal_kunjungan)->format('d M Y') }}
                                </span>
                            </td>
                            <td>{{ $pengunjung->jam_kunjungan }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="empty-state">
                <i class="fas fa-users-slash"></i>
                <h4>Tidak ada data kunjungan</h4>
                <p>Tidak ada data pengunjung untuk periode yang dipilih</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Toggle custom date inputs
    const periodeSelect = document.getElementById('periodeSelect');
    const startDateGroup = document.getElementById('startDateGroup');
    const endDateGroup = document.getElementById('endDateGroup');

    periodeSelect.addEventListener('change', function() {
        if (this.value === 'custom') {
            startDateGroup.style.display = 'block';
            endDateGroup.style.display = 'block';
        } else {
            startDateGroup.style.display = 'none';
            endDateGroup.style.display = 'none';
        }
    });

    // Chart bar interactions
    const chartBars = document.querySelectorAll('.chart-bar');
    chartBars.forEach(bar => {
        bar.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.05)';
            this.style.opacity = '0.9';
        });

        bar.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
            this.style.opacity = '1';
        });
    });

    // Export functionality
    document.getElementById('exportBtn').addEventListener('click', function() {
        const form = document.getElementById('filterForm');
        const formData = new FormData(form);
        const params = new URLSearchParams(formData);

        Swal.fire({
            title: 'Export Data?',
            text: 'Data akan diexport dalam format Excel',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Export!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Show loading
                Swal.fire({
                    title: 'Memproses...',
                    text: 'Sedang menyiapkan data untuk export',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                // Simulate export process
                fetch(`{{ route('admin.laporan.export') }}?${params}`, {
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: data.message,
                        icon: 'success',
                        confirmButtonColor: '#28a745'
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        title: 'Error!',
                        text: 'Terjadi kesalahan saat export data',
                        icon: 'error',
                        confirmButtonColor: '#dc3545'
                    });
                });
            }
        });
    });

    // Animate chart bars on load
    setTimeout(() => {
        chartBars.forEach((bar, index) => {
            setTimeout(() => {
                bar.style.transition = 'all 0.5s ease';
            }, index * 100);
        });
    }, 500);
});
</script>
@endpush
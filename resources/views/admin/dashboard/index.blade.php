@extends('layouts.admin')

@section('title', 'Dashboard - Sistem Perpustakaan MAN 2 Kota Payakumbuh')
@section('page-title', 'Dashboard Perpustakaan')

@section('content')
    <div class="dashboard-welcome">
        <h2>Selamat Datang, {{ Auth::guard('admin')->user()->nama_lengkap ?? 'Admin' }}!</h2>
        <p>Berikut adalah ringkasan aktivitas perpustakaan hari ini</p>
    </div>

    <div class="stats-container">
        <!-- Stat Card untuk Total Buku -->
        <div class="stat-card">
            <div class="stat-card-header">
                <div>
                    <div class="stat-card-title">Total Buku</div>
                    <div class="stat-card-value">{{ number_format($bukuStats['total']) }}</div>
                    <div class="stat-card-period">Judul</div>
                </div>
                <div class="stat-card-icon">
                    <i class="fas fa-book"></i>
                </div>
            </div>
            <div class="stat-card-footer">
                @if ($bukuStats['trend'] == 'up')
                    <div class="stat-card-trend trend-up">
                        <i class="fas fa-arrow-up"></i> {{ $bukuStats['persentase'] }}%
                    </div>
                @elseif($bukuStats['trend'] == 'down')
                    <div class="stat-card-trend trend-down">
                        <i class="fas fa-arrow-down"></i> {{ $bukuStats['persentase'] }}%
                    </div>
                @else
                    <div class="stat-card-trend">
                        <i class="fas fa-minus"></i> 0%
                    </div>
                @endif
                <span>{{ $bukuStats['label'] }}</span>
            </div>
        </div>

        <!-- Stat Card untuk Total Admin -->
        <div class="stat-card">
            <div class="stat-card-header">
                <div>
                    <div class="stat-card-title">Total Admin</div>
                    <div class="stat-card-value">{{ number_format($totalAdmin) }}</div>
                    <div class="stat-card-period">Pengelola</div>
                </div>
                <div class="stat-card-icon">
                    <i class="fas fa-user-shield"></i>
                </div>
            </div>
            <a href="{{ route('admin.manajemen-admin') }}" class="stat-card-footer d-flex justify-content-between align-items-center text-decoration-none text-dark">
                <span>Lihat Semua</span>
                <div class="stat-card-trend">
                    <i class="fas fa-chevron-right"></i>
                </div>
            </a>
        </div>

        <!-- Stat Card untuk Total Pengunjung -->
        <div class="stat-card">
            <div class="stat-card-header">
                <div>
                    <div class="stat-card-title">Total Pengunjung</div>
                    <div class="stat-card-value">{{ number_format($totalPengunjung) }}</div>
                    <div class="stat-card-period">Semua Waktu</div>
                </div>
                <div class="stat-card-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
            </div>
            <div class="stat-card-footer">
                @if ($pengunjungStats['trend'] == 'up')
                    <div class="stat-card-trend trend-up">
                        <i class="fas fa-arrow-up"></i> {{ $pengunjungStats['persentase'] }}%
                    </div>
                @elseif($pengunjungStats['trend'] == 'down')
                    <div class="stat-card-trend trend-down">
                        <i class="fas fa-arrow-down"></i> {{ $pengunjungStats['persentase'] }}%
                    </div>
                @else
                    <div class="stat-card-trend">
                        <i class="fas fa-minus"></i> 0%
                    </div>
                @endif
                <span>{{ $pengunjungStats['label'] }}</span>
            </div>
        </div>
    </div>

    <div class="chart-container">
        <div class="chart-header">
            <div class="chart-title">Grafik Pengunjung</div>
            <div class="chart-actions">
                <form id="filterForm" method="GET" action="{{ route('admin.dashboard') }}">
                    <select name="periode" class="chart-period-selector"
                        onchange="document.getElementById('filterForm').submit()">
                        <option value="minggu_ini" {{ $periode == 'minggu_ini' ? 'selected' : '' }}>Minggu Ini</option>
                        <option value="bulan_ini" {{ $periode == 'bulan_ini' ? 'selected' : '' }}>Bulan Ini</option>
                        <option value="tahun_ini" {{ $periode == 'tahun_ini' ? 'selected' : '' }}>Tahun Ini</option>
                    </select>
                </form>
            </div>
        </div>

        <div class="chart-area">
            <div class="chart-bars">
                @php
                    $maxData = max($grafikData['data']) > 0 ? max($grafikData['data']) : 1;
                    $currentMonth = Carbon\Carbon::now()->month;
                    $currentDay = Carbon\Carbon::now()->day;
                    $currentWeekDay = Carbon\Carbon::now()->dayOfWeek;
                @endphp

                @foreach ($grafikData['data'] as $index => $value)
                    @php
                        $height = $maxData > 0 ? ($value / $maxData) * 180 : 5;
                        $isCurrent = false;

                        if ($grafikData['type'] == 'tahun' && $index + 1 == $currentMonth) {
                            $isCurrent = true;
                        } elseif ($grafikData['type'] == 'bulan') {
                            $groupSize = ceil(Carbon\Carbon::now()->daysInMonth / $grafikData['total_items']);
                            $startDay = $index * $groupSize + 1;
                            $endDay = min(($index + 1) * $groupSize, Carbon\Carbon::now()->daysInMonth);
                            $isCurrent = $currentDay >= $startDay && $currentDay <= $endDay;
                        } elseif ($grafikData['type'] == 'minggu') {
                            $isCurrent = $index == $currentWeekDay - 1;
                        }
                    @endphp

                    <div class="chart-bar {{ $isCurrent ? 'chart-bar-highlight' : '' }}"
                        style="height: {{ $height }}px" data-value="{{ $value }}"
                        data-label="{{ $grafikData['labels'][$index] }}"
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

            <div class="chart-stats">
                <div class="chart-stat-item">
                    <div class="chart-stat-value">{{ $totalGrafik }}</div>
                    <div class="chart-stat-label">
                        Total Pengunjung
                        @if ($periode == 'minggu_ini')
                            Minggu Ini
                        @elseif($periode == 'bulan_ini')
                            Bulan Ini
                        @else
                            Tahun Ini
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
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

@extends('layouts.admin')

@section('title', 'Dashboard - Sistem Perpustakaan MAN 2 Kota Payakumbuh')
@section('page-title', 'Dashboard Perpustakaan')

@section('content')
<!-- Welcome Section -->
<div class="dashboard-welcome">
    <h2>Selamat Datang, Janett!</h2>
    <p>Berikut adalah ringkasan aktivitas perpustakaan hari ini</p>
</div>

<!-- Stats Cards -->
<div class="stats-container">
    <div class="stat-card">
        <div class="stat-card-header">
            <div>
                <div class="stat-card-title">Total Anggota</div>
                <div class="stat-card-value">1,254</div>
                <div class="stat-card-period">Terdaftar</div>
            </div>
            <div class="stat-card-icon">
                <i class="fas fa-users"></i>
            </div>
        </div>
        <div class="stat-card-footer">
            <div class="stat-card-trend trend-up">
                <i class="fas fa-arrow-up"></i> 5.2%
            </div>
            <span>Dari bulan lalu</span>
        </div>
    </div>
    
    <div class="stat-card">
        <div class="stat-card-header">
            <div>
                <div class="stat-card-title">Total Buku</div>
                <div class="stat-card-value">8,742</div>
                <div class="stat-card-period">Judul</div>
            </div>
            <div class="stat-card-icon">
                <i class="fas fa-book"></i>
            </div>
        </div>
        <div class="stat-card-footer">
            <div class="stat-card-trend trend-up">
                <i class="fas fa-arrow-up"></i> 2.1%
            </div>
            <span>Penambahan bulan ini</span>
        </div>
    </div>
    
    <div class="stat-card">
        <div class="stat-card-header">
            <div>
                <div class="stat-card-title">Total Admin</div>
                <div class="stat-card-value">12</div>
                <div class="stat-card-period">Pengelola</div>
            </div>
            <div class="stat-card-icon">
                <i class="fas fa-user-shield"></i>
            </div>
        </div>
        <div class="stat-card-footer">
            <div class="stat-card-trend">
                <i class="fas fa-minus"></i> 0%
            </div>
            <span>Tidak berubah</span>
        </div>
    </div>
    
    <div class="stat-card">
        <div class="stat-card-header">
            <div>
                <div class="stat-card-title">Total Pengunjung</div>
                <div class="stat-card-value">3,458</div>
                <div class="stat-card-period">Bulan Ini</div>
            </div>
            <div class="stat-card-icon">
                <i class="fas fa-chart-line"></i>
            </div>
        </div>
        <div class="stat-card-footer">
            <div class="stat-card-trend trend-up">
                <i class="fas fa-arrow-up"></i> 12.5%
            </div>
            <span>Dari bulan lalu</span>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="quick-actions">
    <div class="quick-action-card">
        <div class="quick-action-icon">
            <i class="fas fa-plus"></i>
        </div>
        <div class="quick-action-title">Tambah Buku</div>
        <div class="quick-action-desc">Tambahkan buku baru ke katalog</div>
    </div>
    
    <div class="quick-action-card">
        <div class="quick-action-icon">
            <i class="fas fa-user-plus"></i>
        </div>
        <div class="quick-action-title">Daftar Anggota</div>
        <div class="quick-action-desc">Registrasi anggota baru</div>
    </div>
    
    <div class="quick-action-card">
        <div class="quick-action-icon">
            <i class="fas fa-exchange-alt"></i>
        </div>
        <div class="quick-action-title">Peminjaman</div>
        <div class="quick-action-desc">Proses peminjaman buku</div>
    </div>
    
    <div class="quick-action-card">
        <div class="quick-action-icon">
            <i class="fas fa-undo-alt"></i>
        </div>
        <div class="quick-action-title">Pengembalian</div>
        <div class="quick-action-desc">Proses pengembalian buku</div>
    </div>
</div>

<!-- Chart Section -->
<div class="chart-container">
    <div class="chart-header">
        <div class="chart-title">Grafik Peminjaman Buku</div>
        <div class="chart-actions">
            <select class="chart-period-selector">
                <option>Minggu Ini</option>
                <option>Bulan Ini</option>
                <option selected>Tahun Ini</option>
            </select>
        </div>
    </div>
    
    <div class="chart-stats">
        <div class="chart-stat-item">
            <div class="chart-stat-value">245</div>
            <div class="chart-stat-label">Peminjaman Bulan Ini</div>
        </div>
        <div class="chart-stat-item">
            <div class="chart-stat-value">189</div>
            <div class="chart-stat-label">Pengembalian Bulan Ini</div>
        </div>
        <div class="chart-stat-item">
            <div class="chart-stat-value">56</div>
            <div class="chart-stat-label">Sedang Dipinjam</div>
        </div>
        <div class="chart-stat-item">
            <div class="chart-stat-value">12</div>
            <div class="chart-stat-label">Keterlambatan</div>
        </div>
    </div>
    
    <div class="chart-area">
        <div class="chart-bars">
            <div class="chart-bar" data-height="120" data-value="42" data-label="Januari">
                <div class="chart-bar-value">42</div>
            </div>
            <div class="chart-bar" data-height="150" data-value="53" data-label="Februari">
                <div class="chart-bar-value">53</div>
            </div>
            <div class="chart-bar" data-height="180" data-value="64" data-label="Maret">
                <div class="chart-bar-value">64</div>
            </div>
            <div class="chart-bar" data-height="160" data-value="57" data-label="April">
                <div class="chart-bar-value">57</div>
            </div>
            <div class="chart-bar" data-height="190" data-value="68" data-label="Mei">
                <div class="chart-bar-value">68</div>
            </div>
            <div class="chart-bar chart-bar-highlight" data-height="220" data-value="79" data-label="Juni">
                <div class="chart-bar-value">79</div>
            </div>
            <div class="chart-bar" data-height="200" data-value="72" data-label="Juli">
                <div class="chart-bar-value">72</div>
            </div>
            <div class="chart-bar" data-height="170" data-value="61" data-label="Agustus">
                <div class="chart-bar-value">61</div>
            </div>
            <div class="chart-bar" data-height="140" data-value="50" data-label="September">
                <div class="chart-bar-value">50</div>
            </div>
            <div class="chart-bar" data-height="160" data-value="57" data-label="Oktober">
                <div class="chart-bar-value">57</div>
            </div>
            <div class="chart-bar" data-height="180" data-value="64" data-label="November">
                <div class="chart-bar-value">64</div>
            </div>
            <div class="chart-bar" data-height="210" data-value="75" data-label="Desember">
                <div class="chart-bar-value">75</div>
            </div>
        </div>
        
        <div class="chart-labels">
            <div class="chart-label">Jan</div>
            <div class="chart-label">Feb</div>
            <div class="chart-label">Mar</div>
            <div class="chart-label">Apr</div>
            <div class="chart-label">Mei</div>
            <div class="chart-label">Jun</div>
            <div class="chart-label">Jul</div>
            <div class="chart-label">Agu</div>
            <div class="chart-label">Sep</div>
            <div class="chart-label">Okt</div>
            <div class="chart-label">Nov</div>
            <div class="chart-label">Des</div>
        </div>
    </div>
</div>
@endsection
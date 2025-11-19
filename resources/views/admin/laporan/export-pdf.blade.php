<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pengunjung - PDF</title>
    <style>
        /* Print Styles */
        @media print {
            @page {
                size: A4;
                margin: 1cm;
            }
            
            body {
                font-family: 'Arial', sans-serif;
                line-height: 1.4;
                color: #000;
                background: white;
                margin: 0;
                padding: 0;
            }
            
            .no-print {
                display: none !important;
            }
            
            .page-break {
                page-break-after: always;
            }
            
            .header {
                text-align: center;
                margin-bottom: 20px;
                padding-bottom: 15px;
                border-bottom: 2px solid #333;
            }
            
            .header h1 {
                color: #01747B;
                font-size: 22px;
                margin: 0 0 5px 0;
            }
            
            .header h2 {
                color: #333;
                font-size: 16px;
                margin: 0 0 10px 0;
            }
            
            .info-grid {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 10px;
                margin: 15px 0;
                font-size: 12px;
            }
            
            .info-item {
                background: #f8f9fa;
                padding: 8px;
                border-radius: 4px;
                text-align: center;
            }
            
            .stats-grid {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                gap: 10px;
                margin: 20px 0;
            }
            
            .stat-card {
                background: white;
                border: 1px solid #ddd;
                border-radius: 6px;
                padding: 12px;
                text-align: center;
            }
            
            .stat-number {
                font-size: 18px;
                font-weight: bold;
                color: #01747B;
                margin-bottom: 5px;
            }
            
            .stat-label {
                font-size: 11px;
                color: #666;
            }
            
            .table-container {
                margin: 20px 0;
            }
            
            .data-table {
                width: 100%;
                border-collapse: collapse;
                font-size: 10px;
            }
            
            .data-table th {
                background: #01747B;
                color: white;
                padding: 8px 6px;
                text-align: left;
                border: 1px solid #ddd;
                font-weight: bold;
            }
            
            .data-table td {
                padding: 6px;
                border: 1px solid #ddd;
            }
            
            .data-table tr:nth-child(even) {
                background: #f8f9fa;
            }
            
            .badge {
                padding: 3px 8px;
                border-radius: 10px;
                font-size: 9px;
                font-weight: bold;
            }
            
            .badge-primary {
                background: #007bff;
                color: white;
            }
            
            .badge-info {
                background: #00D2DF;
                color: white;
            }
            
            .badge-success {
                background: #28a745;
                color: white;
            }
            
            .gender-stats {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
                margin: 20px 0;
            }
            
            .gender-card {
                text-align: center;
                padding: 15px;
                border: 1px solid #ddd;
                border-radius: 6px;
            }
            
            .gender-count {
                font-size: 24px;
                font-weight: bold;
                margin: 10px 0;
            }
            
            .male .gender-count { color: #007bff; }
            .female .gender-count { color: #e83e8c; }
            
            .footer {
                margin-top: 30px;
                padding-top: 15px;
                border-top: 1px solid #ddd;
                text-align: center;
                font-size: 11px;
                color: #666;
            }
        }

        /* Screen Styles */
        @media screen {
            body {
                font-family: 'Arial', sans-serif;
                margin: 20px;
                background: #f5f5f5;
            }
            
            .print-container {
                max-width: 210mm;
                margin: 0 auto;
                background: white;
                padding: 20mm;
                box-shadow: 0 0 10px rgba(0,0,0,0.1);
            }
            
            .print-actions {
                text-align: center;
                margin-bottom: 20px;
                padding: 15px;
                background: white;
                border-radius: 8px;
                box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            }
            
            .btn {
                padding: 10px 20px;
                margin: 0 10px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-weight: bold;
            }
            
            .btn-print {
                background: #28a745;
                color: white;
            }
            
            .btn-cancel {
                background: #dc3545;
                color: white;
            }

            body {
                font-family: 'Arial', sans-serif;
                line-height: 1.4;
                color: #000;
                background: white;
                margin: 0;
                padding: 0;
            }
            
            .no-print {
                display: none !important;
            }
            
            .page-break {
                page-break-after: always;
            }
            
            .header {
                text-align: center;
                margin-bottom: 20px;
                padding-bottom: 15px;
                border-bottom: 2px solid #333;
            }
            
            .header h1 {
                color: #01747B;
                font-size: 22px;
                margin: 0 0 5px 0;
            }
            
            .header h2 {
                color: #333;
                font-size: 16px;
                margin: 0 0 10px 0;
            }
            
            .info-grid {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 10px;
                margin: 15px 0;
                font-size: 12px;
            }
            
            .info-item {
                background: #f8f9fa;
                padding: 8px;
                border-radius: 4px;
                text-align: center;
            }
            
            .stats-grid {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                gap: 10px;
                margin: 20px 0;
            }
            
            .stat-card {
                background: white;
                border: 1px solid #ddd;
                border-radius: 6px;
                padding: 12px;
                text-align: center;
            }
            
            .stat-number {
                font-size: 18px;
                font-weight: bold;
                color: #01747B;
                margin-bottom: 5px;
            }
            
            .stat-label {
                font-size: 11px;
                color: #666;
            }
            
            .table-container {
                margin: 20px 0;
            }
            
            .data-table {
                width: 100%;
                border-collapse: collapse;
                font-size: 10px;
            }
            
            .data-table th {
                background: #01747B;
                color: white;
                padding: 8px 6px;
                text-align: left;
                border: 1px solid #ddd;
                font-weight: bold;
            }
            
            .data-table td {
                padding: 6px;
                border: 1px solid #ddd;
            }
            
            .data-table tr:nth-child(even) {
                background: #f8f9fa;
            }
            
            .badge {
                padding: 3px 8px;
                border-radius: 10px;
                font-size: 9px;
                font-weight: bold;
            }
            
            .badge-primary {
                background: #007bff;
                color: white;
            }
            
            .badge-info {
                background: #00D2DF;
                color: white;
            }
            
            .badge-success {
                background: #28a745;
                color: white;
            }
            
            .gender-stats {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
                margin: 20px 0;
            }
            
            .gender-card {
                text-align: center;
                padding: 15px;
                border: 1px solid #ddd;
                border-radius: 6px;
            }
            
            .gender-count {
                font-size: 24px;
                font-weight: bold;
                margin: 10px 0;
            }
            
            .male .gender-count { color: #007bff; }
            .female .gender-count { color: #e83e8c; }
            
            .footer {
                margin-top: 30px;
                padding-top: 15px;
                border-top: 1px solid #ddd;
                text-align: center;
                font-size: 11px;
                color: #666;
            }
        }
    </style>
</head>
<body>
    <div class="no-print print-actions">
        <button class="btn btn-print" onclick="window.print()">🖨️ Cetak / Save as PDF</button>
        <button class="btn btn-cancel" onclick="window.close()">❌ Tutup</button>
        <p style="margin-top: 10px; font-size: 12px; color: #666;">
            Gunakan fitur print browser dan pilih "Save as PDF" untuk download file PDF
        </p>
    </div>

    <div class="print-container">
        <!-- Header -->
        <div class="header">
            <h1>LAPORAN PENGUNJUNG PERPUSTAKAAN</h1>
            <h2>MAN 2 Kota Payakumbuh</h2>
            <div class="info-grid">
                <div class="info-item">
                    <strong>Periode:</strong><br>
                    {{ ucfirst(str_replace('_', ' ', $periode)) }}
                </div>
                <div class="info-item">
                    <strong>Total Data:</strong><br>
                    {{ number_format($totalPengunjung) }} Pengunjung
                </div>
                <div class="info-item">
                    <strong>Tanggal Cetak:</strong><br>
                    {{ $tanggalExport }}
                </div>
            </div>
        </div>

        <!-- Statistics -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number">{{ number_format($totalPengunjung) }}</div>
                <div class="stat-label">Total Periode Ini</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ number_format($pengunjungHariIni) }}</div>
                <div class="stat-label">Hari Ini</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ number_format($pengunjungBulanIni) }}</div>
                <div class="stat-label">Bulan Ini</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ number_format($totalSemuaPengunjung) }}</div>
                <div class="stat-label">Total Semua</div>
            </div>
        </div>

        <!-- Gender Statistics -->
        <div class="gender-stats">
            <div class="gender-card male">
                <div style="font-size: 20px;">👨</div>
                <div class="gender-count">{{ number_format($statistikJenisKelamin['Laki-laki'] ?? 0) }}</div>
                <div class="stat-label">Laki-laki</div>
            </div>
            <div class="gender-card female">
                <div style="font-size: 20px;">👩</div>
                <div class="gender-count">{{ number_format($statistikJenisKelamin['Perempuan'] ?? 0) }}</div>
                <div class="stat-label">Perempuan</div>
            </div>
        </div>

        <!-- Data Table -->
        <div class="table-container">
            <h3 style="color: #01747B; margin-bottom: 15px; font-size: 16px;">DATA KUNJUNGAN</h3>
            <table class="data-table">
                <thead>
                    <tr>
                        <th width="30">#</th>
                        <th>Nama Lengkap</th>
                        <th width="80">Jenis Kelamin</th>
                        <th width="50">Usia</th>
                        <th>Keperluan</th>
                        <th>Yang Dicari</th>
                        <th width="80">Tanggal</th>
                        <th width="60">Jam</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pengunjungs as $index => $pengunjung)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $pengunjung->nama_lengkap }}</td>
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
                                {{ \Carbon\Carbon::parse($pengunjung->tanggal_kunjungan)->format('d/m/Y') }}
                            </span>
                        </td>
                        <td>{{ $pengunjung->jam_kunjungan }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" style="text-align: center; padding: 20px; color: #666;">
                            Tidak ada data kunjungan untuk periode yang dipilih
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p><strong>Dicetak oleh Sistem Perpustakaan MAN 2 Kota Payakumbuh</strong></p>
            <p>Laporan ini digenerate secara otomatis pada {{ $tanggalExport }}</p>
        </div>
    </div>

    <script>
        @if(isset($autoPrint) && $autoPrint)
        window.onload = function() {
            setTimeout(function() {
                window.print();
            }, 500);
        }
        @endif

        window.addEventListener('afterprint', function() {
            window.close();
        });
    </script>
</body>
</html>
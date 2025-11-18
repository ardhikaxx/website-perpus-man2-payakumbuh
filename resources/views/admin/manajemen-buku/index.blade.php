@extends('layouts.admin')

@section('title', 'Manajemen Buku - Sistem Perpustakaan MAN 2 Kota Payakumbuh')
@section('page-title', 'Manajemen Buku')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/manajemen-buku.css') }}">
@endpush

@section('content')
    <div class="manajemen-buku-container">
        <div class="buku-header">
            <div class="buku-title-section">
                <h1>Manajemen Buku</h1>
                <p>Kelola koleksi buku perpustakaan</p>
            </div>
            <button type="button" class="btn btn-add-buku" data-bs-toggle="modal" data-bs-target="#bukuModal"
                onclick="resetForm()">
                <i class="fas fa-plus"></i>
                Tambah Buku
            </button>
        </div>

        @php
            $stats = App\Models\Buku::getStats();
        @endphp
        <div class="book-stats">
            <div class="stat-card">
                <i class="fas fa-book"></i>
                <div class="stat-value">{{ number_format($stats['total']) }}</div>
                <div class="stat-label">Total Buku</div>
            </div>
            <div class="stat-card">
                <i class="fas fa-calendar-plus"></i>
                <div class="stat-value">{{ number_format($stats['bulan_ini']) }}</div>
                <div class="stat-label">Buku Bulan Ini</div>
            </div>
            <div class="stat-card">
                <i class="fas fa-chart-line"></i>
                <div class="stat-value">
                    @if ($stats['trend'] == 'up')
                        +{{ $stats['persentase'] }}%
                    @elseif($stats['trend'] == 'down')
                        -{{ $stats['persentase'] }}%
                    @else
                        0%
                    @endif
                </div>
                <div class="stat-label">{{ $stats['label'] }}</div>
            </div>
        </div>

        <div class="buku-card">
            <div class="buku-card-header">
                <h3 class="buku-card-title">
                    <i class="fas fa-book-open"></i>
                    Daftar Koleksi Buku
                </h3>
            </div>
            
            <!-- Search and Filter Section -->
            <div class="buku-toolbar">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" id="searchInput" placeholder="Cari judul, pengarang, atau penerbit..." 
                           value="{{ $search }}" onkeyup="handleSearch(event)">
                    <button class="btn-clear-search" onclick="clearSearch()" style="{{ $search ? '' : 'display: none;' }}">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="toolbar-actions">
                    <select id="perPageSelect" class="form-select per-page-select" onchange="changePerPage(this.value)">
                        <option value="5" {{ request('per_page', 10) == 5 ? 'selected' : '' }}>5 per halaman</option>
                        <option value="10" {{ request('per_page', 10) == 10 ? 'selected' : '' }}>10 per halaman</option>
                        <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25 per halaman</option>
                        <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50 per halaman</option>
                    </select>
                </div>
            </div>

            <div class="card-body p-0">
                <div id="bukuTableContainer">
                    @include('admin.manajemen-buku.partials.buku_table')
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="bukuModal" tabindex="-1" aria-labelledby="bukuModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bukuModalLabel">
                        <i class="fas fa-book-medical"></i>
                        <span id="modalTitle">Tambah Buku Baru</span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="bukuForm">
                    @csrf
                    <input type="hidden" id="bukuId" name="id">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="judul_buku" class="form-label">Judul Buku <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="judul_buku" name="judul_buku" required
                                        placeholder="Masukkan judul buku">
                                    <div class="invalid-feedback" id="judul_buku_error"></div>
                                </div>

                                <div class="form-group">
                                    <label for="pengarang" class="form-label">Pengarang <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="pengarang" name="pengarang" required
                                        placeholder="Masukkan nama pengarang">
                                    <div class="invalid-feedback" id="pengarang_error"></div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tahun_terbit" class="form-label">Tahun Terbit <span
                                                    class="text-danger">*</span></label>
                                            <input type="number" class="form-control" id="tahun_terbit"
                                                name="tahun_terbit" min="1900" max="{{ date('Y') + 1 }}" required
                                                placeholder="Tahun terbit">
                                            <div class="invalid-feedback" id="tahun_terbit_error"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jumlah_halaman" class="form-label">Jumlah Halaman <span
                                                    class="text-danger">*</span></label>
                                            <input type="number" class="form-control" id="jumlah_halaman"
                                                name="jumlah_halaman" min="1" required
                                                placeholder="Jumlah halaman">
                                            <div class="invalid-feedback" id="jumlah_halaman_error"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="penerbit" class="form-label">Penerbit <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="penerbit" name="penerbit" required
                                        placeholder="Masukkan nama penerbit">
                                    <div class="invalid-feedback" id="penerbit_error"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-submit" id="submitBtn">
                            <span id="submitText">Simpan</span>
                            <span id="submitSpinner" class="loading-spinner" style="display: none;"></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        let isEditMode = false;
        let searchTimeout = null;

        function resetForm() {
            isEditMode = false;
            document.getElementById('bukuForm').reset();
            document.getElementById('bukuId').value = '';
            document.getElementById('modalTitle').textContent = 'Tambah Buku Baru';
            document.getElementById('submitText').textContent = 'Simpan';

            clearValidationErrors();
        }

        function clearValidationErrors() {
            const errorElements = document.querySelectorAll('.invalid-feedback');
            errorElements.forEach(element => {
                element.textContent = '';
            });

            const inputElements = document.querySelectorAll('.form-control');
            inputElements.forEach(element => {
                element.classList.remove('is-invalid');
            });
        }

        // Pagination functions
        function loadPage(page) {
            const search = document.getElementById('searchInput').value;
            const perPage = document.getElementById('perPageSelect').value;
            
            updateTable({page: page, search: search, per_page: perPage});
        }

        function handleSearch(event) {
            if (event.key === 'Enter') {
                performSearch();
                return;
            }
            
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(performSearch, 500);
            
            // Toggle clear button visibility
            const clearBtn = document.querySelector('.btn-clear-search');
            if (event.target.value) {
                clearBtn.style.display = 'block';
            } else {
                clearBtn.style.display = 'none';
            }
        }

        function performSearch() {
            const search = document.getElementById('searchInput').value;
            const perPage = document.getElementById('perPageSelect').value;
            
            updateTable({search: search, per_page: perPage, page: 1});
        }

        function clearSearch() {
            document.getElementById('searchInput').value = '';
            document.querySelector('.btn-clear-search').style.display = 'none';
            performSearch();
        }

        function changePerPage(value) {
            const search = document.getElementById('searchInput').value;
            updateTable({per_page: value, search: search, page: 1});
        }

        function updateTable(params = {}) {
            const container = document.getElementById('bukuTableContainer');
            const loader = document.createElement('div');
            loader.className = 'table-loader';
            loader.innerHTML = '<div class="loading-spinner"></div><p>Memuat data...</p>';
            
            container.innerHTML = '';
            container.appendChild(loader);

            const url = new URL('{{ url('admin/manajemen-buku') }}');
            url.searchParams.append('ajax', '1');
            
            Object.keys(params).forEach(key => {
                if (params[key]) {
                    url.searchParams.append(key, params[key]);
                }
            });

            fetch(url, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    container.innerHTML = data.html;
                    
                    // Update stats if available
                    if (data.stats) {
                        updateStats(data.stats);
                    }
                } else {
                    container.innerHTML = '<div class="alert alert-danger">Gagal memuat data</div>';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                container.innerHTML = '<div class="alert alert-danger">Terjadi kesalahan saat memuat data</div>';
            });
        }

        function updateStats(stats) {
            // Update stat cards if needed
            const statCards = document.querySelectorAll('.stat-value');
            if (statCards.length >= 3) {
                statCards[0].textContent = formatNumber(stats.total);
                statCards[1].textContent = formatNumber(stats.bulan_ini);
                
                let trendHtml = '0%';
                if (stats.trend == 'up') {
                    trendHtml = `+${stats.persentase}%`;
                } else if (stats.trend == 'down') {
                    trendHtml = `-${stats.persentase}%`;
                }
                statCards[2].innerHTML = trendHtml;
            }
        }

        function formatNumber(num) {
            return new Intl.NumberFormat('id-ID').format(num);
        }

        function editBuku(id) {
            isEditMode = true;
            clearValidationErrors();

            const submitBtn = document.getElementById('submitBtn');
            const submitText = document.getElementById('submitText');

            submitBtn.disabled = true;
            submitText.textContent = 'Memuat...';

            const url = `{{ url('admin/manajemen-buku') }}/${id}`;

            fetch(url, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => {
                    const contentType = response.headers.get('content-type');
                    if (contentType && contentType.includes('text/html')) {
                        throw new Error('Server returned HTML instead of JSON');
                    }
                    if (!response.ok) {
                        throw new Error('Network response was not ok: ' + response.status);
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        const buku = data.buku;

                        document.getElementById('bukuId').value = buku.id;
                        document.getElementById('judul_buku').value = buku.judul_buku;
                        document.getElementById('pengarang').value = buku.pengarang;
                        document.getElementById('tahun_terbit').value = buku.tahun_terbit;
                        document.getElementById('penerbit').value = buku.penerbit;
                        document.getElementById('jumlah_halaman').value = buku.jumlah_halaman;
                        document.getElementById('modalTitle').textContent = 'Edit Buku';
                        document.getElementById('submitText').textContent = 'Perbarui';

                        const modal = new bootstrap.Modal(document.getElementById('bukuModal'));
                        modal.show();
                    } else {
                        throw new Error(data.message || 'Gagal memuat data buku');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire('Error', 'Gagal memuat data buku: ' + error.message, 'error');
                })
                .finally(() => {
                    submitBtn.disabled = false;
                    submitText.textContent = isEditMode ? 'Perbarui' : 'Simpan';
                });
        }

        function deleteBuku(id) {
            Swal.fire({
                title: 'Hapus Buku?',
                text: "Data buku yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    const url = `{{ url('admin/manajemen-buku') }}/${id}`;

                    fetch(url, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        })
                        .then(response => {
                            const contentType = response.headers.get('content-type');
                            if (contentType && contentType.includes('text/html')) {
                                throw new Error('Server returned HTML instead of JSON');
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.success) {
                                Swal.fire('Berhasil!', data.message, 'success').then(() => {
                                    // Reload table instead of full page
                                    updateTable();
                                });
                            } else {
                                Swal.fire('Error!', data.message, 'error');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            Swal.fire('Error!', 'Terjadi kesalahan saat menghapus buku', 'error');
                        });
                }
            });
        }

        document.getElementById('bukuForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const submitBtn = document.getElementById('submitBtn');
            const submitText = document.getElementById('submitText');
            const submitSpinner = document.getElementById('submitSpinner');

            submitBtn.disabled = true;
            submitText.textContent = isEditMode ? 'Memperbarui...' : 'Menyimpan...';
            submitSpinner.style.display = 'inline-block';

            clearValidationErrors();

            const formData = new FormData(this);

            let url, method, headers;

            if (isEditMode) {
                url = `{{ url('admin/manajemen-buku') }}/${document.getElementById('bukuId').value}`;
                method = 'POST';
                formData.append('_method', 'PUT');
                headers = {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'X-Requested-With': 'XMLHttpRequest'
                };
            } else {
                url = '{{ url('admin/manajemen-buku') }}';
                method = 'POST';
                headers = {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'X-Requested-With': 'XMLHttpRequest'
                };
            }

            fetch(url, {
                    method: method,
                    body: formData,
                    headers: headers
                })
                .then(async (response) => {
                    const contentType = response.headers.get('content-type');

                    if (contentType && contentType.includes('application/json')) {
                        return response.json();
                    } else {
                        const text = await response.text();
                        console.error('Non-JSON response:', text);

                        try {
                            return JSON.parse(text);
                        } catch (e) {
                            throw new Error('Server returned non-JSON response: ' + text.substring(0, 100));
                        }
                    }
                })
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            title: 'Berhasil!',
                            text: data.message,
                            icon: 'success',
                            confirmButtonColor: '#01747B'
                        }).then(() => {
                            const modal = bootstrap.Modal.getInstance(document.getElementById('bukuModal'));
                            modal.hide();
                            // Reload table instead of full page
                            updateTable();
                        });
                    } else {
                        if (data.errors) {
                            Object.keys(data.errors).forEach(field => {
                                const input = document.querySelector(`[name="${field}"]`);
                                const errorElement = document.getElementById(`${field}_error`);
                                if (input && errorElement) {
                                    input.classList.add('is-invalid');
                                    errorElement.textContent = data.errors[field][0];
                                }
                            });

                            const firstError = Object.values(data.errors)[0][0];
                            Swal.fire({
                                title: 'Error Validasi!',
                                text: firstError,
                                icon: 'error',
                                confirmButtonColor: '#dc3545'
                            });
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: data.message || 'Terjadi kesalahan yang tidak diketahui',
                                icon: 'error',
                                confirmButtonColor: '#dc3545'
                            });
                        }
                    }
                })
                .catch(error => {
                    console.error('Error details:', error);
                    Swal.fire({
                        title: 'Error!',
                        text: 'Terjadi kesalahan saat menyimpan data: ' + error.message,
                        icon: 'error',
                        confirmButtonColor: '#dc3545'
                    });
                })
                .finally(() => {
                    submitBtn.disabled = false;
                    submitText.textContent = isEditMode ? 'Perbarui' : 'Simpan';
                    submitSpinner.style.display = 'none';
                });
        });

        document.getElementById('bukuModal').addEventListener('hidden.bs.modal', function() {
            resetForm();
        });
    </script>
@endpush
@extends('layouts.admin')

@section('title', 'Manajemen Admin - Sistem Perpustakaan MAN 2 Kota Payakumbuh')
@section('page-title', 'Manajemen Admin')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/manajemen-admin.css') }}">
@endpush

@section('content')
    <div class="manajemen-admin-container">
        <div class="admin-header">
            <div class="admin-title-section">
                <h1>Manajemen Admin</h1>
                <p>Kelola data administrator sistem perpustakaan</p>
            </div>
            <button type="button" class="btn btn-add-admin" data-bs-toggle="modal" data-bs-target="#adminModal"
                onclick="resetForm()">
                <i class="fas fa-plus"></i>
                Tambah Admin
            </button>
        </div>

        <div class="admin-card">
            <div class="admin-card-header">
                <h3 class="admin-card-title">
                    <i class="fas fa-users-cog"></i>
                    Daftar Administrator
                </h3>
            </div>
            <div class="card-body p-0">
                @if ($admins->count() > 0)
                    <div class="table-responsive">
                        <table class="admin-table table table-borderless">
                            <thead>
                                <tr>
                                    <th width="60">Foto</th>
                                    <th>Informasi Admin</th>
                                    <th>Email</th>
                                    <th>Tanggal Dibuat</th>
                                    <th width="120" class="text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $admin)
                                    <tr>
                                        <td>
                                            @if ($admin->foto)
                                                <img src="{{ asset($admin->foto) }}" alt="{{ $admin->nama_lengkap }}"
                                                    class="admin-avatar"
                                                    onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                                <div class="admin-avatar-placeholder" style="display: none;">
                                                    {{ substr($admin->nama_lengkap, 0, 1) }}
                                                </div>
                                            @else
                                                <div class="admin-avatar-placeholder">
                                                    {{ substr($admin->nama_lengkap, 0, 1) }}
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="admin-name">{{ $admin->nama_lengkap }}</div>
                                            <div class="admin-email">{{ $admin->email }}</div>
                                        </td>
                                        <td>{{ $admin->email }}</td>
                                        <td>{{ $admin->created_at->format('d M Y') }}</td>
                                        <td>
                                            <div class="admin-actions">
                                                <button class="btn btn-edit" onclick="editAdmin({{ $admin->id }})"
                                                    title="Edit Admin">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-delete" onclick="deleteAdmin({{ $admin->id }})"
                                                    title="Hapus Admin">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="empty-state">
                        <i class="fas fa-users-slash"></i>
                        <h4>Belum ada admin</h4>
                        <p>Mulai dengan menambahkan administrator baru</p>
                        <button type="button" class="btn btn-add-admin mt-3" data-bs-toggle="modal"
                            data-bs-target="#adminModal" onclick="resetForm()">
                            <i class="fas fa-plus"></i>
                            Tambah Admin Pertama
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="modal fade" id="adminModal" tabindex="-1" aria-labelledby="adminModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adminModalLabel">
                        <i class="fas fa-user-plus"></i>
                        <span id="modalTitle">Tambah Admin Baru</span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="adminForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="adminId" name="id">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group text-center">
                                    <label class="form-label">Foto Profil</label>
                                    <div class="mb-3">
                                        <img id="photoPreview" class="photo-preview" alt="Preview Foto">
                                        <div id="photoPlaceholder" class="photo-placeholder"
                                            onclick="document.getElementById('foto').click()">
                                            <div>
                                                <i class="fas fa-camera fa-2x mb-2"></i>
                                                <div>Klik untuk upload foto</div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="file" id="foto" name="foto" accept="image/*"
                                        style="display: none;" onchange="previewImage(this)">
                                    <small class="text-muted">Format: JPG, PNG, GIF (Max: 2MB)</small>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="nama_lengkap" class="form-label">Nama Lengkap <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                        required>
                                    <div class="invalid-feedback" id="nama_lengkap_error"></div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="form-label">Email <span
                                            class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                    <div class="invalid-feedback" id="email_error"></div>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="form-label">
                                        <span id="passwordLabel">Password</span> <span class="text-danger">*</span>
                                    </label>
                                    <div class="position-relative">
                                        <input type="password" class="form-control" id="password" name="password"
                                            required>
                                        <button type="button" class="password-toggle"
                                            onclick="togglePassword('password')">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                    <div class="invalid-feedback" id="password_error"></div>
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation" class="form-label">Konfirmasi Password <span
                                            class="text-danger">*</span></label>
                                    <div class="position-relative">
                                        <input type="password" class="form-control" id="password_confirmation"
                                            name="password_confirmation" required>
                                        <button type="button" class="password-toggle"
                                            onclick="togglePassword('password_confirmation')">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                    <div class="invalid-feedback" id="password_confirmation_error"></div>
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

        function resetForm() {
            isEditMode = false;
            document.getElementById('adminForm').reset();
            document.getElementById('adminId').value = '';
            document.getElementById('modalTitle').textContent = 'Tambah Admin Baru';
            document.getElementById('passwordLabel').textContent = 'Password';
            document.getElementById('submitText').textContent = 'Simpan';
            document.getElementById('photoPreview').classList.remove('show');
            document.getElementById('photoPlaceholder').style.display = 'flex';

            clearValidationErrors();

            document.getElementById('password').setAttribute('required', 'required');
            document.getElementById('password_confirmation').setAttribute('required', 'required');
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

        function previewImage(input) {
            const preview = document.getElementById('photoPreview');
            const placeholder = document.getElementById('photoPlaceholder');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.add('show');
                    placeholder.style.display = 'none';
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const icon = field.nextElementSibling.querySelector('i');

            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                field.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        function editAdmin(id) {
            isEditMode = true;
            clearValidationErrors();

            const submitBtn = document.getElementById('submitBtn');
            const submitText = document.getElementById('submitText');

            submitBtn.disabled = true;
            submitText.textContent = 'Memuat...';

            const url = `{{ url('admin/manajemen-admin') }}/${id}`;

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
                        const admin = data.admin;

                        document.getElementById('adminId').value = admin.id;
                        document.getElementById('nama_lengkap').value = admin.nama_lengkap;
                        document.getElementById('email').value = admin.email;
                        document.getElementById('modalTitle').textContent = 'Edit Admin';
                        document.getElementById('passwordLabel').textContent = 'Password (Kosongkan jika tidak diubah)';
                        document.getElementById('submitText').textContent = 'Perbarui';

                        // Handle photo preview
                        const preview = document.getElementById('photoPreview');
                        const placeholder = document.getElementById('photoPlaceholder');
                        if (admin.foto) {
                            preview.src = `{{ url('/') }}/${admin.foto}`;
                            preview.classList.add('show');
                            placeholder.style.display = 'none';
                        } else {
                            preview.classList.remove('show');
                            placeholder.style.display = 'flex';
                        }

                        document.getElementById('password').removeAttribute('required');
                        document.getElementById('password_confirmation').removeAttribute('required');

                        document.getElementById('password').value = '';
                        document.getElementById('password_confirmation').value = '';

                        const modal = new bootstrap.Modal(document.getElementById('adminModal'));
                        modal.show();
                    } else {
                        throw new Error(data.message || 'Gagal memuat data admin');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire('Error', 'Gagal memuat data admin: ' + error.message, 'error');
                })
                .finally(() => {
                    submitBtn.disabled = false;
                    submitText.textContent = isEditMode ? 'Perbarui' : 'Simpan';
                });
        }

        function deleteAdmin(id) {
            Swal.fire({
                title: 'Hapus Admin?',
                text: "Data admin yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    const url = `{{ url('admin/manajemen-admin') }}/${id}`;

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
                                    location.reload();
                                });
                            } else {
                                Swal.fire('Error!', data.message, 'error');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            Swal.fire('Error!', 'Terjadi kesalahan saat menghapus admin', 'error');
                        });
                }
            });
        }

        document.getElementById('adminForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const submitBtn = document.getElementById('submitBtn');
            const submitText = document.getElementById('submitText');
            const submitSpinner = document.getElementById('submitSpinner');

            submitBtn.disabled = true;
            submitText.textContent = isEditMode ? 'Memperbarui...' : 'Menyimpan...';
            submitSpinner.style.display = 'inline-block';

            clearValidationErrors();

            const formData = new FormData(this);

            let url, method;

            if (isEditMode) {
                url = `{{ url('admin/manajemen-admin') }}/${document.getElementById('adminId').value}`;
                method = 'POST';
                formData.append('_method', 'PUT');
            } else {
                url = '{{ url('admin/manajemen-admin') }}';
                method = 'POST';
            }

            fetch(url, {
                    method: method,
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(async (response) => {
                    // Cek content type
                    const contentType = response.headers.get('content-type');

                    if (contentType && contentType.includes('application/json')) {
                        return response.json();
                    } else {
                        const text = await response.text();
                        console.error('Non-JSON response:', text);
                        throw new Error('Server returned non-JSON response');
                    }
                })
                .then(data => {
                    if (data.success) {
                        Swal.fire('Berhasil!', data.message, 'success').then(() => {
                            location.reload();
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
                            Swal.fire('Error!', 'Terdapat kesalahan dalam pengisian form', 'error');
                        } else {
                            Swal.fire('Error!', data.message, 'error');
                        }
                    }
                })
                .catch(error => {
                    console.error('Error details:', error);
                    Swal.fire('Error!', 'Terjadi kesalahan saat menyimpan data: ' + error.message, 'error');
                })
                .finally(() => {
                    submitBtn.disabled = false;
                    submitText.textContent = isEditMode ? 'Perbarui' : 'Simpan';
                    submitSpinner.style.display = 'none';
                });
        });

        document.getElementById('adminModal').addEventListener('hidden.bs.modal', function() {
            resetForm();
        });
    </script>
@endpush

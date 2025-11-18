@extends('layouts.admin')

@section('title', 'Pengaturan - Sistem Perpustakaan MAN 2 Kota Payakumbuh')
@section('page-title', 'Pengaturan')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/pengaturan.css') }}">
@endpush

@section('content')
    <div class="pengaturan-container">
        <div class="pengaturan-header">
            <div class="pengaturan-title-section">
                <h1>Pengaturan Akun</h1>
                <p>Kelola informasi profil dan keamanan akun Anda</p>
            </div>
        </div>

        <div class="pengaturan-content">
            <!-- Profile Settings -->
            <div class="profile-card">
                <div class="card-header">
                    <h3>
                        <i class="fas fa-user-cog"></i>
                        Informasi Profil
                    </h3>
                </div>
                <div class="card-body">
                    <div class="profile-section">
                        <div class="profile-avatar">
                            @if (isset($admin) && $admin->foto)
                                <img src="{{ asset($admin->foto) }}" alt="{{ $admin->nama_lengkap }}" class="avatar-image"
                                    id="avatarImage">
                            @else
                                <div class="avatar-placeholder" id="avatarPlaceholder">
                                    {{ isset($admin) ? substr($admin->nama_lengkap, 0, 1) : 'A' }}
                                </div>
                            @endif
                            <div class="avatar-upload" onclick="document.getElementById('foto').click()">
                                <i class="fas fa-camera"></i>
                            </div>
                            <input type="file" id="foto" name="foto" class="file-input" accept="image/*"
                                onchange="previewImage(this)">
                        </div>
                        <div class="profile-info">
                            <div class="profile-name">{{ isset($admin) ? $admin->nama_lengkap : 'Admin' }}</div>
                            <div class="profile-email">{{ isset($admin) ? $admin->email : 'admin@example.com' }}</div>
                        </div>
                    </div>

                    <form id="profileForm">
                        @csrf
                        <div class="form-group">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                value="{{ isset($admin) ? $admin->nama_lengkap : '' }}" required>
                            <div class="invalid-feedback" id="nama_lengkap_error"></div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ isset($admin) ? $admin->email : '' }}" required>
                            <div class="invalid-feedback" id="email_error"></div>
                        </div>

                        <button type="submit" class="btn btn-submit" id="profileSubmitBtn">
                            <span id="profileSubmitText">Perbarui Profil</span>
                            <span id="profileSubmitSpinner" class="loading-spinner" style="display: none;"></span>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Password Settings -->
            <div class="password-card">
                <div class="card-header">
                    <h3>
                        <i class="fas fa-lock"></i>
                        Keamanan Akun
                    </h3>
                </div>
                <div class="card-body">
                    <form id="passwordForm">
                        @csrf
                        <div class="form-group">
                            <label for="current_password" class="form-label">Password Saat Ini <span
                                    class="text-danger">*</span></label>
                            <div class="password-input-group">
                                <input type="password" class="form-control" id="current_password" name="current_password"
                                    required>
                                <button type="button" class="password-toggle" onclick="togglePassword('current_password')">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div class="invalid-feedback" id="current_password_error"></div>
                        </div>

                        <div class="form-group">
                            <label for="new_password" class="form-label">Password Baru <span
                                    class="text-danger">*</span></label>
                            <div class="password-input-group">
                                <input type="password" class="form-control" id="new_password" name="new_password" required>
                                <button type="button" class="password-toggle" onclick="togglePassword('new_password')">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div class="invalid-feedback" id="new_password_error"></div>
                        </div>

                        <div class="form-group">
                            <label for="new_password_confirmation" class="form-label">Konfirmasi Password Baru <span
                                    class="text-danger">*</span></label>
                            <div class="password-input-group">
                                <input type="password" class="form-control" id="new_password_confirmation"
                                    name="new_password_confirmation" required>
                                <button type="button" class="password-toggle"
                                    onclick="togglePassword('new_password_confirmation')">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div class="invalid-feedback" id="new_password_confirmation_error"></div>
                        </div>

                        <button type="submit" class="btn btn-submit" id="passwordSubmitBtn">
                            <span id="passwordSubmitText">Perbarui Password</span>
                            <span id="passwordSubmitSpinner" class="loading-spinner" style="display: none;"></span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const avatarImage = document.getElementById('avatarImage');
                    const avatarPlaceholder = document.getElementById('avatarPlaceholder');

                    if (avatarImage) {
                        avatarImage.src = e.target.result;
                    } else {
                        const newAvatarImage = document.createElement('img');
                        newAvatarImage.src = e.target.result;
                        newAvatarImage.alt = 'Profile Picture';
                        newAvatarImage.className = 'avatar-image';
                        newAvatarImage.id = 'avatarImage';
                        avatarPlaceholder.parentNode.replaceChild(newAvatarImage, avatarPlaceholder);
                    }
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const icon = field.parentNode.querySelector('.password-toggle i');

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

        function clearValidationErrors(formType) {
            const errorElements = document.querySelectorAll(`#${formType}Form .invalid-feedback`);
            errorElements.forEach(element => {
                element.textContent = '';
            });

            const inputElements = document.querySelectorAll(`#${formType}Form .form-control`);
            inputElements.forEach(element => {
                element.classList.remove('is-invalid');
            });
        }

        function showSweetAlertSuccess(title, message, icon = 'success') {
            Swal.fire({
                title: title,
                text: message,
                icon: icon,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 3000,
                timerProgressBar: true,
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            });
        }

        function showSweetAlertError(title, message) {
            Swal.fire({
                title: title,
                html: message,
                icon: 'error',
                confirmButtonColor: '#dc3545',
                confirmButtonText: 'OK',
                showClass: {
                    popup: 'animate__animated animate__shakeX'
                }
            });
        }

        function showSweetAlertValidation(errors) {
            let errorMessages = '';
            Object.keys(errors).forEach(field => {
                errorMessages += `<div class="text-start">• ${errors[field][0]}</div>`;
            });

            Swal.fire({
                title: 'Error Validasi!',
                html: errorMessages,
                icon: 'error',
                confirmButtonColor: '#dc3545',
                confirmButtonText: 'OK',
                showClass: {
                    popup: 'animate__animated animate__shakeX'
                }
            });
        }

        document.getElementById('profileForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const submitBtn = document.getElementById('profileSubmitBtn');
            const submitText = document.getElementById('profileSubmitText');
            const submitSpinner = document.getElementById('profileSubmitSpinner');

            submitBtn.disabled = true;
            submitText.textContent = 'Memperbarui...';
            submitSpinner.style.display = 'inline-block';

            clearValidationErrors('profile');

            const formData = new FormData(this);

            const fotoInput = document.getElementById('foto');
            if (fotoInput.files[0]) {
                formData.append('foto', fotoInput.files[0]);
            }

            fetch('{{ route('admin.pengaturan.update-profile') }}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(async (response) => {
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
                        showSweetAlertSuccess('Berhasil!', data.message, 'success');

                        if (data.admin) {
                            document.querySelector('.profile-name').textContent = data.admin.nama_lengkap;
                            document.querySelector('.profile-email').textContent = data.admin.email;

                            const userNameElement = document.querySelector('.user-name');
                            if (userNameElement) {
                                userNameElement.textContent = data.admin.nama_lengkap;
                            }

                            const userEmailElement = document.querySelector('.user-email');
                            if (userEmailElement) {
                                userEmailElement.textContent = data.admin.email;
                            }

                            if (data.admin.foto) {
                                const avatarImage = document.getElementById('avatarImage');
                                const avatarPlaceholder = document.getElementById('avatarPlaceholder');

                                if (avatarImage) {
                                    avatarImage.src = '{{ url('/') }}/' + data.admin.foto + '?t=' +
                                        new Date().getTime();
                                } else if (avatarPlaceholder) {
                                    const newAvatarImage = document.createElement('img');
                                    newAvatarImage.src = '{{ url('/') }}/' + data.admin.foto + '?t=' +
                                        new Date().getTime();
                                    newAvatarImage.alt = 'Profile Picture';
                                    newAvatarImage.className = 'avatar-image';
                                    newAvatarImage.id = 'avatarImage';
                                    avatarPlaceholder.parentNode.replaceChild(newAvatarImage,
                                    avatarPlaceholder);
                                }

                                const headerAvatar = document.querySelector('.header-avatar');
                                if (headerAvatar) {
                                    headerAvatar.src = '{{ url('/') }}/' + data.admin.foto + '?t=' +
                                        new Date().getTime();
                                }
                            }
                        }
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

                            showSweetAlertValidation(data.errors);
                        } else {
                            showSweetAlertError('Error!', data.message);
                        }
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showSweetAlertError('Error!', 'Terjadi kesalahan saat memperbarui profil: ' + error
                    .message);
                })
                .finally(() => {
                    submitBtn.disabled = false;
                    submitText.textContent = 'Perbarui Profil';
                    submitSpinner.style.display = 'none';
                });
        });

        document.getElementById('passwordForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const submitBtn = document.getElementById('passwordSubmitBtn');
            const submitText = document.getElementById('passwordSubmitText');
            const submitSpinner = document.getElementById('passwordSubmitSpinner');

            submitBtn.disabled = true;
            submitText.textContent = 'Memperbarui...';
            submitSpinner.style.display = 'inline-block';

            clearValidationErrors('password');

            const formData = new FormData(this);

            fetch('{{ route('admin.pengaturan.update-password') }}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(async (response) => {
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
                        showSweetAlertSuccess('Berhasil!', data.message, 'success');
                        document.getElementById('passwordForm').reset();
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

                            showSweetAlertValidation(data.errors);
                        } else {
                            showSweetAlertError('Error!', data.message);
                        }
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showSweetAlertError('Error!', 'Terjadi kesalahan saat memperbarui password: ' + error
                        .message);
                })
                .finally(() => {
                    submitBtn.disabled = false;
                    submitText.textContent = 'Perbarui Password';
                    submitSpinner.style.display = 'none';
                });
        });

        window.addEventListener('beforeunload', function(e) {
            const profileForm = document.getElementById('profileForm');
            const passwordForm = document.getElementById('passwordForm');

            const profileChanged = (
                profileForm.nama_lengkap.value !== '{{ isset($admin) ? $admin->nama_lengkap : '' }}' ||
                profileForm.email.value !== '{{ isset($admin) ? $admin->email : '' }}' ||
                document.getElementById('foto').files.length > 0
            );

            const passwordChanged = (
                passwordForm.current_password.value !== '' ||
                passwordForm.new_password.value !== '' ||
                passwordForm.new_password_confirmation.value !== ''
            );

            if (profileChanged || passwordChanged) {
                e.preventDefault();
                e.returnValue =
                    'Anda memiliki perubahan yang belum disimpan. Apakah Anda yakin ingin meninggalkan halaman ini?';
                return e.returnValue;
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            const newPasswordInput = document.getElementById('new_password');
            if (newPasswordInput) {
                newPasswordInput.addEventListener('focus', function() {
                    Swal.fire({
                        title: 'Persyaratan Password',
                        html: `
                    <div class="text-start">
                        <p>Password harus memenuhi:</p>
                        <ul class="text-start">
                            <li>Minimal 8 karakter</li>
                            <li>Mengandung huruf kecil dan besar</li>
                            <li>Mengandung angka</li>
                            <li>Mengandung karakter spesial (@$!%*?&)</li>
                            <li>Tidak sama dengan password lama</li>
                        </ul>
                    </div>
                `,
                        icon: 'info',
                        confirmButtonColor: '#17a2b8',
                        confirmButtonText: 'Mengerti'
                    });
                });
            }
        });
    </script>
@endpush

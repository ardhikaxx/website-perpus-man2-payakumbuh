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
    const CONFIG = {
        routes: {
            updateProfile: '{{ route('admin.pengaturan.update-profile') }}',
            updatePassword: '{{ route('admin.pengaturan.update-password') }}'
        },
        csrfToken: '{{ csrf_token() }}',
        baseUrl: '{{ url('/') }}',
        adminData: {
            nama_lengkap: '{{ isset($admin) ? $admin->nama_lengkap : '' }}',
            email: '{{ isset($admin) ? $admin->email : '' }}',
            foto: '{{ isset($admin) && $admin->foto ? $admin->foto : '' }}'
        }
    };

    const DOM = {
        profileForm: document.getElementById('profileForm'),
        profileSubmitBtn: document.getElementById('profileSubmitBtn'),
        profileSubmitText: document.getElementById('profileSubmitText'),
        profileSubmitSpinner: document.getElementById('profileSubmitSpinner'),
        
        passwordForm: document.getElementById('passwordForm'),
        passwordSubmitBtn: document.getElementById('passwordSubmitBtn'),
        passwordSubmitText: document.getElementById('passwordSubmitText'),
        passwordSubmitSpinner: document.getElementById('passwordSubmitSpinner'),
        
        fotoInput: document.getElementById('foto'),
        
        profileName: document.querySelector('.profile-name'),
        profileEmail: document.querySelector('.profile-email'),
        avatarImage: document.getElementById('avatarImage'),
        avatarPlaceholder: document.getElementById('avatarPlaceholder')
    };

    const Utils = {
        /**
         * Toggle password visibility
         */
        togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const icon = field.parentNode.querySelector('.password-toggle i');

            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                field.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        },

        /**
         * Preview uploaded image
         */
        previewImage(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    if (DOM.avatarImage) {
                        DOM.avatarImage.src = e.target.result;
                    } else if (DOM.avatarPlaceholder) {
                        Utils.replaceAvatarPlaceholder(e.target.result);
                    }
                };

                reader.readAsDataURL(input.files[0]);
            }
        },

        /**
         * Replace avatar placeholder with image
         */
        replaceAvatarPlaceholder(imageSrc) {
            const newAvatarImage = document.createElement('img');
            newAvatarImage.src = imageSrc;
            newAvatarImage.alt = 'Profile Picture';
            newAvatarImage.className = 'avatar-image';
            newAvatarImage.id = 'avatarImage';
            DOM.avatarPlaceholder.parentNode.replaceChild(newAvatarImage, DOM.avatarPlaceholder);
            
            DOM.avatarImage = newAvatarImage;
            DOM.avatarPlaceholder = null;
        },

        /**
         * Clear validation errors for a form
         */
        clearValidationErrors(formType) {
            const form = document.getElementById(`${formType}Form`);
            if (!form) return;

            const errorElements = form.querySelectorAll('.invalid-feedback');
            errorElements.forEach(element => {
                element.textContent = '';
            });

            const inputElements = form.querySelectorAll('.form-control');
            inputElements.forEach(element => {
                element.classList.remove('is-invalid');
            });
        },

        /**
         * Show loading state for a button
         */
        showLoading(button, textElement, spinner, loadingText = 'Memperbarui...') {
            button.disabled = true;
            textElement.textContent = loadingText;
            spinner.style.display = 'inline-block';
        },

        /**
         * Hide loading state for a button
         */
        hideLoading(button, textElement, spinner, originalText) {
            button.disabled = false;
            textElement.textContent = originalText;
            spinner.style.display = 'none';
        },

        /**
         * Check if response is JSON
         */
        async parseResponse(response) {
            const contentType = response.headers.get('content-type');
            
            if (contentType && contentType.includes('application/json')) {
                return await response.json();
            } else {
                const text = await response.text();
                console.error('Non-JSON response:', text);
                throw new Error('Server returned non-JSON response');
            }
        },

        /**
         * Check if form has unsaved changes
         */
        hasUnsavedChanges() {
            const profileChanged = (
                DOM.profileForm.nama_lengkap.value !== CONFIG.adminData.nama_lengkap ||
                DOM.profileForm.email.value !== CONFIG.adminData.email ||
                DOM.fotoInput.files.length > 0
            );

            const passwordChanged = (
                DOM.passwordForm.current_password.value !== '' ||
                DOM.passwordForm.new_password.value !== '' ||
                DOM.passwordForm.new_password_confirmation.value !== ''
            );

            return profileChanged || passwordChanged;
        }
    };

    const Notifications = {
        /**
         * Show success notification
         */
        showSuccess(title, message, icon = 'success') {
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
        },

        /**
         * Show error notification
         */
        showError(title, message) {
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
        },

        /**
         * Show validation errors
         */
        showValidationErrors(errors) {
            let errorMessages = '';
            Object.keys(errors).forEach(field => {
                errorMessages += `<div class="text-start">• ${errors[field][0]}</div>`;
            });

            this.showError('Error Validasi!', errorMessages);
        }
    };

    class FormHandler {
        constructor(formType, options = {}) {
            this.formType = formType;
            this.form = document.getElementById(`${formType}Form`);
            this.submitBtn = document.getElementById(`${formType}SubmitBtn`);
            this.submitText = document.getElementById(`${formType}SubmitText`);
            this.submitSpinner = document.getElementById(`${formType}SubmitSpinner`);
            this.options = options;
            
            this.init();
        }

        init() {
            if (this.form) {
                this.form.addEventListener('submit', (e) => this.handleSubmit(e));
            }
        }

        async handleSubmit(e) {
            e.preventDefault();

            Utils.showLoading(
                this.submitBtn, 
                this.submitText, 
                this.submitSpinner, 
                this.options.loadingText || 'Memperbarui...'
            );

            Utils.clearValidationErrors(this.formType);

            try {
                const formData = this.prepareFormData();
                const response = await this.sendRequest(formData);
                await this.handleResponse(response);
            } catch (error) {
                this.handleError(error);
            } finally {
                Utils.hideLoading(
                    this.submitBtn,
                    this.submitText,
                    this.submitSpinner,
                    this.options.originalText || 'Perbarui'
                );
            }
        }

        prepareFormData() {
            const formData = new FormData(this.form);

            if (this.options.prepareData) {
                this.options.prepareData(formData);
            }

            return formData;
        }

        async sendRequest(formData) {
            const response = await fetch(this.options.url, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': CONFIG.csrfToken,
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });

            return await Utils.parseResponse(response);
        }

        handleResponse(data) {
            if (data.success) {
                Notifications.showSuccess('Berhasil!', data.message, 'success');
                
                if (this.options.onSuccess) {
                    this.options.onSuccess(data);
                }
                
                if (this.options.resetOnSuccess) {
                    this.form.reset();
                }
            } else {
                if (data.errors) {
                    this.showFieldErrors(data.errors);
                    Notifications.showValidationErrors(data.errors);
                } else {
                    Notifications.showError('Error!', data.message);
                }
            }
        }

        showFieldErrors(errors) {
            Object.keys(errors).forEach(field => {
                const input = this.form.querySelector(`[name="${field}"]`);
                const errorElement = document.getElementById(`${field}_error`);
                
                if (input && errorElement) {
                    input.classList.add('is-invalid');
                    errorElement.textContent = errors[field][0];
                }
            });
        }

        handleError(error) {
            console.error('Error:', error);
            Notifications.showError('Error!', 
                `Terjadi kesalahan saat memperbarui ${this.formType}: ${error.message}`
            );
        }
    }

    const profileHandler = new FormHandler('profile', {
        url: CONFIG.routes.updateProfile,
        loadingText: 'Memperbarui...',
        originalText: 'Perbarui Profil',
        prepareData: (formData) => {
            if (DOM.fotoInput.files[0]) {
                formData.append('foto', DOM.fotoInput.files[0]);
            }
        },
        onSuccess: (data) => {
            if (data.admin) {
                DOM.profileName.textContent = data.admin.nama_lengkap;
                DOM.profileEmail.textContent = data.admin.email;

                const userNameElement = document.querySelector('.user-name');
                const userEmailElement = document.querySelector('.user-email');
                
                if (userNameElement) userNameElement.textContent = data.admin.nama_lengkap;
                if (userEmailElement) userEmailElement.textContent = data.admin.email;

                if (data.admin.foto) {
                    const timestamp = new Date().getTime();
                    const fotoUrl = `${CONFIG.baseUrl}/${data.admin.foto}?t=${timestamp}`;

                    if (DOM.avatarImage) {
                        DOM.avatarImage.src = fotoUrl;
                    } else if (DOM.avatarPlaceholder) {
                        Utils.replaceAvatarPlaceholder(fotoUrl);
                    }

                    const headerAvatar = document.querySelector('.header-avatar');
                    if (headerAvatar) {
                        headerAvatar.src = fotoUrl;
                    }
                }

                CONFIG.adminData.nama_lengkap = data.admin.nama_lengkap;
                CONFIG.adminData.email = data.admin.email;
                CONFIG.adminData.foto = data.admin.foto;
            }
        }
    });

    const passwordHandler = new FormHandler('password', {
        url: CONFIG.routes.updatePassword,
        loadingText: 'Memperbarui...',
        originalText: 'Perbarui Password',
        resetOnSuccess: true
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Avatar upload click handler
        if (DOM.fotoInput) {
            DOM.fotoInput.addEventListener('change', function() {
                Utils.previewImage(this);
            });
        }

        window.addEventListener('beforeunload', function(e) {
            if (Utils.hasUnsavedChanges()) {
                e.preventDefault();
                e.returnValue = 
                    'Anda memiliki perubahan yang belum disimpan. Apakah Anda yakin ingin meninggalkan halaman ini?';
                return e.returnValue;
            }
        });
    });

    window.togglePassword = Utils.togglePassword.bind(Utils);
    window.previewImage = Utils.previewImage.bind(Utils);
</script>
@endpush
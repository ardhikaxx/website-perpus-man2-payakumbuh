<div class="header">
    <div class="header-left">
        <button class="mobile-toggle">
            <i class="fas fa-bars"></i>
        </button>
        <h1>@yield('page-title', 'Dashboard')</h1>
    </div>

    <div class="header-right">
        <div class="user-profile">
            <div class="user-avatar">
                @if (isset($admin) && $admin->foto)
                    <img src="{{ asset($admin->foto) }}" alt="{{ $admin->nama_lengkap }}" class="user-avatar-header"
                        id="avatarImage">
                @else
                    <div class="avatar-header" id="avatarPlaceholder">
                        {{ isset($admin) ? substr($admin->nama_lengkap, 0, 1) : 'A' }}
                    </div>
                @endif
            </div>
            <div class="user-info">
                <div class="user-name">{{ Auth::guard('admin')->user()->nama_lengkap ?? 'Admin' }}</div>
                <div class="user-email">{{ Auth::guard('admin')->user()->email ?? 'Admin' }}</div>
            </div>

            <div class="user-dropdown">
                <a href="#">
                    <i class="fas fa-user-circle"></i>
                    Profil Saya
                </a>
                <a href="#">
                    <i class="fas fa-cog"></i>
                    Pengaturan
                </a>
                <a href="#" id="logout-link">
                    <i class="fas fa-sign-out-alt"></i>
                    Keluar
                </a>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const logoutLink = document.getElementById('logout-link');
        const logoutForm = document.getElementById('logout-form');

        if (logoutLink) {
            logoutLink.addEventListener('click', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Konfirmasi Logout',
                    text: 'Apakah Anda yakin ingin keluar dari sistem?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Keluar!',
                    cancelButtonText: 'Batal',
                    reverseButtons: true,
                    customClass: {
                        confirmButton: 'btn btn-danger',
                        cancelButton: 'btn btn-secondary me-2'
                    },
                    buttonsStyling: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: 'Logging out...',
                            text: 'Sedang memproses logout',
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        });

                        setTimeout(() => {
                            logoutForm.submit();
                        }, 1000);
                    }
                });
            });
        }

        const userProfile = document.querySelector('.user-profile');
        if (userProfile) {
            userProfile.addEventListener('click', function(e) {
                if (!e.target.closest('.user-dropdown')) {
                    this.classList.toggle('active');
                }
            });

            document.addEventListener('click', function(e) {
                if (!userProfile.contains(e.target)) {
                    userProfile.classList.remove('active');
                }
            });
        }
    });
</script>

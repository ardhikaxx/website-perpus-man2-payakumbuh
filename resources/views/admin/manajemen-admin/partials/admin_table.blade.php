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

    <!-- Pagination -->
    <div class="pagination-container">
        {!! $admins->appends(request()->except('page'))->links('vendor.pagination') !!}
    </div>
@else
    <div class="empty-state">
        <i class="fas fa-users-slash"></i>
        <h4>Belum ada admin</h4>
        <p>Mulai dengan menambahkan administrator baru</p>
        <button type="button" class="btn btn-add-admin mt-3" data-bs-toggle="modal"
            data-bs-target="#adminModal" onclick="resetForm()">
            Tambah Admin Pertama
        </button>
    </div>
@endif
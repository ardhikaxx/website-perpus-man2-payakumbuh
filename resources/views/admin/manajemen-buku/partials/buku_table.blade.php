@if ($bukus->count() > 0)
    <div class="table-responsive">
        <table class="buku-table table table-borderless">
            <thead>
                <tr>
                    <th width="70"></th>
                    <th>Informasi Buku</th>
                    <th width="100">Tahun</th>
                    <th width="100">Halaman</th>
                    <th width="120" class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bukus as $buku)
                    <tr>
                        <td>
                            <div class="book-icon">
                                <i class="fas fa-book"></i>
                            </div>
                        </td>
                        <td>
                            <div class="buku-info">
                                <div class="buku-judul">{{ $buku->judul_buku }}</div>
                                <div class="buku-detail">
                                    <span class="buku-pengarang">{{ $buku->pengarang }}</span>
                                    <span class="buku-penerbit">{{ $buku->penerbit }}</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="buku-tahun">{{ $buku->tahun_terbit }}</span>
                        </td>
                        <td>
                            <span class="buku-halaman">{{ $buku->jumlah_halaman }} hlm</span>
                        </td>
                        <td>
                            <div class="buku-actions">
                                <button class="btn btn-edit" onclick="editBuku({{ $buku->id }})" title="Edit Buku">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-delete" onclick="deleteBuku({{ $buku->id }})"
                                    title="Hapus Buku">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="pagination-container">
        {!! $bukus->appends(request()->except('page'))->links('vendor.pagination') !!}
    </div>
@else
    <div class="empty-state">
        <i class="fas fa-book-open"></i>
        <h4>Belum ada buku</h4>
        <p>Mulai dengan menambahkan buku baru ke koleksi</p>
        <button type="button" class="btn btn-add-buku mt-3" data-bs-toggle="modal" data-bs-target="#bukuModal"
            onclick="resetForm()">
            Tambah Buku Pertama
        </button>
    </div>
@endif

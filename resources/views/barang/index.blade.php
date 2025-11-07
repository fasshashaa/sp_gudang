@extends('layouts.app')

@section('title', 'Data Barang')

@section('content')
    <div class="stagger-animation">
        <div class="d-flex justify-content-between align-items-center mb-4 pt-3">
            <h3 class="fw-bold text-gray-800 d-flex align-items-center gap-2">
                <i class="fas fa-warehouse text-primary-600 fs-4"></i> Data Barang
            </h3>
            <form action="{{ route('barang.index') }}" method="GET" class="search-container" style="min-width: 320px;">
                <i class="fas fa-search search-icon"></i>
                <input type="text" name="search" class="form-control search-input" placeholder="Search..." value="{{ request('search') }}">
                <button type="submit" class="search-btn">
                    <i class="fas fa-arrow-right"></i>
                </button>
            </form>
        </div>
        
        @if (session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>{{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle"></i>{{ session('error') }}
            </div>
        @endif

        <div class="elegant-card mb-5">
            <div class="table-responsive">
                <div class="data-grid">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th><i class="fas fa-hashtag"></i>Kode</th>
                                <th><i class="fas fa-microchip"></i>Mesin</th>
                                <th><i class="fas fa-cube"></i>Nama Barang</th>
                                <th><i class="fas fa-clipboard-list"></i>Spesifikasi</th>
                                <th><i class="fas fa-archive"></i>Box</th>
                                <th><i class="fas fa-cogs"></i>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($barangs as $barang)
                                <tr class="clickable-row">
                                    <td>
                                        <div class="row-indicator"></div>
                                        <span class="item-code">{{ $barang->code }}</span>
                                    </td>
                                    <td>{{ $barang->machine }}</td>
                                    <td>{{ $barang->name_of_good }}</td>
                                    <td>{{ $barang->detailBarang->specification ?? '-' }}</td>
                                    <td>{{ $barang->detailBarang->box ?? '-' }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <button class="btn elegant-btn elegant-btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editBarangModal" data-barang='@json($barang)'>
                                                <i class="fas fa-edit me-1"></i>Edit
                                            </button>
                                            <form action="{{ route('barang.destroy', $barang->code) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn elegant-btn elegant-btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">
                                                    <i class="fas fa-trash me-1"></i>Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="details-row">
                                    <td colspan="6">
                                        <div class="details-content">
                                            <div class="detail-grid">
                                                <div class="detail-item">
                                                    <span class="detail-label">
                                                        <i class="fas fa-calendar-check"></i>Using 2024
                                                    </span>
                                                    <span class="detail-value">{{ $barang->detailBarang->using_2024 ?? '-' }}</span>
                                                </div>
                                                <div class="detail-item">
                                                    <span class="detail-label">
                                                        <i class="fas fa-door-open"></i>Opening
                                                    </span>
                                                    <span class="detail-value">{{ $barang->detailBarang->opening ?? '-' }}</span>
                                                </div>
                                                <div class="detail-item">
                                                    <span class="detail-label">
                                                        <i class="fas fa-arrow-down"></i>Received
                                                    </span>
                                                    <span class="detail-value">{{ $barang->detailBarang->received ?? '-' }}</span>
                                                </div>
                                                <div class="detail-item">
                                                    <span class="detail-label">
                                                        <i class="fas fa-arrow-up"></i>Used
                                                    </span>
                                                    <span class="detail-value">{{ $barang->detailBarang->used ?? '-' }}</span>
                                                </div>
                                                <div class="detail-item">
                                                    <span class="detail-label">
                                                        <i class="fas fa-door-closed"></i>Closing
                                                    </span>
                                                    <span class="detail-value">{{ $barang->detailBarang->closing ?? '-' }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <div class="empty-state">
                                            <div class="empty-icon">
                                                <i class="fas fa-box"></i>
                                            </div>
                                            <h5 class="empty-title">Belum ada data barang</h5>
                                            <p class="empty-description">Mulai dengan menambahkan barang pertama Anda</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <button type="button" class="floating-btn" data-bs-toggle="modal" data-bs-target="#createBarangModal">
        <i class="fas fa-plus"></i>
    </button>
<!-- Diletakkan setelah penutup div elegant-card/tabel -->
<div class="d-flex justify-content-center mt-4">
    {{ $barangs->links('pagination::bootstrap-5') }}
</div>
    @include('barang.create-modal')
    @include('barang.edit-modal')
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Toggle detail row
            document.querySelectorAll('.clickable-row').forEach(row => {
                row.addEventListener('click', function (event) {
                    if (event.target.tagName.toLowerCase() === 'button' || 
                        event.target.tagName.toLowerCase() === 'a' ||
                        event.target.closest('button') || 
                        event.target.closest('form')) {
                        return;
                    }
                    let detailsRow = this.nextElementSibling;
                    if (detailsRow && detailsRow.classList.contains('details-row')) {
                        // Tutup semua row detail yang sedang terbuka
                        document.querySelectorAll('.details-row').forEach(detail => {
                            if (detail !== detailsRow && detail.style.display === 'table-row') {
                                detail.style.display = 'none';
                                detail.classList.remove('animate-slide-down');
                            }
                        });

                        // Toggle row detail yang diklik
                        if (detailsRow.style.display === 'none' || detailsRow.style.display === '') {
                            detailsRow.style.display = 'table-row';
                            detailsRow.classList.add('animate-slide-down');
                        } else {
                            detailsRow.style.display = 'none';
                            detailsRow.classList.remove('animate-slide-down');
                        }
                    }
                });
            });

            // Populate Edit Modal
            const editModal = document.getElementById('editBarangModal');
            if (editModal) {
                editModal.addEventListener('show.bs.modal', function (event) {
                    const button = event.relatedTarget;
                    const barang = JSON.parse(button.getAttribute('data-barang'));
                    
                    const form = editModal.querySelector('form');
                    form.action = `/barang/${barang.code}`; // Pastikan rute Anda menerima kode

                    editModal.querySelector('#edit-code').value = barang.code;
                    editModal.querySelector('#edit-machine').value = barang.machine;
                    editModal.querySelector('#edit-name_of_good').value = barang.name_of_good;
                    
                    // Populate detail_barang
                    if (barang.detail_barang) {
                        editModal.querySelector('#edit-specification').value = barang.detail_barang.specification || '';
                        editModal.querySelector('#edit-box').value = barang.detail_barang.box || '';
                        editModal.querySelector('#edit-using_2024').value = barang.detail_barang.using_2024 || '';
                        editModal.querySelector('#edit-opening').value = barang.detail_barang.opening || '';
                        editModal.querySelector('#edit-received').value = barang.detail_barang.received || '';
                        editModal.querySelector('#edit-used').value = barang.detail_barang.used || '';
                        editModal.querySelector('#edit-closing').value = barang.detail_barang.closing || '';
                    } else {
                        // Reset jika detail_barang tidak ada
                        editModal.querySelector('#edit-specification').value = '';
                        editModal.querySelector('#edit-box').value = '';
                        editModal.querySelector('#edit-using_2024').value = '';
                        editModal.querySelector('#edit-opening').value = '';
                        editModal.querySelector('#edit-received').value = '';
                        editModal.querySelector('#edit-used').value = '';
                        editModal.querySelector('#edit-closing').value = '';
                    }
                });
            }

            document.documentElement.style.scrollBehavior = 'smooth';
        });
    </script>
@endsection
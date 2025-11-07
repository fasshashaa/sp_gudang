@extends('layouts.app')

@section('title', 'Manajemen Mesin')

@section('content')
<div class="p-8 w-full">
    {{-- CATATAN PENTING: Untuk memastikan styling Anda yang baru (elegant-card, elegant-btn, dll.)
    berfungsi, semua kode CSS kustom dari file ini HARUS dipindahkan ke dalam tag <style> 
    di app-layout.blade.php, dan Bootstrap JS HARUS ditambahkan ke app-layout.blade.php. --}}

    <div class="stagger-animation">
        <div class="d-flex justify-content-between align-items-center mb-4 pt-3">
            <h3 class="fw-bold text-gray-800 d-flex align-items-center gap-2">
                <i class="fas fa-warehouse text-primary-600 fs-4"></i> Data Mesin
            </h3>
            <form action="{{ route('mesin.index') }}" method="GET" class="search-container" style="min-width: 320px;">
                <i class="fas fa-search search-icon"></i>
                <input type="text" name="search" class="form-control search-input" placeholder="Search..." value="{{ request('search') }}">
                <button type="submit" class="search-btn">
                    <i class="fas fa-arrow-right"></i>
                </button>
            </form>
        </div>
        
        
        @if (session('success'))
            <div class="alert alert-success animate-slide-down">
                <i class="fas fa-check-circle"></i>{{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger animate-slide-down">
                <i class="fas fa-exclamation-circle"></i>{{ session('error') }}
            </div>
        @endif

        <div class="elegant-card animate-slide-down">
            <div class="table-responsive">
                <div class="data-grid">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th><i class="fas fa-hashtag"></i>Kode Mesin</th>
                                <th><i class="fas fa-cogs"></i>Nama Mesin</th>
                                <th><i class="fas fa-bolt"></i>No. Motor</th>
                                <th><i class="fas fa-tools"></i>Tipe Motor</th>
                                <th><i class="fas fa-file"></i>Catatan</th>
                                <th><i class="fas fa-hammer"></i>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($mesins as $mesin)
                                <tr>
                                    <td><span class="item-code">{{ $mesin->kode }}</span></td>
                                    <td>{{ $mesin->nama_mesin }}</td>
                                    <td>{{ $mesin->no_motor }}</td>
                                    <td>{{ $mesin->type_motor }}</td>
                                    <td>{{ $mesin->catatan}}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <button class="btn elegant-btn elegant-btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detailMesinModal" data-mesin='@json($mesin)'>
                                                <i class="fas fa-info-circle me-1"></i>Detail
                                            </button>
                                            <button class="btn elegant-btn elegant-btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editMesinModal" data-mesin='@json($mesin)'>
                                                <i class="fas fa-edit me-1"></i>Edit
                                            </button>
                                            <form action="{{ route('mesin.destroy', $mesin->kode) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn elegant-btn elegant-btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    <i class="fas fa-trash me-1"></i>Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <div class="empty-state">
                                            <div class="empty-icon">
                                                <i class="fas fa-cogs"></i>
                                            </div>
                                            <h5 class="empty-title">Belum ada data mesin</h5>
                                            <p class="empty-description">Mulai dengan menambahkan mesin pertama Anda</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <br>
                    {{-- Setelah </table> di bagian bawah data-grid --}}
<!-- Diletakkan setelah penutup div elegant-card/tabel -->
<div class="d-flex justify-content-center mt-4">
    {{ $mesins->links('pagination::bootstrap-5') }}
</div>
                </div>
            </div>
        </div>
        
        {{-- Tombol Floating Tambah Data --}}
        <button type="button" class="floating-btn" data-bs-toggle="modal" data-bs-target="#createMesinModal">
            <i class="fas fa-plus"></i>
        </button>

        {{-- Sertakan file modal di sini --}}
        @include('mesin.create-modal')
        @include('mesin.edit-modal')
        @include('mesin.detail-modal')
    </div>
</div>

<script>
    // Pastikan kode JS di sini agar tetap berfungsi setelah konten dimuat
    document.addEventListener('DOMContentLoaded', function () {
        const detailModal = document.getElementById('detailMesinModal');
        // ... (sisanya dari kode JS detailModal dan editModal)
        if (detailModal) {
            detailModal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget;
                const mesin = JSON.parse(button.getAttribute('data-mesin'));
                
                document.getElementById('detail-kode').textContent = mesin.kode;
                document.getElementById('detail-nama_mesin').textContent = mesin.nama_mesin;
                document.getElementById('detail-no_motor').textContent = mesin.no_motor;
                document.getElementById('detail-type_motor').textContent = mesin.type_motor;
                document.getElementById('detail-kw_motor').textContent = mesin.kw_motor;
                document.getElementById('detail-rpm_motor').textContent = mesin.rpm_motor;
                document.getElementById('detail-bearing_depan').textContent = mesin.bearing_depan;
                document.getElementById('detail-bearing_belakang').textContent = mesin.bearing_belakang;
                document.getElementById('detail-seal_depan').textContent = mesin.seal_depan;
                document.getElementById('detail-seal_belakang').textContent = mesin.seal_belakang;
                document.getElementById('detail-catatan').textContent = mesin.catatan;
            });
        }

        const editModal = document.getElementById('editMesinModal');
        if (editModal) {
            editModal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget;
                const mesin = JSON.parse(button.getAttribute('data-mesin'));
                
                const form = editModal.querySelector('#editMesinForm');
                
                // Ganti string placeholder ':kode' dengan kode mesin yang sebenarnya
                let route = form.getAttribute('action');
                // Asumsi action route di form edit-modal adalah sesuatu seperti 'mesin/:kode'
                route = route.replace(':kode', mesin.kode); 
                form.setAttribute('action', route);

                editModal.querySelector('#edit-kode').value = mesin.kode;
                editModal.querySelector('#edit-nama_mesin').value = mesin.nama_mesin;
                editModal.querySelector('#edit-no_motor').value = mesin.no_motor;
                editModal.querySelector('#edit-type_motor').value = mesin.type_motor;
                editModal.querySelector('#edit-kw_motor').value = mesin.kw_motor;
                editModal.querySelector('#edit-rpm_motor').value = mesin.rpm_motor;
                editModal.querySelector('#edit-bearing_depan').value = mesin.bearing_depan;
                editModal.querySelector('#edit-bearing_belakang').value = mesin.bearing_belakang;
                editModal.querySelector('#edit-seal_depan').value = mesin.seal_depan;
                editModal.querySelector('#edit-seal_belakang').value = mesin.seal_belakang;
                editModal.querySelector('#edit-catatan').value = mesin.catatan;
            });
        }

        document.documentElement.style.scrollBehavior = 'smooth';
    });
</script>
@endsection
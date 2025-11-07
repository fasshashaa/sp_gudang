@extends('layouts.app')

@section('content')
<style>
    /* Styling khusus untuk Dashboard yang modern */
    .dashboard-title {
        font-size: 2.2rem;
        font-weight: 700;
        color: #1a1a1a;
        margin-bottom: 30px;
    }

    .info-card {
        background: #ffffff;
        border: none;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); /* Shadow yang lebih lembut */
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        overflow: hidden;
        height: 100%;
    }

    .info-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .card-icon {
        font-size: 2.5rem;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #ffffff;
    }

    .card-title {
        font-size: 1rem;
        color: #6c757d;
        font-weight: 500;
        margin-bottom: 5px;
    }

    .card-value {
        font-size: 2.5rem; /* Ukuran lebih besar karena hanya ada dua card */
        font-weight: 800;
        color: #343a40;
    }

    /* Memastikan card selalu di tengah halaman */
    .center-cards {
        display: flex;
        justify-content: center;
    }
</style>

<div class="container py-4">
    <div class="dashboard-title text-center">
        Ringkasan Data Gudang
    </div>

    <!-- Bagian 1: Ringkasan Data Utama (Info Cards) -->
    <div class="row g-4 center-cards">
        <!-- Card 1: Total Mesin -->
        <div class="col-xl-4 col-md-6">
            <div class="card info-card p-4 text-center">
                <div class="card-body">
                    <div class="card-icon mx-auto mb-3" style="background-color: #00bcd4;">
                        <i class="fas fa-cogs"></i>
                    </div>
                    <p class="card-title">Total Mesin Terdaftar</p>
                    <h4 class="card-value">
                        {{ $mesin_count ?? '0' }} <!-- Data dummy, ganti dengan data real dari Controller -->
                    </h4>
                </div>
            </div>
        </div>

        <!-- Card 2: Total Jenis Barang -->
        <div class="col-xl-4 col-md-6">
            <div class="card info-card p-4 text-center">
                <div class="card-body">
                    <div class="card-icon mx-auto mb-3" style="background-color: #4caf50;">
                        <i class="fas fa-boxes"></i>
                    </div>
                    <p class="card-title">Total Jenis Barang </p>
                    <h4 class="card-value">
                        {{ $barang_count ?? '0' }} <!-- Data dummy, ganti dengan data real dari Controller -->
                    </h4>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bagian 3: Area Navigasi Cepat (Opsi, bisa dihapus jika terlalu simple) -->
    <div class="row mt-5">
        <div class="col-12 text-center">
            <h5 class="text-muted mb-3">Akses Cepat</h5>
            <a href="{{ route('mesin.index') }}" class="btn btn-outline-info me-3 px-4 py-2 rounded-pill fw-bold">
                <i class="fas fa-search me-2"></i> Kelola Data Mesin
            </a>
            <a href="{{ route('barang.index') }}" class="btn btn-outline-success px-4 py-2 rounded-pill fw-bold">
                <i class="fas fa-cubes me-2"></i> Kelola Data Barang
            </a>
        </div>
    </div>

</div>
@endsection
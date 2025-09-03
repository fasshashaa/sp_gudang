<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Mesin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

        :root {
            --primary-50: #f0f9ff;
            --primary-100: #e0f2fe;
            --primary-500: #0ea5e9;
            --primary-600: #0284c7;
            --primary-700: #0369a1;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-300: #d1d5db;
            --gray-500: #6b7280;
            --gray-600: #4b5563;
            --gray-700: #374151;
            --gray-800: #1f2937;
            --gray-900: #111827;
            --success-500: #10b981;
            --warning-500: #f59e0b;
            --danger-500: #ef4444;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
        }

        * {
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 50%, #e2e8f0 100%);
            min-height: 100vh;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            color: var(--gray-700);
            line-height: 1.6;
            font-feature-settings: 'cv02', 'cv03', 'cv04', 'cv11';
        }

        .container {
            max-width: 1400px;
        }

        .elegant-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 24px;
            box-shadow: var(--shadow-lg);
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            overflow: hidden;
        }

        .elegant-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--primary-500), transparent);
            opacity: 0.6;
        }

        .elegant-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-xl);
        }

        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 48px 0 32px;
            margin-bottom: 32px;
        }

        .page-title {
            font-size: 2.75rem;
            font-weight: 800;
            color: var(--gray-900);
            margin: 0;
            letter-spacing: -0.025em;
            display: flex;
            align-items: center;
            position: relative;
        }

        .title-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, var(--primary-500), var(--primary-600));
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            margin-right: 16px;
            box-shadow: var(--shadow-lg);
        }

        .controls-section {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .search-container {
            position: relative;
            min-width: 320px;
        }

        .search-input {
            width: 100%;
            padding: 12px 20px 12px 48px;
            border: 2px solid var(--gray-200);
            border-radius: 16px;
            background: white;
            font-size: 0.95rem;
            font-weight: 500;
            color: var(--gray-700);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: var(--shadow-sm);
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary-500);
            box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.1), var(--shadow-md);
        }

        .search-input::placeholder {
            color: var(--gray-500);
        }

        .search-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-400);
            font-size: 1.1rem;
        }

        .search-btn {
            position: absolute;
            right: 4px;
            top: 4px;
            bottom: 4px;
            padding: 0 16px;
            background: var(--primary-500);
            border: none;
            border-radius: 12px;
            color: white;
            font-weight: 600;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            display: flex;
            align-items: center;
        }

        .search-btn:hover {
            background: var(--primary-600);
            transform: scale(1.02);
        }

        .elegant-btn {
            padding: 12px 24px;
            border: none;
            border-radius: 16px;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            overflow: hidden;
            display: inline-flex;
            align-items: center;
            box-shadow: var(--shadow-sm);
        }

        .elegant-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .elegant-btn:hover::before {
            left: 100%;
        }
        
        .elegant-btn-detail {
            background: linear-gradient(135deg, var(--primary-500), var(--primary-600));
            color: white;
        }
        .elegant-btn-detail:hover {
            background: linear-gradient(135deg, var(--primary-600), var(--primary-700));
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
            color: white;
        }
        .elegant-btn-warning {
            background: linear-gradient(135deg, var(--warning-500), #f97316);
            color: white;
        }

        .elegant-btn-warning:hover {
            background: linear-gradient(135deg, #f97316, #ea580c);
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
            color: white;
        }

        .elegant-btn-danger {
            background: linear-gradient(135deg, var(--danger-500), #dc2626);
            color: white;
        }

        .elegant-btn-danger:hover {
            background: linear-gradient(135deg, #dc2626, #b91c1c);
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
            color: white;
        }

        .data-grid {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--gray-200);
        }

        .table {
            margin: 0;
        }

        .table thead {
            background: linear-gradient(135deg, var(--gray-50), var(--gray-100));
        }

        .table thead th {
            border: none;
            padding: 20px 24px;
            font-weight: 700;
            color: var(--gray-700);
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            position: relative;
        }

        .table thead th i {
            color: var(--primary-500);
            margin-right: 8px;
            font-size: 1rem;
        }

        .table tbody tr {
            border: none;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
        }

        .table tbody tr:not(:last-child) {
            border-bottom: 1px solid var(--gray-100);
        }

        .table tbody tr:hover {
            background: linear-gradient(135deg, var(--primary-50), rgba(14, 165, 233, 0.02));
            transform: scale(1.005);
        }

        .table tbody tr td {
            border: none;
            padding: 20px 24px;
            vertical-align: middle;
            color: var(--gray-600);
            font-weight: 500;
        }

        .item-code {
            font-family: 'SF Mono', 'Monaco', 'Cascadia Code', monospace;
            background: var(--gray-100);
            padding: 4px 8px;
            border-radius: 8px;
            font-weight: 600;
            color: var(--primary-600);
            font-size: 0.9rem;
        }

        .alert {
            border: none;
            border-radius: 16px;
            padding: 16px 20px;
            margin-bottom: 24px;
            font-weight: 500;
            display: flex;
            align-items: center;
            box-shadow: var(--shadow-sm);
        }

        .alert i {
            margin-right: 12px;
            font-size: 1.1rem;
        }

        .alert-success {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(5, 150, 105, 0.1));
            color: var(--success-500);
            border: 1px solid rgba(16, 185, 129, 0.2);
        }

        .alert-danger {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.1), rgba(220, 38, 38, 0.1));
            color: var(--danger-500);
            border: 1px solid rgba(239, 68, 68, 0.2);
        }

        .btn-sm {
            padding: 8px 16px;
            font-size: 0.875rem;
            border-radius: 12px;
        }

        .empty-state {
            text-align: center;
            padding: 80px 32px;
            color: var(--gray-500);
        }

        .empty-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--gray-100), var(--gray-200));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
            font-size: 2rem;
            color: var(--gray-400);
        }

        .empty-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--gray-700);
            margin-bottom: 8px;
        }

        .empty-description {
            font-size: 1rem;
            color: var(--gray-500);
        }

        /* Animations */
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-slide-down {
            animation: slideDown 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .stagger-animation > * {
            animation: slideDown 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
        }

        .stagger-animation > *:nth-child(1) { animation-delay: 0.1s; }
        .stagger-animation > *:nth-child(2) { animation-delay: 0.2s; }
        .stagger-animation > *:nth-child(3) { animation-delay: 0.3s; }
        .stagger-animation > *:nth-child(4) { animation-delay: 0.4s; }
        .stagger-animation > *:nth-child(5) { animation-delay: 0.5s; }
        .stagger-animation > *:nth-child(6) { animation-delay: 0.6s; }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--gray-100);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, var(--primary-500), var(--primary-600));
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, var(--primary-600), var(--primary-700));
        }

        /* Floating button style */
        .floating-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: #0d6efd;
            background: linear-gradient(135deg, var(--primary-500), var(--primary-600));
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            z-index: 1000;
            border: none;
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }
        .floating-btn:hover {
            background: linear-gradient(135deg, var(--primary-600), var(--primary-700));
            transform: scale(1.1);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
            color: white;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid var(--gray-100);
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .detail-label {
            font-weight: 600;
            color: var(--gray-700);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .detail-value {
            font-weight: 500;
            color: var(--gray-600);
            text-align: right;
            flex-grow: 1;
        }
        .modal-header .modal-title {
            font-weight: 700;
            color: var(--gray-900);
        }
        .modal-header {
            border-bottom: 2px solid var(--primary-500);
            padding-bottom: 1rem;
        }
        .modal-content {
            border-radius: 20px;
            border: none;
            box-shadow: var(--shadow-xl);
        }
        .form-label {
            font-weight: 600;
            color: var(--gray-700);
        }
        .form-control {
            border-radius: 12px;
            padding: 10px 15px;
            border: 1px solid var(--gray-300);
            transition: all 0.3s;
        }
        .form-control:focus {
            border-color: var(--primary-500);
            box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.1);
            outline: none;
        }
        
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="stagger-animation">
            <div class="header-section">
                <h2 class="page-title">
                    <div class="title-icon">
                        <i class="fas fa-microchip"></i>
                    </div>
                    Manajemen Mesin
                </h2>
                <div class="controls-section">
                    <form action="{{ route('mesin.index') }}" method="GET" class="search-container">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" name="search" class="form-control search-input" placeholder="Cari nama mesin atau kode..." value="{{ request('search') }}">
                        <button type="submit" class="search-btn">
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </form>
                </div>
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

            <div class="elegant-card">
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
                                                <button class="btn elegant-btn elegant-btn-detail btn-sm" data-bs-toggle="modal" data-bs-target="#detailMesinModal" data-mesin='@json($mesin)'>
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
                                        <td colspan="5">
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button type="button" class="floating-btn" data-bs-toggle="modal" data-bs-target="#createMesinModal">
        <i class="fas fa-plus"></i>
    </button>

   @include('mesin.create-modal')
@include('mesin.edit-modal')
@include('mesin.detail-modal')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const detailModal = document.getElementById('detailMesinModal');
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
</body>
</html>
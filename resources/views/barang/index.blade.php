<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gudang SP</title>
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

        .elegant-btn-primary {
            background: linear-gradient(135deg, var(--primary-500), var(--primary-600));
            color: white;
        }

        .elegant-btn-primary:hover {
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

        .clickable-row {
            cursor: pointer;
        }

        .row-indicator {
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: var(--primary-500);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .clickable-row:hover .row-indicator {
            opacity: 1;
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

        .details-row {
            display: none;
            background: var(--gray-50);
        }

        .details-row td {
            padding: 0 !important;
        }

        .details-content {
            margin: 24px;
            padding: 32px;
            background: white;
            border-radius: 16px;
            box-shadow: var(--shadow-md);
            border: 1px solid var(--gray-200);
            position: relative;
        }

        .details-content::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-500), var(--primary-600), var(--primary-500));
            border-radius: 16px 16px 0 0;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 24px;
        }

        .detail-item {
            display: flex;
            flex-direction: column;
            gap: 8px;
            padding: 16px 0;
            border-bottom: 1px solid var(--gray-100);
        }

        .detail-item:last-child {
            border-bottom: none;
        }

        .detail-label {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--gray-500);
            text-transform: uppercase;
            letter-spacing: 0.025em;
            display: flex;
            align-items: center;
        }

        .detail-label i {
            color: var(--primary-500);
            margin-right: 8px;
            font-size: 1rem;
        }

        .detail-value {
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--gray-800);
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

        @media (max-width: 768px) {
            .header-section {
                flex-direction: column;
                gap: 24px;
                align-items: stretch;
                padding: 32px 0 24px;
            }

            .page-title {
                font-size: 2.25rem;
                justify-content: center;
            }

            .controls-section {
                flex-direction: column;
                align-items: stretch;
            }

            .search-container {
                min-width: auto;
            }

            .detail-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }
        }

        @media (max-width: 480px) {
            .table thead th,
            .table tbody tr td {
                padding: 16px 12px;
                font-size: 0.875rem;
            }

            .details-content {
                margin: 16px;
                padding: 24px;
            }
            
            .floating-btn {
                width: 50px;
                height: 50px;
                bottom: 20px;
                right: 20px;
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="stagger-animation">
            <div class="header-section">
                <h2 class="page-title">
                    <div class="title-icon">
                        <i class="fas fa-warehouse"></i>
                    </div>
                    Gudang SP
                </h2>
                <div class="controls-section">
                    <form action="{{ route('barang.index') }}" method="GET" class="search-container">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" name="search" class="form-control search-input" placeholder="Cari nama barang, kode, atau mesin..." value="{{ request('search') }}">
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
    </div>

    <button type="button" class="floating-btn" data-bs-toggle="modal" data-bs-target="#createBarangModal">
        <i class="fas fa-plus"></i>
    </button>

    @include('barang.create-modal')
    @include('barang.edit-modal')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
                    form.action = `/barang/${barang.code}`;

                    editModal.querySelector('#edit-code').value = barang.code;
                    editModal.querySelector('#edit-machine').value = barang.machine;
                    editModal.querySelector('#edit-name_of_good').value = barang.name_of_good;
                    
                    if (barang.detail_barang) {
                        editModal.querySelector('#edit-specification').value = barang.detail_barang.specification || '';
                        editModal.querySelector('#edit-box').value = barang.detail_barang.box || '';
                        editModal.querySelector('#edit-using_2024').value = barang.detail_barang.using_2024 || '';
                        editModal.querySelector('#edit-opening').value = barang.detail_barang.opening || '';
                        editModal.querySelector('#edit-received').value = barang.detail_barang.received || '';
                        editModal.querySelector('#edit-used').value = barang.detail_barang.used || '';
                        editModal.querySelector('#edit-closing').value = barang.detail_barang.closing || '';
                    } else {
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

            // Add smooth scroll behavior
            document.documentElement.style.scrollBehavior = 'smooth';
        });
    </script>
</body>
</html>
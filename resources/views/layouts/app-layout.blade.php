<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
<title>Gudang Sparepart</title>
<link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #eef4ff;
            /* background-image: url('{{ asset('images/gal.png') }}'); */ 
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        .main-container {
            background-color: #ffffff;
            color: #1f2937;
            border-radius: 2rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            max-width: 1400px;
            margin: auto;
        }
        .nav-item {
            position: relative;
            padding: 0.5rem 1rem;
            transition: color 0.3s ease;
            text-decoration: none;
            color: #6b7280;
            display: block; 
            text-align: left;
        }
        .nav-item::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 3px;
            background-color: #4682b4;
            border-radius: 2px;
            transition: width 0.3s ease-in-out;
        }
        .nav-item:hover::after, .nav-item.active::after {
            width: 100%;
        }
        .nav-item.active {
            color: #4682b4 !important;
            font-weight: 600;
        }
            .profile-img {
            width: 50px;
            height: 50px;
            border-radius: 9999px;
            object-fit: cover;
            border: 2px solid #6b7280;
        }
        .action-card {
            background-color: #f3f4f6;
            border-radius: 1.5rem;
            padding: 2.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .action-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        .elegant-card {
            background-color: #ffffff;
            border-radius: 1rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }
        .elegant-btn {
            border-radius: 0.5rem;
            font-weight: 600;
            padding: 0.375rem 0.75rem;
            transition: all 0.2s;
        }
        .elegant-btn-primary { background-color: #4682b4; border-color: #4682b4; color: white; }
        .elegant-btn-primary:hover { background-color: #3b6d92; border-color: #3b6d92; color: white; }
        .elegant-btn-warning { background-color: #ffc107; border-color: #ffc107; color: #212529; }
        .elegant-btn-warning:hover { background-color: #e0a800; border-color: #e0a800; color: #212529; }
        .elegant-btn-danger { background-color: #dc3545; border-color: #dc3545; color: white; }
        .elegant-btn-danger:hover { background-color: #c82333; border-color: #c82333; color: white; }
        .floating-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1050;
            width: 55px;
            height: 55px;
            border-radius: 50%;
            background-color: #4682b4;
            color: white;
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s, transform 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            padding-bottom: env(safe-area-inset-bottom); 
        }
        .floating-btn:hover {
            background-color: #3b6d92;
            transform: scale(1.05);
        }

        .search-container {
            position: relative;
            display: flex;
            align-items: center;
        }
        .search-input {
            padding-left: 3rem; 
            padding-right: 2.5rem;
            border-radius: 1.5rem;
            border: 1px solid #e2e8f0;
            transition: all 0.3s;
        }
        .search-input:focus {
            border-color: #4682b4;
            box-shadow: 0 0 0 3px rgba(70, 130, 180, 0.25);
        }
        .search-icon {
            position: absolute;
            left: 1rem;
            color: #9ca3af;
            z-index: 10;
        }
        .search-btn {
            position: absolute;
            right: 0.5rem;
            background: none;
            border: none;
            color: #4682b4;
            cursor: pointer;
            transition: color 0.3s;
        }
        .search-btn:hover {
            color: #3b6d92;
        }
        @media (max-width: 767.98px) {
            .data-grid table thead {
                display: none;
            }
            .data-grid table tr {
                display: block;
                margin-bottom: 0.8rem;
                border-bottom: 2px solid #e0e0e0;
                padding: 0.5rem 0;
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            }
            .data-grid table td {
                display: block;
                text-align: right;
                padding-left: 50% !important;
                position: relative;
                border: none !important;
            }
            .data-grid table td::before {
                content: attr(data-label);
                position: absolute;
                left: 10px;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
                text-align: left;
                font-weight: 600;
                color: #4a5568; 
            }
            .data-grid table td:last-child {
                text-align: center; 
                padding-left: 0 !important;
                border-top: 1px solid #f0f0f0;
                margin-top: 5px;
                padding-top: 10px !important;
            }
            .data-grid table td:last-child .d-flex {
                justify-content: center;
                flex-wrap: wrap; 
                gap: 8px !important;
            }
        }
        .animate-slide-down {
            animation: slideDown 0.5s ease-out forwards;
        }
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
        
    </style>
</head>
<body class="bg-gray-100 flex flex-col items-center justify-center p-8">

    <div class="w-full h-full main-container">

        <nav class="navbar navbar-expand-lg navbar-light bg-white border-b border-gray-200 p-3">
            <div class="container-fluid">
                <a class="navbar-brand d-flex align-items-center gap-2" href="#">
                    <i class="fas fa-boxes text-2xl text-blue-500"></i>
                    <h1 class="text-xl font-bold text-gray-800 mb-0">Gudang Sparepart</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                                 <div class="navbar-nav mx-auto py-2 py-lg-0">
                        <a href="/" class="nav-item @if(request()->is('/')) active @endif">Dashboard</a>
                        <a href="/mesin" class="nav-item @if(request()->is('mesin*')) active @endif">Data Mesin</a>
                        <a href="/barang" class="nav-item @if(request()->is('barang*')) active @endif">Data Barang</a>
                    </div>
                    <div class="navbar-nav d-flex align-items-center ms-auto pt-3 pt-lg-0">
                        <div class="text-lg-end text-center d-none d-sm-block me-3">
                            @auth
                            <h2 class="text-md font-semibold text-gray-800 mb-0">{{ auth()->user()->name }}</h2>
                            <p class="text-sm text-gray-500 mb-0">{{ auth()->user()->email }}</p>
                            @endauth
                        </div>
                        
                        <div class="d-flex align-items-center justify-content-center justify-content-lg-start gap-3">
                            @auth
                            <img class="profile-img" src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=E5E7EB&color=1F2937&bold=true" alt="User Profile Picture">
                            @endauth
                            
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="text-red-500 hover:text-red-700 transition-colors btn btn-link p-0">
                                    <i class="fas fa-sign-out-alt fa-lg"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </nav>
        @yield('content') 
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/A60J/W+8Q0o4YwK2sXfF3vF5p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
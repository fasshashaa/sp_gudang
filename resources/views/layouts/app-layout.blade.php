<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gudang SP - @yield('title', 'Aplikasi')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        /* Masukkan semua kode CSS dari Dashboard Anda di sini */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #eef4ff;
            /* Perhatikan: Jika ini tidak jalan, ganti dengan background-image yang lebih sederhana */
            background-image: url('{{ asset('images/gal.png') }}'); 
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        .main-container {
            background-color: #ffffff;
            color: #1f2937;
            border-radius: 2rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        /* ... CSS lainnya (nav-item, active, profile-img, action-card) ... */
        .nav-item {
            position: relative;
            padding: 0.5rem 1rem;
            transition: color 0.3s ease;
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
        .nav-item:hover::after {
            width: 100%;
        }
        .nav-item.active {
            color: #4682b4;
            font-weight: 600;
        }
        .nav-item.active::after {
            width: 100%;
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
    </style>
</head>
<body class="bg-gray-100 flex flex-col items-center justify-center p-8">

    <div class="w-full h-full main-container">
        <nav class="flex items-center justify-between p-6 bg-white border-b border-gray-200">
            <div class="flex items-center space-x-4">
                <i class="fas fa-boxes text-2xl text-blue-500"></i>
                <h1 class="text-xl font-bold text-gray-800">Gudang Sparepart</h1>
            </div>
            
            <div class="flex items-center space-x-6">
                <a href="/" class="nav-item text-gray-600 hover:text-gray-900 @if(request()->is('/')) active @endif">Dashboard</a>
                <a href="/mesin" class="nav-item text-gray-600 hover:text-gray-900 @if(request()->is('mesin*')) active @endif">Data Mesin</a>
                <a href="/barang" class="nav-item text-gray-600 hover:text-gray-900 @if(request()->is('barang*')) active @endif">Data Barang</a>
            </div>

            <div class="flex items-center space-x-4">
                <div class="text-right hidden sm:block">
                    @auth
                    <h2 class="text-md font-semibold text-gray-800">{{ auth()->user()->name }}</h2>
                    <p class="text-sm text-gray-500">{{ auth()->user()->email }}</p>
                    @endauth
                </div>
                @auth
                <img class="profile-img" src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=E5E7EB&color=1F2937&bold=true" alt="User Profile Picture">
                @endauth
                
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-red-500 hover:text-red-700 transition-colors">
                        <i class="fas fa-sign-out-alt fa-lg"></i>
                    </button>
                </form>
            </div>
        </nav>
        @yield('content') 
        </div>

</body>
</html>
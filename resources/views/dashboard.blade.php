<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gudang SP</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: "Inter", sans-serif;
            background-color: #f3f4f6;
        }
        .card-link {
            transition: all 0.3s ease-in-out;
        }
        .card-link:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4 sm:p-6 lg:p-8">

    <div class="w-full max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-12">
            <div class="text-left">
                <h1 class="text-4xl sm:text-5xl font-extrabold text-gray-900 mb-2">Gudang SP</h1>
                <p class="text-lg text-gray-600 font-medium">Pilih menu untuk mengelola data.</p>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full transition duration-300 ease-in-out transform hover:scale-105">
                    Logout
                </button>
            </form>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <a href="/mesin" class="card-link block bg-white rounded-2xl shadow-lg p-8 transform hover:scale-105">
                <div class="flex flex-col items-center text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 mb-4 text-indigo-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="3" width="20" height="14" rx="2" ry="2" />
                        <line x1="8" y1="21" x2="16" y2="21" />
                        <line x1="12" y1="17" x2="12" y2="21" />
                    </svg>
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">Data Mesin</h2>
                    <p class="text-gray-500">Kelola informasi detail, spesifikasi mesin-mesin yang ada.</p>
                </div>
            </a>

            <a href="/barang" class="card-link block bg-white rounded-2xl shadow-lg p-8 transform hover:scale-105">
                <div class="flex flex-col items-center text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 mb-4 text-emerald-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" />
                        <line x1="3" y1="6" x2="21" y2="6" />
                        <path d="M16 10a4 4 0 0 1-8 0" />
                    </svg>
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">Data Barang</h2>
                    <p class="text-gray-500">Lihat dan kelola inventaris barang dan suku cadang yang tersedia di gudang.</p>
                </div>
            </a>
        </div>
    </div>

</body>
</html>
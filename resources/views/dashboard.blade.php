@extends('layouts.app-layout')

@section('title', 'Dashboard')

@section('content')
    <div class="p-16">
        <h2 class="text-3xl font-bold text-gray-800 mb-10">Pilih Menu</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <a href="/mesin" class="action-card bg-white border border-gray-200 rounded-3xl p-10 transform transition-all duration-300 hover:scale-105 hover:shadow-xl">
                <i class="fas fa-cogs text-6xl text-indigo-600 mb-6 transition-transform duration-300 group-hover:rotate-12"></i>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Data Mesin</h3>
                <p class="text-gray-500 text-center">Kelola informasi detail, spesifikasi mesin yang ada.</p>
            </a>

            <a href="/barang" class="action-card bg-white border border-gray-200 rounded-3xl p-10 transform transition-all duration-300 hover:scale-105 hover:shadow-xl">
                <i class="fas fa-box-open text-6xl text-emerald-600 mb-6 transition-transform duration-300 group-hover:scale-110"></i>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Data Barang</h3>
                <p class="text-gray-500 text-center">Lihat dan kelola inventaris barang dan suku cadang.</p>
            </a>
        </div>
    </div>
@endsection
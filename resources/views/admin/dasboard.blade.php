@extends('component.adminmaster')

@section('content')
    <!-- Main Content Area -->
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100">
        <!-- Header -->
        <div class="bg-white/80 backdrop-blur-sm border-b border-gray-200/50 shadow-sm">
            <div class="px-4 sm:px-6 lg:px-8 py-4">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <!-- Page Title -->
                    <div>
                        <div class="flex items-center space-x-3">
                            <div class="p-2 bg-gradient-to-br from-amber-500 to-amber-600 rounded-lg shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                            </div>
                            <div>
                                <h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
                                <p class="text-sm text-gray-600 mt-1">Selamat datang kembali, {{ Auth::user()->name }}!</p>
                            </div>
                        </div>
                    </div>

                    <!-- Date & Stats -->
                    <div class="flex items-center space-x-4">
                        <div class="hidden sm:block px-4 py-2 bg-white rounded-lg border border-gray-200 shadow-sm">
                            <p class="text-sm font-medium text-gray-900" id="current-date"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dashboard Content -->
        <div class="p-4 sm:p-6 lg:p-8">
            <!-- Stats Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Students Card -->
                <div class="bg-gradient-to-br from-blue-600 to-blue-700 rounded-2xl shadow-xl p-6 text-white dashboard-card hover:scale-105 transition-all duration-300">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-white/20 backdrop-blur-sm rounded-xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <span class="text-xs font-semibold bg-white/30 px-3 py-1 rounded-full">Siswa</span>
                    </div>
                    <h3 class="text-sm font-medium text-blue-100 mb-2">Total Siswa</h3>
                    <div class="flex items-end justify-between">
                        <p class="text-3xl font-bold">{{ $data->where('level', 'siswa')->count() }}</p>
                        <div class="text-right">
                            <p class="text-xs text-blue-100">
                                <span class="font-semibold">{{ $data->where('level', 'siswa')->where('jekel', 'l')->count() }} L</span>
                                •
                                <span class="font-semibold">{{ $data->where('level', 'siswa')->where('jekel', 'p')->count() }} P</span>
                            </p>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-white/20">
                        <div class="flex items-center space-x-2 text-xs">
                            <div class="w-full bg-white/20 rounded-full h-2">
                                <div class="bg-white h-2 rounded-full" style="width: {{ $data->where('level', 'siswa')->count() > 0 ? ($data->where('level', 'siswa')->where('jekel', 'l')->count() / $data->where('level', 'siswa')->count() * 100) : 0 }}%"></div>
                            </div>
                            <span>Rasio</span>
                        </div>
                    </div>
                </div>

                <!-- Teachers Card -->
                <div class="bg-gradient-to-br from-indigo-600 to-indigo-700 rounded-2xl shadow-xl p-6 text-white dashboard-card hover:scale-105 transition-all duration-300">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-white/20 backdrop-blur-sm rounded-xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <span class="text-xs font-semibold bg-white/30 px-3 py-1 rounded-full">Guru</span>
                    </div>
                    <h3 class="text-sm font-medium text-indigo-100 mb-2">Total Guru</h3>
                    <div class="flex items-end justify-between">
                        <p class="text-3xl font-bold">{{ $data->where('level', 'guru')->count() }}</p>
                        <div class="text-right">
                            <p class="text-xs text-indigo-100">
                                <span class="font-semibold">{{ $data->where('level', 'guru')->where('jekel', 'l')->count() }} L</span>
                                •
                                <span class="font-semibold">{{ $data->where('level', 'guru')->where('jekel', 'p')->count() }} P</span>
                            </p>
                        </div>
                    </div>
                    <div class="mt-4 pt-4 border-t border-white/20">
                        <div class="flex items-center space-x-2 text-xs">
                            <div class="w-full bg-white/20 rounded-full h-2">
                                <div class="bg-white h-2 rounded-full" style="width: {{ $data->where('level', 'guru')->count() > 0 ? ($data->where('level', 'guru')->where('jekel', 'l')->count() / $data->where('level', 'guru')->count() * 100) : 0 }}%"></div>
                            </div>
                            <span>Rasio</span>
                        </div>
                    </div>
                </div>

                <!-- Subjects Card -->
                <div class="bg-gradient-to-br from-purple-600 to-purple-700 rounded-2xl shadow-xl p-6 text-white dashboard-card hover:scale-105 transition-all duration-300">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-white/20 backdrop-blur-sm rounded-xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <span class="text-xs font-semibold bg-white/30 px-3 py-1 rounded-full">Mapel</span>
                    </div>
                    <h3 class="text-sm font-medium text-purple-100 mb-2">Total Mata Pelajaran</h3>
                    <p class="text-3xl font-bold mb-2">{{ $mapel }}</p>
                    <div class="mt-4 pt-4 border-t border-white/20">
                        <div class="flex items-center space-x-2 text-xs">
                            <div class="w-full bg-white/20 rounded-full h-2">
                                <div class="bg-white h-2 rounded-full" style="width: 100%"></div>
                            </div>
                            <span>Aktif</span>
                        </div>
                    </div>
                </div>

                <!-- Classes Card -->
                <div class="bg-gradient-to-br from-pink-600 to-pink-700 rounded-2xl shadow-xl p-6 text-white dashboard-card hover:scale-105 transition-all duration-300">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-white/20 backdrop-blur-sm rounded-xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <span class="text-xs font-semibold bg-white/30 px-3 py-1 rounded-full">Kelas</span>
                    </div>
                    <h3 class="text-sm font-medium text-pink-100 mb-2">Total Kelas</h3>
                    <p class="text-3xl font-bold mb-2">0</p>
                    <div class="mt-4 pt-4 border-t border-white/20">
                        <div class="flex items-center space-x-2 text-xs">
                            <div class="w-full bg-white/20 rounded-full h-2">
                                <div class="bg-white h-2 rounded-full" style="width: 0%"></div>
                            </div>
                            <span>Kosong</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- Students Distribution -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200/50 dashboard-card">
                    <div class="bg-gradient-to-r from-blue-600 to-blue-700 p-6 text-white">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="p-2 bg-white/20 rounded-lg">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-lg">Distribusi Siswa</h3>
                                    <p class="text-sm text-blue-100">Berdasarkan Jenis Kelamin</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-2xl font-bold">{{ $data->where('level', 'siswa')->count() }}</p>
                                <p class="text-xs text-blue-100">Total Siswa</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex flex-col lg:flex-row items-center gap-8">
                            <div class="w-48 h-48 flex-shrink-0">
                                <canvas id="studentChart"></canvas>
                            </div>
                            <div class="flex-1 w-full">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="bg-blue-50 p-4 rounded-xl border border-blue-100">
                                        <div class="flex items-center space-x-2 mb-2">
                                            <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                                            <span class="text-sm font-medium text-gray-700">Laki-laki</span>
                                        </div>
                                        <p class="text-2xl font-bold text-gray-900">{{ $data->where('level', 'siswa')->where('jekel', 'l')->count() }}</p>
                                        <div class="mt-2">
                                            <div class="flex items-center justify-between text-xs text-gray-500">
                                                <span>Persentase</span>
                                                <span class="font-medium">
                                                    {{ $data->where('level', 'siswa')->count() > 0 ? round(($data->where('level', 'siswa')->where('jekel', 'l')->count() / $data->where('level', 'siswa')->count()) * 100, 1) : 0 }}%
                                                </span>
                                            </div>
                                            <div class="w-full bg-gray-200 rounded-full h-1.5 mt-1">
                                                <div class="bg-blue-500 h-1.5 rounded-full" 
                                                     style="width: {{ $data->where('level', 'siswa')->count() > 0 ? ($data->where('level', 'siswa')->where('jekel', 'l')->count() / $data->where('level', 'siswa')->count()) * 100 : 0 }}%">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="bg-amber-50 p-4 rounded-xl border border-amber-100">
                                        <div class="flex items-center space-x-2 mb-2">
                                            <div class="w-3 h-3 bg-amber-500 rounded-full"></div>
                                            <span class="text-sm font-medium text-gray-700">Perempuan</span>
                                        </div>
                                        <p class="text-2xl font-bold text-gray-900">{{ $data->where('level', 'siswa')->where('jekel', 'p')->count() }}</p>
                                        <div class="mt-2">
                                            <div class="flex items-center justify-between text-xs text-gray-500">
                                                <span>Persentase</span>
                                                <span class="font-medium">
                                                    {{ $data->where('level', 'siswa')->count() > 0 ? round(($data->where('level', 'siswa')->where('jekel', 'p')->count() / $data->where('level', 'siswa')->count()) * 100, 1) : 0 }}%
                                                </span>
                                            </div>
                                            <div class="w-full bg-gray-200 rounded-full h-1.5 mt-1">
                                                <div class="bg-amber-500 h-1.5 rounded-full" 
                                                     style="width: {{ $data->where('level', 'siswa')->count() > 0 ? ($data->where('level', 'siswa')->where('jekel', 'p')->count() / $data->where('level', 'siswa')->count()) * 100 : 0 }}%">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mt-6 pt-6 border-t border-gray-200">
                                    <h4 class="text-sm font-semibold text-gray-700 mb-3">Statistik</h4>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                        <div class="bg-gray-50 p-3 rounded-lg">
                                            <p class="text-xs text-gray-500 mb-1">Rasio Gender</p>
                                            <p class="text-sm font-medium text-gray-900">
                                                {{ $data->where('level', 'siswa')->where('jekel', 'l')->count() }}:{{ $data->where('level', 'siswa')->where('jekel', 'p')->count() }}
                                            </p>
                                        </div>
                                        <div class="bg-gray-50 p-3 rounded-lg">
                                            <p class="text-xs text-gray-500 mb-1">Rata-rata per Kelas</p>
                                            <p class="text-sm font-medium text-gray-900">-</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Teachers Distribution -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200/50 dashboard-card">
                    <div class="bg-gradient-to-r from-indigo-600 to-indigo-700 p-6 text-white">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="p-2 bg-white/20 rounded-lg">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-bold text-lg">Distribusi Guru</h3>
                                    <p class="text-sm text-indigo-100">Berdasarkan Jenis Kelamin</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-2xl font-bold">{{ $data->where('level', 'guru')->count() }}</p>
                                <p class="text-xs text-indigo-100">Total Guru</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="flex flex-col lg:flex-row items-center gap-8">
                            <div class="w-48 h-48 flex-shrink-0">
                                <canvas id="teacherChart"></canvas>
                            </div>
                            <div class="flex-1 w-full">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="bg-indigo-50 p-4 rounded-xl border border-indigo-100">
                                        <div class="flex items-center space-x-2 mb-2">
                                            <div class="w-3 h-3 bg-indigo-500 rounded-full"></div>
                                            <span class="text-sm font-medium text-gray-700">Laki-laki</span>
                                        </div>
                                        <p class="text-2xl font-bold text-gray-900">{{ $data->where('level', 'guru')->where('jekel', 'l')->count() }}</p>
                                        <div class="mt-2">
                                            <div class="flex items-center justify-between text-xs text-gray-500">
                                                <span>Persentase</span>
                                                <span class="font-medium">
                                                    {{ $data->where('level', 'guru')->count() > 0 ? round(($data->where('level', 'guru')->where('jekel', 'l')->count() / $data->where('level', 'guru')->count()) * 100, 1) : 0 }}%
                                                </span>
                                            </div>
                                            <div class="w-full bg-gray-200 rounded-full h-1.5 mt-1">
                                                <div class="bg-indigo-500 h-1.5 rounded-full" 
                                                     style="width: {{ $data->where('level', 'guru')->count() > 0 ? ($data->where('level', 'guru')->where('jekel', 'l')->count() / $data->where('level', 'guru')->count()) * 100 : 0 }}%">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="bg-amber-50 p-4 rounded-xl border border-amber-100">
                                        <div class="flex items-center space-x-2 mb-2">
                                            <div class="w-3 h-3 bg-amber-500 rounded-full"></div>
                                            <span class="text-sm font-medium text-gray-700">Perempuan</span>
                                        </div>
                                        <p class="text-2xl font-bold text-gray-900">{{ $data->where('level', 'guru')->where('jekel', 'p')->count() }}</p>
                                        <div class="mt-2">
                                            <div class="flex items-center justify-between text-xs text-gray-500">
                                                <span>Persentase</span>
                                                <span class="font-medium">
                                                    {{ $data->where('level', 'guru')->count() > 0 ? round(($data->where('level', 'guru')->where('jekel', 'p')->count() / $data->where('level', 'guru')->count()) * 100, 1) : 0 }}%
                                                </span>
                                            </div>
                                            <div class="w-full bg-gray-200 rounded-full h-1.5 mt-1">
                                                <div class="bg-amber-500 h-1.5 rounded-full" 
                                                     style="width: {{ $data->where('level', 'guru')->count() > 0 ? ($data->where('level', 'guru')->where('jekel', 'p')->count() / $data->where('level', 'guru')->count()) * 100 : 0 }}%">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mt-6 pt-6 border-t border-gray-200">
                                    <h4 class="text-sm font-semibold text-gray-700 mb-3">Statistik</h4>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                        <div class="bg-gray-50 p-3 rounded-lg">
                                            <p class="text-xs text-gray-500 mb-1">Rasio Gender</p>
                                            <p class="text-sm font-medium text-gray-900">
                                                {{ $data->where('level', 'guru')->where('jekel', 'l')->count() }}:{{ $data->where('level', 'guru')->where('jekel', 'p')->count() }}
                                            </p>
                                        </div>
                                        <div class="bg-gray-50 p-3 rounded-lg">
                                            <p class="text-xs text-gray-500 mb-1">Rata-rata Siswa/Guru</p>
                                            <p class="text-sm font-medium text-gray-900">
                                                {{ $data->where('level', 'guru')->count() > 0 ? round($data->where('level', 'siswa')->count() / $data->where('level', 'guru')->count(), 1) : 0 }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-200/50 dashboard-card">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-bold text-gray-900">Aksi Cepat</h3>
                    <span class="text-xs font-semibold bg-gradient-to-r from-amber-500 to-amber-600 text-white px-3 py-1 rounded-full">Akses Cepat</span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    @if (Auth::user()->level == 'admin')
                        <a href="{{ route('dataguru') }}"
                            class="group bg-gradient-to-br from-blue-50 to-blue-100 hover:from-blue-100 hover:to-blue-200 p-4 rounded-xl border border-blue-200 hover:border-blue-300 hover:shadow-lg transition-all duration-300 quick-action-card">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-blue-700 rounded-lg flex items-center justify-center mb-3 mx-auto group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                            </div>
                            <p class="text-sm font-semibold text-gray-800 text-center">Tambah Guru</p>
                            <p class="text-xs text-gray-500 text-center mt-1">Data Personal</p>
                        </a>
                    @endif

                    @if (Auth::user()->level == 'admin' || Auth::user()->level == 'guru')
                        <a href="{{ route('datasiswa') }}"
                            class="group bg-gradient-to-br from-indigo-50 to-indigo-100 hover:from-indigo-100 hover:to-indigo-200 p-4 rounded-xl border border-indigo-200 hover:border-indigo-300 hover:shadow-lg transition-all duration-300 quick-action-card">
                            <div class="w-12 h-12 bg-gradient-to-br from-indigo-600 to-indigo-700 rounded-lg flex items-center justify-center mb-3 mx-auto group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                            </div>
                            <p class="text-sm font-semibold text-gray-800 text-center">Tambah Siswa</p>
                            <p class="text-xs text-gray-500 text-center mt-1">Data Akademik</p>
                        </a>
                    @endif

                    <a href="{{ route('datamapel') }}"
                        class="group bg-gradient-to-br from-purple-50 to-purple-100 hover:from-purple-100 hover:to-purple-200 p-4 rounded-xl border border-purple-200 hover:border-purple-300 hover:shadow-lg transition-all duration-300 quick-action-card">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-600 to-purple-700 rounded-lg flex items-center justify-center mb-3 mx-auto group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </div>
                        <p class="text-sm font-semibold text-gray-800 text-center">Kelola Mapel</p>
                        <p class="text-xs text-gray-500 text-center mt-1">Kurikulum</p>
                    </a>

                    <a href="{{ route('showRoomKelas') }}"
                        class="group bg-gradient-to-br from-pink-50 to-pink-100 hover:from-pink-100 hover:to-pink-200 p-4 rounded-xl border border-pink-200 hover:border-pink-300 hover:shadow-lg transition-all duration-300 quick-action-card">
                        <div class="w-12 h-12 bg-gradient-to-br from-pink-600 to-pink-700 rounded-lg flex items-center justify-center mb-3 mx-auto group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <p class="text-sm font-semibold text-gray-800 text-center">Kelola Kelas</p>
                        <p class="text-xs text-gray-500 text-center mt-1">Ruang Belajar</p>
                    </a>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // Set current date
            const now = new Date();
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            document.getElementById('current-date').textContent = now.toLocaleDateString('id-ID', options);

            // Student chart
            const studentChartCtx = document.getElementById('studentChart').getContext('2d');
            new Chart(studentChartCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Laki-laki', 'Perempuan'],
                    datasets: [{
                        data: [
                            {{ $data->where('level', 'siswa')->where('jekel', 'l')->count() }},
                            {{ $data->where('level', 'siswa')->where('jekel', 'p')->count() }}
                        ],
                        backgroundColor: ['#3B82F6', '#F59E0B'],
                        borderWidth: 0,
                        hoverOffset: 15,
                        borderColor: '#ffffff',
                        borderWidth: 3
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    cutout: '70%',
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0, 0, 0, 0.8)',
                            titleFont: { size: 12 },
                            bodyFont: { size: 14 },
                            padding: 12,
                            cornerRadius: 8,
                            callbacks: {
                                label: function(context) {
                                    let label = context.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    const total = {{ $data->where('level', 'siswa')->count() }};
                                    const value = context.raw || 0;
                                    const percentage = total > 0 ? Math.round((value / total) * 100) : 0;
                                    label += value + ' (' + percentage + '%)';
                                    return label;
                                }
                            }
                        }
                    }
                }
            });

            // Teacher chart
            const teacherChartCtx = document.getElementById('teacherChart').getContext('2d');
            new Chart(teacherChartCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Laki-laki', 'Perempuan'],
                    datasets: [{
                        data: [
                            {{ $data->where('level', 'guru')->where('jekel', 'l')->count() }},
                            {{ $data->where('level', 'guru')->where('jekel', 'p')->count() }}
                        ],
                        backgroundColor: ['#6366F1', '#F59E0B'],
                        borderWidth: 0,
                        hoverOffset: 15,
                        borderColor: '#ffffff',
                        borderWidth: 3
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    cutout: '70%',
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0, 0, 0, 0.8)',
                            titleFont: { size: 12 },
                            bodyFont: { size: 14 },
                            padding: 12,
                            cornerRadius: 8,
                            callbacks: {
                                label: function(context) {
                                    let label = context.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    const total = {{ $data->where('level', 'guru')->count() }};
                                    const value = context.raw || 0;
                                    const percentage = total > 0 ? Math.round((value / total) * 100) : 0;
                                    label += value + ' (' + percentage + '%)';
                                    return label;
                                }
                            }
                        }
                    }
                }
            });

            // Add hover effects to dashboard cards only (not sidebar)
            document.querySelectorAll('.dashboard-card').forEach(card => {
                // Hanya terapkan efek pada card statistik di dashboard
                if (card.classList.contains('hover:scale-105')) {
                    card.addEventListener('mouseenter', function() {
                        this.style.transform = 'scale(1.05) translateY(-4px)';
                    });
                    
                    card.addEventListener('mouseleave', function() {
                        this.style.transform = 'scale(1) translateY(0)';
                    });
                }
            });

            // Add hover effects to quick action cards only
            document.querySelectorAll('.quick-action-card').forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-4px)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
        </script>
    </div>
@endsection
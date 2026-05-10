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
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                            <div>
                                <h1 class="text-2xl font-bold text-gray-900">
                                    {{ isset($user) ? 'Edit Mapel Kelas' : 'Tambah Mapel Kelas' }}
                                </h1>
                                <p class="text-sm text-gray-600 mt-1">
                                    {{ isset($user) ? 'Perbarui mata pelajaran kelas' : 'Tambahkan mata pelajaran baru untuk kelas' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- User Info -->
                    <div
                        class="flex items-center space-x-3 bg-gradient-to-r from-gray-900 to-gray-800 px-4 py-3 rounded-xl shadow-lg">
                        <div
                            class="w-10 h-10 bg-gradient-to-br from-amber-500 to-amber-600 rounded-full flex items-center justify-center text-white font-bold text-lg shadow-lg ring-4 ring-amber-500/20">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <div class="hidden md:block">
                            <p class="text-sm font-semibold text-white">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-300 capitalize">{{ Auth::user()->level }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Content -->
        <div class="p-4 sm:p-6 lg:p-8">
            <!-- Breadcrumb -->
            <div class="mb-6">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="{{ route('masuk') }}"
                                class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-amber-600">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <a href="{{ route('datakelas') }}"
                                    class="ml-1 text-sm font-medium text-gray-700 hover:text-amber-600 md:ml-2">Data
                                    Kelas</a>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <a href="{{ route('datamapelkelas', $kelass) }}"
                                    class="ml-1 text-sm font-medium text-gray-700 hover:text-amber-600 md:ml-2">Mapel
                                    Kelas</a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="ml-1 text-sm font-medium text-amber-600 md:ml-2">
                                    {{ isset($user) ? 'Edit Data' : 'Tambah Data' }}
                                </span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200/50 max-w-4xl mx-auto">
                <!-- Form Header -->
                <div class="bg-gradient-to-r from-gray-900 to-gray-800 px-6 py-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="p-2 bg-white/20 rounded-lg">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="{{ isset($user) ? 'M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z' : 'M12 4v16m8-8H4' }}" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-white">Form Mata Pelajaran Kelas</h3>
                                <p class="text-sm text-gray-300">Isi data mata pelajaran dengan lengkap</p>
                            </div>
                        </div>
                        <div class="hidden sm:block">
                            <span class="text-xs font-semibold bg-white/30 px-3 py-1 rounded-full text-white">
                                {{ isset($user) ? 'Mode Edit' : 'Mode Tambah' }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Form Content -->
                <div class="p-6">
                    <form action="{{ route('posmapelkelas', $kelass) }}" method="POST" class="space-y-6">
                        @csrf
                        <input type="hidden" name="id" value="{{ isset($user) ? $user->id : '' }}">
                        <input type="hidden" name="id_kelas" value="{{ $kelass }}">

                        <!-- Class Info -->
                        <div class="bg-gradient-to-br from-blue-50 to-blue-100 border border-blue-200 rounded-xl p-4 mb-6">
                            <div class="flex items-center space-x-2 mb-2">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                                <h4 class="text-sm font-medium text-blue-800">Informasi Kelas</h4>
                            </div>
                            <p class="text-sm text-blue-700">
                                Anda sedang menambahkan mata pelajaran untuk kelas:
                                <span class="font-semibold">
                                    @php
                                        $kelasData = \App\Models\Kelas::find($kelass);
                                        echo $kelasData ? $kelasData->namakelas : 'Kelas Tidak Ditemukan';
                                    @endphp
                                </span>
                            </p>
                        </div>

                        <!-- Form Fields -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Mata Pelajaran -->
                            <div>
                                <label for="mapel" class="block text-sm font-medium text-gray-700 mb-2">
                                    Mata Pelajaran <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                        </svg>
                                    </div>
                                    <select id="mapel" name="mapel" required
                                        class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all duration-300 appearance-none bg-white"
                                        onchange="updateMapelPreview()">
                                        <option value="">Pilih Mata Pelajaran</option>
                                        @foreach ($mapel as $a)
                                            <option value="{{ $a->id }}" {{ old('mapel', isset($user) && $user->id_mapel == $a->id ? 'selected' : '') }} data-name="{{ $a->namamapel }}">
                                                {{ $a->namamapel }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                </div>
                                @error('mapel')
                                    <p class="mt-2 text-sm text-red-600 flex items-center space-x-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.874-.833-2.644 0L4.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                                        </svg>
                                        <span>{{ $message }}</span>
                                    </p>
                                @enderror
                            </div>

                            <!-- Pengajar -->
                            <div>
                                <label for="wali" class="block text-sm font-medium text-gray-700 mb-2">
                                    Pengajar <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                    </div>
                                    <select id="wali" name="wali" required
                                        class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all duration-300 appearance-none bg-white"
                                        onchange="updatePengajarPreview()">
                                        <option value="">Pilih Pengajar</option>
                                        @foreach ($wali as $guru)
                                            <option value="{{ $guru->id }}" {{ old('wali', isset($user) && $user->pengajar == $guru->id ? 'selected' : '') }} data-name="{{ $guru->name }}">
                                                {{ $guru->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                </div>
                                @error('wali')
                                    <p class="mt-2 text-sm text-red-600 flex items-center space-x-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.874-.833-2.644 0L4.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                                        </svg>
                                        <span>{{ $message }}</span>
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <!-- Preview Card -->
                        <div class="bg-gradient-to-br from-amber-50 to-amber-100 border border-amber-200 rounded-xl p-4">
                            <h4 class="text-sm font-medium text-amber-800 mb-3 flex items-center space-x-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <span>Preview Mata Pelajaran</span>
                            </h4>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="bg-white p-3 rounded-lg">
                                    <p class="text-xs text-gray-500 mb-1">Kelas</p>
                                    <p class="text-sm font-medium text-gray-900">
                                        {{ $kelasData ? $kelasData->namakelas : '-' }}
                                    </p>
                                </div>
                                <div class="bg-white p-3 rounded-lg">
                                    <p class="text-xs text-gray-500 mb-1">Mata Pelajaran</p>
                                    <p class="text-sm font-medium text-gray-900" id="previewMapel">-</p>
                                </div>
                                <div class="bg-white p-3 rounded-lg">
                                    <p class="text-xs text-gray-500 mb-1">Pengajar</p>
                                    <div class="flex items-center space-x-2">
                                        <div
                                            class="h-6 w-6 rounded-full bg-gradient-to-br from-purple-500 to-purple-600 flex items-center justify-center">
                                            <span class="text-white text-xs font-bold" id="previewPengajarInitial">-</span>
                                        </div>
                                        <span class="text-sm font-medium text-gray-900" id="previewPengajarName">-</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="flex flex-col sm:flex-row items-center justify-between pt-6 border-t border-gray-200">
                            <div class="mb-4 sm:mb-0">
                                <p class="text-sm text-gray-500">
                                    <span class="text-red-500">*</span> Menandakan field yang wajib diisi
                                </p>
                            </div>
                            <div class="flex items-center space-x-3">
                                <a href="{{ route('datamapelkelas', $kelass) }}"
                                    class="px-6 py-3 border border-gray-300 text-gray-700 hover:bg-gray-50 rounded-xl font-medium transition-all duration-300 flex items-center space-x-2 hover:shadow-sm">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                    </svg>
                                    <span>Kembali</span>
                                </a>
                                <button type="submit"
                                    class="px-6 py-3 bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-600 hover:to-amber-700 text-white rounded-xl font-medium shadow-lg hover:shadow-xl transition-all duration-300 flex items-center space-x-2 transform hover:-translate-y-0.5">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="{{ isset($user) ? 'M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4' : 'M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4' }}" />
                                    </svg>
                                    <span>{{ isset($user) ? 'Perbarui Data' : 'Simpan Data' }}</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            // Form elements
            const mapelSelect = document.getElementById('mapel');
            const waliSelect = document.getElementById('wali');

            // Preview elements
            const previewMapel = document.getElementById('previewMapel');
            const previewPengajarInitial = document.getElementById('previewPengajarInitial');
            const previewPengajarName = document.getElementById('previewPengajarName');

            // Update preview for mapel
            function updateMapelPreview() {
                const selectedOption = mapelSelect.options[mapelSelect.selectedIndex];
                const mapelName = selectedOption.getAttribute('data-name');

                if (mapelName) {
                    previewMapel.textContent = mapelName;
                } else {
                    previewMapel.textContent = '-';
                }
            }

            // Update preview for pengajar
            function updatePengajarPreview() {
                const selectedOption = waliSelect.options[waliSelect.selectedIndex];
                const pengajarName = selectedOption.getAttribute('data-name');

                if (pengajarName) {
                    previewPengajarInitial.textContent = pengajarName.substring(0, 1).toUpperCase();
                    previewPengajarName.textContent = pengajarName;
                } else {
                    previewPengajarInitial.textContent = '-';
                    previewPengajarName.textContent = '-';
                }
            }

            // Add event listeners
            mapelSelect.addEventListener('change', updateMapelPreview);
            waliSelect.addEventListener('change', updatePengajarPreview);

            // Initial update
            updateMapelPreview();
            updatePengajarPreview();

            // Add focus styles to form inputs
            document.querySelectorAll('select').forEach(select => {
                select.addEventListener('focus', function () {
                    this.parentElement.classList.add('ring-2', 'ring-amber-500', 'ring-opacity-50');
                });

                select.addEventListener('blur', function () {
                    this.parentElement.classList.remove('ring-2', 'ring-amber-500', 'ring-opacity-50');
                });
            });

            // Form validation
            document.querySelector('form').addEventListener('submit', function (e) {
                const mapel = mapelSelect.value;
                const wali = waliSelect.value;

                let hasError = false;

                if (!mapel) {
                    mapelSelect.classList.add('border-red-500');
                    hasError = true;
                }

                if (!wali) {
                    waliSelect.classList.add('border-red-500');
                    hasError = true;
                }

                if (hasError) {
                    e.preventDefault();

                    // Scroll to first error
                    if (!mapel) {
                        mapelSelect.focus();
                    } else if (!wali) {
                        waliSelect.focus();
                    }

                    // Remove red border on change
                    mapelSelect.addEventListener('change', function () {
                        this.classList.remove('border-red-500');
                    });

                    waliSelect.addEventListener('change', function () {
                        this.classList.remove('border-red-500');
                    });

                    return false;
                }
            });

            // Responsive adjustments
            function adjustFormForMobile() {
                const formCard = document.querySelector('.max-w-4xl');
                const previewGrid = document.querySelector('.grid.grid-cols-1');
                const screenWidth = window.innerWidth;

                if (screenWidth < 640) {
                    formCard.classList.remove('mx-auto');
                    formCard.classList.add('mx-0');

                    // Adjust preview grid for mobile
                    if (previewGrid) {
                        previewGrid.classList.add('gap-3');
                        previewGrid.classList.remove('gap-4');
                    }
                } else {
                    formCard.classList.add('mx-auto');
                    formCard.classList.remove('mx-0');

                    // Restore preview grid for desktop
                    if (previewGrid) {
                        previewGrid.classList.remove('gap-3');
                        previewGrid.classList.add('gap-4');
                    }
                }
            }

            // Initial adjustment
            adjustFormForMobile();

            // Adjust on resize
            window.addEventListener('resize', adjustFormForMobile);

            // Auto-focus first select field on page load
            document.addEventListener('DOMContentLoaded', function () {
                if (!mapelSelect.value) {
                    mapelSelect.focus();
                }
            });
        </script>
    </div>
@endsection
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
                                        d="{{ isset($user) ? 'M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z' : 'M12 4v16m8-8H4' }}" />
                                </svg>
                            </div>
                            <div>
                                <h1 class="text-2xl font-bold text-gray-900">
                                    {{ isset($user) ? 'Edit Jadwal Ujian' : 'Tambah Jadwal Ujian' }}
                                </h1>
                                <p class="text-sm text-gray-600 mt-1">
                                    {{ isset($user) ? 'Perbarui informasi jadwal ujian' : 'Tambahkan jadwal ujian baru' }}
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
                                <a href="{{ route('datamapelkelas', $kelas) }}"
                                    class="ml-1 text-sm font-medium text-gray-700 hover:text-amber-600 md:ml-2">Mapel
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
                                <a href="{{ route('datajadwal', ['id' => $kelas, 'mapel' => $mapel]) }}"
                                    class="ml-1 text-sm font-medium text-gray-700 hover:text-amber-600 md:ml-2">Jadwal
                                    Ujian</a>
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

            <!-- Class Info Card -->
            <div class="bg-gradient-to-br from-blue-600 to-blue-700 rounded-2xl shadow-xl p-6 text-white mb-8">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-white/20 backdrop-blur-sm rounded-xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold">
                                @php
                                    $kelasData = \App\Models\Kelas::find($kelas);
                                    $mapelData = \App\Models\Mapel::find($mapel);
                                @endphp
                                {{ $kelasData ? $kelasData->namakelas : 'Kelas' }}
                            </h2>
                            <p class="text-blue-100 text-sm">
                                {{ $kelasData ? $kelasData->kodekelas : '' }} •
                                {{ $mapelData ? $mapelData->namamapel : 'Mata Pelajaran' }}
                            </p>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <span class="text-xs font-semibold bg-white/30 px-3 py-1 rounded-full">
                            {{ isset($user) ? 'Mode Edit' : 'Mode Tambah' }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200/50 max-w-4xl mx-auto">
                <!-- Form Header -->
                <div class="bg-gradient-to-r from-gray-900 to-gray-800 px-6 py-4">
                    <div class="flex items-center space-x-3">
                        <div class="p-2 bg-white/20 rounded-lg">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-white">Form Jadwal Ujian</h3>
                            <p class="text-sm text-gray-300">Isi data jadwal ujian dengan lengkap</p>
                        </div>
                    </div>
                </div>

                <!-- Form Content -->
                <div class="p-6">
                    <form action="{{ route('posjadwal', ['id' => $kelas, 'mapel' => $mapel]) }}" method="POST"
                        class="space-y-6">
                        @csrf
                        <input type="hidden" name="id" value="{{ isset($user) ? $user->id : '' }}">

                        <!-- Form Fields -->
                        <div class="space-y-6">
                            <!-- Jenis Ujian -->
                            <div>
                                <label for="jenis_ujian" class="block text-sm font-medium text-gray-700 mb-2">
                                    Jenis Ujian <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <input type="text" id="jenis_ujian" name="jenis_ujian" required
                                        value="{{ old('jenis_ujian', isset($user) ? $user->jenis_ujian : '') }}"
                                        class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all duration-300"
                                        placeholder="Contoh: UTS Semester 1, UAS Akhir Tahun, Quiz Harian"
                                        oninput="updatePreview()">
                                </div>
                                @error('jenis_ujian')
                                    <p class="mt-2 text-sm text-red-600 flex items-center space-x-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.874-.833-2.644 0L4.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                                        </svg>
                                        <span>{{ $message }}</span>
                                    </p>
                                @enderror
                                <p class="mt-1 text-xs text-gray-500">
                                    Tentukan jenis ujian yang akan dilaksanakan
                                </p>
                            </div>

                            <!-- Date and Time Row -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Tanggal Ujian -->
                                <div>
                                    <label for="tgl_ujian" class="block text-sm font-medium text-gray-700 mb-2">
                                        Tanggal Ujian <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <input type="date" id="tgl_ujian" name="tgl_ujian" required
                                            value="{{ old('tgl_ujian', isset($user) ? $user->tgl_ujian : '') }}"
                                            class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all duration-300"
                                            min="{{ now()->toDateString() }}" onchange="updatePreview()">
                                    </div>
                                    @error('tgl_ujian')
                                        <p class="mt-2 text-sm text-red-600 flex items-center space-x-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.874-.833-2.644 0L4.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                                            </svg>
                                            <span>{{ $message }}</span>
                                        </p>
                                    @enderror
                                </div>

                                <!-- Waktu Ujian -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Waktu Ujian <span class="text-red-500">*</span>
                                    </label>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <div class="relative">
                                                <div
                                                    class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                </div>
                                                <input type="number" id="jam" name="jam" required
                                                    value="{{ old('jam', isset($user) ? $user->jam : '08') }}"
                                                    class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all duration-300"
                                                    min="0" max="23" placeholder="Jam" oninput="updatePreview()">
                                            </div>
                                            <p class="mt-1 text-xs text-gray-500">Jam (0-23)</p>
                                        </div>
                                        <div>
                                            <div class="relative">
                                                <div
                                                    class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                </div>
                                                <input type="number" id="menit" name="menit" required
                                                    value="{{ old('menit', isset($user) ? $user->menit : '00') }}"
                                                    class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all duration-300"
                                                    min="0" max="59" placeholder="Menit" oninput="updatePreview()">
                                            </div>
                                            <p class="mt-1 text-xs text-gray-500">Menit (0-59)</p>
                                        </div>
                                    </div>
                                    @error('jam')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                    @error('menit')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
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
                                <span>Preview Jadwal Ujian</span>
                            </h4>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="bg-white p-3 rounded-lg">
                                    <p class="text-xs text-gray-500 mb-1">Jenis Ujian</p>
                                    <p class="text-sm font-medium text-gray-900" id="previewJenis">-</p>
                                </div>
                                <div class="bg-white p-3 rounded-lg">
                                    <p class="text-xs text-gray-500 mb-1">Tanggal</p>
                                    <p class="text-sm font-medium text-gray-900" id="previewTanggal">-</p>
                                </div>
                                <div class="bg-white p-3 rounded-lg">
                                    <p class="text-xs text-gray-500 mb-1">Waktu</p>
                                    <div class="flex items-center space-x-2">
                                        <div
                                            class="h-8 w-8 rounded-lg bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center">
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <span class="text-sm font-medium text-gray-900" id="previewWaktu">-</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3 pt-3 border-t border-amber-200">
                                <p class="text-xs text-amber-700 flex items-center space-x-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span id="previewStatus">-</span>
                                </p>
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
                                <a href="{{ route('datajadwal', ['id' => $kelas, 'mapel' => $mapel]) }}"
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
            const jenisUjianInput = document.getElementById('jenis_ujian');
            const tglUjianInput = document.getElementById('tgl_ujian');
            const jamInput = document.getElementById('jam');
            const menitInput = document.getElementById('menit');

            // Preview elements
            const previewJenis = document.getElementById('previewJenis');
            const previewTanggal = document.getElementById('previewTanggal');
            const previewWaktu = document.getElementById('previewWaktu');
            const previewStatus = document.getElementById('previewStatus');

            // Format date function
            function formatDate(dateString) {
                if (!dateString) return '-';
                const date = new Date(dateString);
                const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                return date.toLocaleDateString('id-ID', options);
            }

            // Get status based on date
            function getStatus(dateString) {
                if (!dateString) return '';

                const today = new Date();
                const examDate = new Date(dateString);

                // Reset time part for comparison
                today.setHours(0, 0, 0, 0);
                examDate.setHours(0, 0, 0, 0);

                const diffTime = examDate - today;
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

                if (diffDays === 0) {
                    return 'Ujian akan dilaksanakan hari ini';
                } else if (diffDays === 1) {
                    return 'Ujian akan dilaksanakan besok';
                } else if (diffDays > 1) {
                    return `Ujian ${diffDays} hari lagi`;
                } else if (diffDays === -1) {
                    return 'Ujian sudah berlalu kemarin';
                } else {
                    return `Ujian sudah berlalu ${Math.abs(diffDays)} hari yang lalu`;
                }
            }

            // Format time
            function formatTime(hours, minutes) {
                if (!hours && !minutes) return '-';
                const h = hours || '00';
                const m = minutes ? String(minutes).padStart(2, '0') : '00';
                return `${h}:${m}`;
            }

            // Update preview function
            function updatePreview() {
                // Update jenis ujian
                if (jenisUjianInput.value.trim()) {
                    previewJenis.textContent = jenisUjianInput.value;
                } else {
                    previewJenis.textContent = '-';
                }

                // Update tanggal
                if (tglUjianInput.value) {
                    previewTanggal.textContent = formatDate(tglUjianInput.value);
                    previewStatus.textContent = getStatus(tglUjianInput.value);
                } else {
                    previewTanggal.textContent = '-';
                    previewStatus.textContent = '-';
                }

                // Update waktu
                const waktu = formatTime(jamInput.value, menitInput.value);
                previewWaktu.textContent = waktu;
            }

            // Add event listeners
            jenisUjianInput.addEventListener('input', updatePreview);
            tglUjianInput.addEventListener('change', updatePreview);
            jamInput.addEventListener('input', updatePreview);
            menitInput.addEventListener('input', updatePreview);

            // Initial update
            updatePreview();

            // Time input validation
            jamInput.addEventListener('change', function () {
                let value = parseInt(this.value);
                if (isNaN(value) || value < 0) this.value = 0;
                if (value > 23) this.value = 23;
                updatePreview();
            });

            menitInput.addEventListener('change', function () {
                let value = parseInt(this.value);
                if (isNaN(value) || value < 0) this.value = 0;
                if (value > 59) this.value = 59;
                updatePreview();
            });

            // Set min date for date input (today)
            document.addEventListener('DOMContentLoaded', function () {
                const today = new Date().toISOString().split('T')[0];
                tglUjianInput.min = today;

                // Auto-focus first field if empty
                if (!jenisUjianInput.value) {
                    jenisUjianInput.focus();
                }
            });

            // Form validation
            document.querySelector('form').addEventListener('submit', function (e) {
                const jenis = jenisUjianInput.value.trim();
                const tanggal = tglUjianInput.value;
                const jamVal = jamInput.value;
                const menitVal = menitInput.value;

                let hasError = false;

                if (!jenis) {
                    jenisUjianInput.classList.add('border-red-500');
                    hasError = true;
                }

                if (!tanggal) {
                    tglUjianInput.classList.add('border-red-500');
                    hasError = true;
                }

                if (!jamVal || jamVal < 0 || jamVal > 23) {
                    jamInput.classList.add('border-red-500');
                    hasError = true;
                }

                if (!menitVal || menitVal < 0 || menitVal > 59) {
                    menitInput.classList.add('border-red-500');
                    hasError = true;
                }

                if (hasError) {
                    e.preventDefault();

                    // Scroll to first error
                    if (!jenis) {
                        jenisUjianInput.focus();
                    } else if (!tanggal) {
                        tglUjianInput.focus();
                    } else if (!jamVal || jamVal < 0 || jamVal > 23) {
                        jamInput.focus();
                    } else if (!menitVal || menitVal < 0 || menitVal > 59) {
                        menitInput.focus();
                    }

                    // Remove red border on input/change
                    jenisUjianInput.addEventListener('input', function () {
                        this.classList.remove('border-red-500');
                    });

                    tglUjianInput.addEventListener('change', function () {
                        this.classList.remove('border-red-500');
                    });

                    jamInput.addEventListener('input', function () {
                        this.classList.remove('border-red-500');
                    });

                    menitInput.addEventListener('input', function () {
                        this.classList.remove('border-red-500');
                    });

                    return false;
                }
            });

            // Responsive adjustments
            function adjustFormForMobile() {
                const formCard = document.querySelector('.max-w-4xl');
                const previewGrid = document.querySelector('.grid.grid-cols-1');
                const timeGrid = document.querySelector('.grid.grid-cols-2');
                const screenWidth = window.innerWidth;

                if (screenWidth < 640) {
                    formCard.classList.remove('mx-auto');
                    formCard.classList.add('mx-0');

                    // Adjust preview grid for mobile
                    if (previewGrid) {
                        previewGrid.classList.add('gap-3');
                        previewGrid.classList.remove('gap-4');
                    }

                    // Adjust time grid for mobile
                    if (timeGrid) {
                        timeGrid.classList.remove('gap-4');
                        timeGrid.classList.add('gap-2');
                    }

                    // Adjust form actions for mobile
                    document.querySelectorAll('.flex.space-x-3').forEach(actions => {
                        actions.classList.add('space-x-2');
                        actions.classList.remove('space-x-3');
                    });
                } else {
                    formCard.classList.add('mx-auto');
                    formCard.classList.remove('mx-0');

                    // Restore preview grid for desktop
                    if (previewGrid) {
                        previewGrid.classList.remove('gap-3');
                        previewGrid.classList.add('gap-4');
                    }

                    // Restore time grid for desktop
                    if (timeGrid) {
                        timeGrid.classList.remove('gap-2');
                        timeGrid.classList.add('gap-4');
                    }

                    // Restore form actions for desktop
                    document.querySelectorAll('.flex.space-x-3').forEach(actions => {
                        actions.classList.remove('space-x-2');
                        actions.classList.add('space-x-3');
                    });
                }
            }

            // Initial adjustment
            adjustFormForMobile();

            // Adjust on resize
            window.addEventListener('resize', adjustFormForMobile);

            // Add focus styles to form inputs
            document.querySelectorAll('input').forEach(input => {
                input.addEventListener('focus', function () {
                    this.parentElement.classList.add('ring-2', 'ring-amber-500', 'ring-opacity-50');
                });

                input.addEventListener('blur', function () {
                    this.parentElement.classList.remove('ring-2', 'ring-amber-500', 'ring-opacity-50');
                });
            });
        </script>
    </div>
@endsection
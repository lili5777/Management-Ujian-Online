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
                                        d="{{ isset($soal) ? 'M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z' : 'M12 4v16m8-8H4' }}" />
                                </svg>
                            </div>
                            <div>
                                <h1 class="text-2xl font-bold text-gray-900">
                                    {{ isset($soal) ? 'Edit Soal Ujian' : 'Tambah Soal Ujian' }}
                                </h1>
                                <p class="text-sm text-gray-600 mt-1">
                                    {{ isset($soal) ? 'Perbarui informasi soal ujian' : 'Tambahkan soal ujian baru' }}
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
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <a href="{{ route('datasoal', ['id' => $kelas, 'mapel' => $mapel, 'jadwal' => $jadwal]) }}"
                                    class="ml-1 text-sm font-medium text-gray-700 hover:text-amber-600 md:ml-2">Bank
                                    Soal</a>
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
                                    {{ isset($soal) ? 'Edit Data' : 'Tambah Data' }}
                                </span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>

            <!-- Exam Info Card -->
            @php
                $jadwalData = \App\Models\Jadwal::find($jadwal);
                $mapelData = \App\Models\Mapel::find($mapel);
                $kelasData = \App\Models\Kelas::find($kelas);
            @endphp
            <div class="bg-gradient-to-br from-purple-600 to-purple-700 rounded-2xl shadow-xl p-6 text-white mb-8">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                    <div class="mb-4 md:mb-0">
                        <div class="flex items-center space-x-3 mb-3">
                            <div class="p-3 bg-white/20 backdrop-blur-sm rounded-xl">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-xl font-bold">
                                    @if(isset($soal))
                                        Soal #{{ isset($soal) ? '' : 'Baru' }}
                                    @else
                                        Soal Baru
                                    @endif
                                </h2>
                                <p class="text-purple-100 text-sm">
                                    {{ $kelasData ? $kelasData->kodekelas : '' }} •
                                    {{ $mapelData ? $mapelData->namamapel : 'Mata Pelajaran' }} •
                                    {{ $jadwalData ? $jadwalData->jenis_ujian : 'Ujian' }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="text-center md:text-right">
                        <div class="text-3xl font-bold mb-1">
                            @if(isset($soal))
                                <span class="text-lg font-normal">Edit</span>
                            @else
                                <span class="text-lg font-normal">Tambah</span>
                            @endif
                        </div>
                        <div class="text-sm text-purple-200">Soal Ujian</div>
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
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-white">Form Soal Ujian</h3>
                            <p class="text-sm text-gray-300">Isi data soal ujian dengan lengkap</p>
                        </div>
                    </div>
                </div>

                <!-- Form Content -->
                <div class="p-6">
                    <form action="{{ route('possoal', ['id' => $kelas, 'mapel' => $mapel, 'jadwal' => $jadwal]) }}"
                        method="POST" class="space-y-6">
                        @csrf
                        <input type="hidden" name="id" value="{{ isset($soal) ? $soal->id : '' }}">

                        <!-- Form Fields -->
                        <div class="space-y-6">
                            <!-- Pertanyaan -->
                            <div>
                                <label for="pertanyaan" class="block text-sm font-medium text-gray-700 mb-2">
                                    Pertanyaan <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <textarea id="pertanyaan" name="pertanyaan" required rows="4"
                                        class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all duration-300"
                                        placeholder="Masukkan pertanyaan soal ujian..."
                                        oninput="updatePreview()">{{ old('pertanyaan', isset($soal) ? $soal->pertanyaan : '') }}</textarea>
                                </div>
                                @error('pertanyaan')
                                    <p class="mt-2 text-sm text-red-600 flex items-center space-x-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.874-.833-2.644 0L4.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                                        </svg>
                                        <span>{{ $message }}</span>
                                    </p>
                                @enderror
                                <p class="mt-1 text-xs text-gray-500">
                                    Tulis pertanyaan soal dengan jelas dan lengkap
                                </p>
                            </div>

                            <!-- Pilihan Jawaban -->
                            <div class="space-y-4">
                                <h4 class="text-sm font-medium text-gray-700">Pilihan Jawaban <span
                                        class="text-red-500">*</span></h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <!-- Pilihan A -->
                                    <div>
                                        <label for="a" class="block text-sm font-medium text-gray-700 mb-2">
                                            Pilihan A
                                        </label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <div
                                                    class="h-6 w-6 rounded-full bg-gradient-to-br from-red-500 to-red-600 flex items-center justify-center">
                                                    <span class="text-white text-xs font-bold">A</span>
                                                </div>
                                            </div>
                                            <input type="text" id="a" name="a" required
                                                value="{{ old('a', isset($soal) ? $soal->a : '') }}"
                                                class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all duration-300"
                                                placeholder="Masukkan pilihan A" oninput="updatePreview()">
                                        </div>
                                        @error('a')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Pilihan B -->
                                    <div>
                                        <label for="b" class="block text-sm font-medium text-gray-700 mb-2">
                                            Pilihan B
                                        </label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <div
                                                    class="h-6 w-6 rounded-full bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center">
                                                    <span class="text-white text-xs font-bold">B</span>
                                                </div>
                                            </div>
                                            <input type="text" id="b" name="b" required
                                                value="{{ old('b', isset($soal) ? $soal->b : '') }}"
                                                class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all duration-300"
                                                placeholder="Masukkan pilihan B" oninput="updatePreview()">
                                        </div>
                                        @error('b')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Pilihan C -->
                                    <div>
                                        <label for="c" class="block text-sm font-medium text-gray-700 mb-2">
                                            Pilihan C
                                        </label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <div
                                                    class="h-6 w-6 rounded-full bg-gradient-to-br from-green-500 to-green-600 flex items-center justify-center">
                                                    <span class="text-white text-xs font-bold">C</span>
                                                </div>
                                            </div>
                                            <input type="text" id="c" name="c" required
                                                value="{{ old('c', isset($soal) ? $soal->c : '') }}"
                                                class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all duration-300"
                                                placeholder="Masukkan pilihan C" oninput="updatePreview()">
                                        </div>
                                        @error('c')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Pilihan D -->
                                    <div>
                                        <label for="d" class="block text-sm font-medium text-gray-700 mb-2">
                                            Pilihan D
                                        </label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <div
                                                    class="h-6 w-6 rounded-full bg-gradient-to-br from-purple-500 to-purple-600 flex items-center justify-center">
                                                    <span class="text-white text-xs font-bold">D</span>
                                                </div>
                                            </div>
                                            <input type="text" id="d" name="d" required
                                                value="{{ old('d', isset($soal) ? $soal->d : '') }}"
                                                class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all duration-300"
                                                placeholder="Masukkan pilihan D" oninput="updatePreview()">
                                        </div>
                                        @error('d')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Kunci Jawaban -->
                            <div>
                                <label for="kunci" class="block text-sm font-medium text-gray-700 mb-2">
                                    Kunci Jawaban <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <select id="kunci" name="kunci" required
                                        class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all duration-300 appearance-none"
                                        onchange="updatePreview()">
                                        <option value="">Pilih Jawaban yang Benar</option>
                                        <option value="A" {{ old('kunci', isset($soal) ? $soal->kunci : '') == 'A' ? 'selected' : '' }}>A</option>
                                        <option value="B" {{ old('kunci', isset($soal) ? $soal->kunci : '') == 'B' ? 'selected' : '' }}>B</option>
                                        <option value="C" {{ old('kunci', isset($soal) ? $soal->kunci : '') == 'C' ? 'selected' : '' }}>C</option>
                                        <option value="D" {{ old('kunci', isset($soal) ? $soal->kunci : '') == 'D' ? 'selected' : '' }}>D</option>
                                    </select>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                </div>
                                @error('kunci')
                                    <p class="mt-2 text-sm text-red-600 flex items-center space-x-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.874-.833-2.644 0L4.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                                        </svg>
                                        <span>{{ $message }}</span>
                                    </p>
                                @enderror
                                <p class="mt-1 text-xs text-gray-500">
                                    Pilih jawaban yang benar untuk soal ini
                                </p>
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
                                <span>Preview Soal</span>
                            </h4>
                            <div class="space-y-4">
                                <div class="bg-white p-3 rounded-lg">
                                    <p class="text-xs text-gray-500 mb-1">Pertanyaan</p>
                                    <p class="text-sm font-medium text-gray-900" id="previewPertanyaan">-</p>
                                </div>
                                <div class="grid grid-cols-2 gap-3">
                                    <div class="bg-white p-3 rounded-lg">
                                        <p class="text-xs text-gray-500 mb-1">Pilihan A</p>
                                        <p class="text-sm font-medium text-gray-900" id="previewA">-</p>
                                    </div>
                                    <div class="bg-white p-3 rounded-lg">
                                        <p class="text-xs text-gray-500 mb-1">Pilihan B</p>
                                        <p class="text-sm font-medium text-gray-900" id="previewB">-</p>
                                    </div>
                                    <div class="bg-white p-3 rounded-lg">
                                        <p class="text-xs text-gray-500 mb-1">Pilihan C</p>
                                        <p class="text-sm font-medium text-gray-900" id="previewC">-</p>
                                    </div>
                                    <div class="bg-white p-3 rounded-lg">
                                        <p class="text-xs text-gray-500 mb-1">Pilihan D</p>
                                        <p class="text-sm font-medium text-gray-900" id="previewD">-</p>
                                    </div>
                                </div>
                                <div class="bg-white p-3 rounded-lg">
                                    <p class="text-xs text-gray-500 mb-1">Kunci Jawaban</p>
                                    <div class="flex items-center space-x-2">
                                        <div class="h-8 w-8 rounded-lg bg-gradient-to-br from-amber-500 to-amber-600 flex items-center justify-center"
                                            id="kunciIcon">
                                            <span class="text-white text-sm font-bold">-</span>
                                        </div>
                                        <span class="text-sm font-medium text-gray-900" id="previewKunci">Belum
                                            dipilih</span>
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
                                <a href="{{ route('datasoal', ['id' => $kelas, 'mapel' => $mapel, 'jadwal' => $jadwal]) }}"
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
                                            d="{{ isset($soal) ? 'M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4' : 'M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4' }}" />
                                    </svg>
                                    <span>{{ isset($soal) ? 'Perbarui Soal' : 'Simpan Soal' }}</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            // Form elements
            const pertanyaanInput = document.getElementById('pertanyaan');
            const aInput = document.getElementById('a');
            const bInput = document.getElementById('b');
            const cInput = document.getElementById('c');
            const dInput = document.getElementById('d');
            const kunciSelect = document.getElementById('kunci');

            // Preview elements
            const previewPertanyaan = document.getElementById('previewPertanyaan');
            const previewA = document.getElementById('previewA');
            const previewB = document.getElementById('previewB');
            const previewC = document.getElementById('previewC');
            const previewD = document.getElementById('previewD');
            const previewKunci = document.getElementById('previewKunci');
            const kunciIcon = document.getElementById('kunciIcon');

            // Kunci colors
            const kunciColors = {
                'A': 'from-red-500 to-red-600',
                'B': 'from-blue-500 to-blue-600',
                'C': 'from-green-500 to-green-600',
                'D': 'from-purple-500 to-purple-600'
            };

            // Kunci text colors
            const kunciTextColors = {
                'A': 'text-red-700',
                'B': 'text-blue-700',
                'C': 'text-green-700',
                'D': 'text-purple-700'
            };

            // Update preview function
            function updatePreview() {
                // Update pertanyaan
                if (pertanyaanInput.value.trim()) {
                    previewPertanyaan.textContent = pertanyaanInput.value.length > 100
                        ? pertanyaanInput.value.substring(0, 100) + '...'
                        : pertanyaanInput.value;
                } else {
                    previewPertanyaan.textContent = '-';
                }

                // Update pilihan
                previewA.textContent = aInput.value || '-';
                previewB.textContent = bInput.value || '-';
                previewC.textContent = cInput.value || '-';
                previewD.textContent = dInput.value || '-';

                // Update kunci
                const selectedKunci = kunciSelect.value;
                if (selectedKunci) {
                    const kunciColor = kunciColors[selectedKunci] || 'from-gray-500 to-gray-600';
                    const kunciTextColor = kunciTextColors[selectedKunci] || 'text-gray-700';

                    kunciIcon.className = `h-8 w-8 rounded-lg bg-gradient-to-br ${kunciColor} flex items-center justify-center`;
                    kunciIcon.innerHTML = `<span class="text-white text-sm font-bold">${selectedKunci}</span>`;

                    let kunciText = '';
                    switch (selectedKunci) {
                        case 'A': kunciText = aInput.value; break;
                        case 'B': kunciText = bInput.value; break;
                        case 'C': kunciText = cInput.value; break;
                        case 'D': kunciText = dInput.value; break;
                    }

                    previewKunci.innerHTML = `<span class="${kunciTextColor} font-semibold">${selectedKunci}</span>: ${kunciText || 'Belum diisi'}`;
                } else {
                    kunciIcon.className = 'h-8 w-8 rounded-lg bg-gradient-to-br from-gray-500 to-gray-600 flex items-center justify-center';
                    kunciIcon.innerHTML = '<span class="text-white text-sm font-bold">-</span>';
                    previewKunci.textContent = 'Belum dipilih';
                }
            }

            // Add event listeners
            pertanyaanInput.addEventListener('input', updatePreview);
            aInput.addEventListener('input', updatePreview);
            bInput.addEventListener('input', updatePreview);
            cInput.addEventListener('input', updatePreview);
            dInput.addEventListener('input', updatePreview);
            kunciSelect.addEventListener('change', updatePreview);

            // Initial update
            updatePreview();

            // Form validation
            document.querySelector('form').addEventListener('submit', function (e) {
                const pertanyaan = pertanyaanInput.value.trim();
                const a = aInput.value.trim();
                const b = bInput.value.trim();
                const c = cInput.value.trim();
                const d = dInput.value.trim();
                const kunci = kunciSelect.value;

                let hasError = false;

                if (!pertanyaan) {
                    pertanyaanInput.classList.add('border-red-500');
                    hasError = true;
                }

                if (!a) {
                    aInput.classList.add('border-red-500');
                    hasError = true;
                }

                if (!b) {
                    bInput.classList.add('border-red-500');
                    hasError = true;
                }

                if (!c) {
                    cInput.classList.add('border-red-500');
                    hasError = true;
                }

                if (!d) {
                    dInput.classList.add('border-red-500');
                    hasError = true;
                }

                if (!kunci) {
                    kunciSelect.classList.add('border-red-500');
                    hasError = true;
                }

                if (hasError) {
                    e.preventDefault();

                    // Scroll to first error
                    if (!pertanyaan) {
                        pertanyaanInput.focus();
                    } else if (!a) {
                        aInput.focus();
                    } else if (!b) {
                        bInput.focus();
                    } else if (!c) {
                        cInput.focus();
                    } else if (!d) {
                        dInput.focus();
                    } else if (!kunci) {
                        kunciSelect.focus();
                    }

                    // Remove red border on input/change
                    pertanyaanInput.addEventListener('input', function () {
                        this.classList.remove('border-red-500');
                    });

                    aInput.addEventListener('input', function () {
                        this.classList.remove('border-red-500');
                    });

                    bInput.addEventListener('input', function () {
                        this.classList.remove('border-red-500');
                    });

                    cInput.addEventListener('input', function () {
                        this.classList.remove('border-red-500');
                    });

                    dInput.addEventListener('input', function () {
                        this.classList.remove('border-red-500');
                    });

                    kunciSelect.addEventListener('change', function () {
                        this.classList.remove('border-red-500');
                    });

                    return false;
                }
            });

            // Responsive adjustments
            function adjustFormForMobile() {
                const formCard = document.querySelector('.max-w-4xl');
                const previewGrid = document.querySelector('.grid.grid-cols-2');
                const screenWidth = window.innerWidth;

                if (screenWidth < 640) {
                    formCard.classList.remove('mx-auto');
                    formCard.classList.add('mx-0');

                    // Adjust preview grid for mobile
                    if (previewGrid) {
                        previewGrid.classList.remove('grid-cols-2');
                        previewGrid.classList.add('grid-cols-1');
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
                        previewGrid.classList.remove('grid-cols-1');
                        previewGrid.classList.add('grid-cols-2');
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
            document.querySelectorAll('input, textarea, select').forEach(input => {
                input.addEventListener('focus', function () {
                    this.parentElement.classList.add('ring-2', 'ring-amber-500', 'ring-opacity-50');
                });

                input.addEventListener('blur', function () {
                    this.parentElement.classList.remove('ring-2', 'ring-amber-500', 'ring-opacity-50');
                });
            });

            // Auto-focus first field if empty
            document.addEventListener('DOMContentLoaded', function () {
                if (!pertanyaanInput.value) {
                    pertanyaanInput.focus();
                }
            });
        </script>
    </div>
@endsection
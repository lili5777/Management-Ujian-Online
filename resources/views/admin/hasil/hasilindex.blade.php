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
                                <h1 class="text-2xl font-bold text-gray-900">Hasil Ujian Kelas {{ $head->kodekelas ?? '' }}
                                </h1>
                                <p class="text-sm text-gray-600 mt-1">Kelola hasil ujian untuk kelas
                                    {{ $head->namakelas ?? 'Kelas' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- User Info & Actions -->
                    <div class="flex items-center space-x-4">
                        <!-- Back Button -->
                        <a href="{{ route('datajadwal', ['id' => $kelas, 'mapel' => $mapel]) }}"
                            class="group bg-gradient-to-r from-gray-700 to-gray-800 hover:from-amber-600 hover:to-amber-700 text-white px-5 py-2.5 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all duration-300 flex items-center space-x-2 transform hover:-translate-y-0.5">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            <span>Kembali ke Jadwal</span>
                        </a>

                        <!-- User Profile -->
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
        </div>

        <!-- Dashboard Content -->
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
                                <span class="ml-1 text-sm font-medium text-amber-600 md:ml-2">Hasil Ujian</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>

            <!-- Exam Info Card -->
            @php
                $jadwalData = \App\Models\Jadwal::find($jadwal);
                $mapelData = \App\Models\Mapel::find($mapel);
                $totalSiswa = 0;
                $rataRata = 0;
                $nilaiTertinggi = 0;
                $nilaiTerendah = 100;

                if (Auth::user()->level == 'admin' || Auth::user()->level == 'guru') {
                    $totalSiswa = $data->count();
                    $rataRata = $totalSiswa > 0 ? $data->avg('skor') : 0;
                    $nilaiTertinggi = $totalSiswa > 0 ? $data->max('skor') : 0;
                    $nilaiTerendah = $totalSiswa > 0 ? $data->min('skor') : 0;
                } else {
                    if ($data && $data->id_user) {
                        $totalSiswa = 1;
                        $rataRata = $data->skor;
                        $nilaiTertinggi = $data->skor;
                        $nilaiTerendah = $data->skor;
                    }
                }
            @endphp
            <div class="bg-gradient-to-br from-blue-600 to-blue-700 rounded-2xl shadow-xl p-6 text-white mb-8">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                    <div class="mb-4 md:mb-0">
                        <div class="flex items-center space-x-3 mb-3">
                            <div class="p-3 bg-white/20 backdrop-blur-sm rounded-xl">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-xl font-bold">{{ $mapelData ? $mapelData->namamapel : 'Mata Pelajaran' }}
                                </h2>
                                <p class="text-blue-100 text-sm">
                                    {{ $head->kodekelas ?? '' }} •
                                    {{ $jadwalData ? $jadwalData->jenis_ujian : 'Ujian' }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="text-center md:text-right">
                        <div class="text-3xl font-bold mb-1">{{ $totalSiswa }}</div>
                        <div class="text-sm text-blue-200">
                            @if (Auth::user()->level == 'admin' || Auth::user()->level == 'guru')
                                Total Peserta
                            @else
                                Hasil Anda
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
                <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Nilai Rata-rata</p>
                            <p class="text-2xl font-bold text-gray-900">{{ number_format($rataRata, 1) }}</p>
                        </div>
                        <div class="p-2 bg-blue-50 rounded-lg">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Nilai Tertinggi</p>
                            <p class="text-2xl font-bold text-gray-900">{{ number_format($nilaiTertinggi, 1) }}</p>
                        </div>
                        <div class="p-2 bg-green-50 rounded-lg">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 10l7-7m0 0l7 7m-7-7v18" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Nilai Terendah</p>
                            <p class="text-2xl font-bold text-gray-900">{{ number_format($nilaiTerendah, 1) }}</p>
                        </div>
                        <div class="p-2 bg-red-50 rounded-lg">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                            </svg>
                        </div>
                    </div>
                </div>
                @php
                    if (Auth::user()->level == 'admin' || Auth::user()->level == 'guru') {
                        $lulus = $data->where('skor', '>=', 75)->count();
                        $tidakLulus = $totalSiswa - $lulus;
                        $persentaseLulus = $totalSiswa > 0 ? round(($lulus / $totalSiswa) * 100, 1) : 0;
                    } else {
                        $lulus = $data && $data->skor >= 75 ? 1 : 0;
                        $tidakLulus = 1 - $lulus;
                        $persentaseLulus = $lulus * 100;
                    }
                @endphp
                <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Kelulusan</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $persentaseLulus }}%</p>
                        </div>
                        <div class="p-2 bg-amber-50 rounded-lg">
                            <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                    <div class="mt-2 text-xs text-gray-500">
                        {{ $lulus }} lulus • {{ $tidakLulus }} tidak lulus
                    </div>
                </div>
            </div>

            <!-- Main Content Card -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200/50">
                <!-- Table Header -->
                <div class="bg-gradient-to-r from-gray-900 to-gray-800 px-6 py-4">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <div>
                            <h3 class="text-lg font-bold text-white">Daftar Hasil Ujian</h3>
                            <p class="text-sm text-gray-300">
                                @if (Auth::user()->level == 'admin' || Auth::user()->level == 'guru')
                                    Total {{ $totalSiswa }} peserta ujian
                                @else
                                    Hasil ujian Anda
                                @endif
                            </p>
                        </div>
                        <div class="relative">
                            <input type="text" placeholder="Cari nama siswa..." id="searchInput"
                                class="pl-10 pr-4 py-2 bg-white/10 border border-white/20 rounded-lg text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                            <svg class="absolute left-3 top-2.5 w-5 h-5 text-gray-300" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Table Container -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    NO
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    NAMA SISWA
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    JAWABAN BENAR
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    JAWABAN SALAH
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    KOSONG
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    NILAI
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    STATUS
                                </th>
                                @if (Auth::user()->level == 'admin' || Auth::user()->level == 'guru')
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                        AKSI
                                    </th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200" id="hasilTable">
                            @if (Auth::user()->level == 'admin' || Auth::user()->level == 'guru')
                                @forelse ($data as $index => $d)
                                    @php
                                        $userData = $user->where('id', $d->id_user)->first();
                                        $status = $d->skor >= 75 ? 'Lulus' : 'Tidak Lulus';
                                        $statusClass = $d->skor >= 75
                                            ? 'bg-green-100 text-green-800'
                                            : 'bg-red-100 text-red-800';
                                        $nilaiClass = $d->skor >= 75
                                            ? 'bg-gradient-to-br from-green-500 to-green-600'
                                            : ($d->skor >= 50
                                                ? 'bg-gradient-to-br from-amber-500 to-amber-600'
                                                : 'bg-gradient-to-br from-red-500 to-red-600');
                                    @endphp
                                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">{{ $index + 1 }}</div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center space-x-3">
                                                <div class="flex-shrink-0">
                                                    <div
                                                        class="h-10 w-10 rounded-full bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center">
                                                        <span class="text-white font-bold">
                                                            {{ strtoupper(substr($userData->name ?? '?', 0, 1)) }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $userData->name ?? 'User Tidak Ditemukan' }}
                                                    </div>
                                                    <div class="text-xs text-gray-500">{{ $userData->email ?? '' }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center space-x-2">
                                                <div class="p-2 bg-green-50 rounded-lg">
                                                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <div class="text-sm font-medium text-gray-900">{{ $d->jawaban_benar }}</div>
                                                    <div class="text-xs text-gray-500">soal</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center space-x-2">
                                                <div class="p-2 bg-red-50 rounded-lg">
                                                    <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <div class="text-sm font-medium text-gray-900">{{ $d->jawaban_salah }}</div>
                                                    <div class="text-xs text-gray-500">soal</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center space-x-2">
                                                <div class="p-2 bg-gray-50 rounded-lg">
                                                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <div class="text-sm font-medium text-gray-900">{{ $d->jawaban_kosong }}</div>
                                                    <div class="text-xs text-gray-500">soal</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            <div class="inline-flex items-center">
                                                <div
                                                    class="h-12 w-12 rounded-lg {{ $nilaiClass }} flex items-center justify-center">
                                                    <span class="text-white font-bold text-lg">{{ $d->skor }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $statusClass }}">
                                                @if($d->skor >= 75)
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M5 13l4 4L19 7" />
                                                    </svg>
                                                @else
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                @endif
                                                {{ $status }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            <button type="button" onclick="detailHasil({{ $d->id }})"
                                                class="inline-flex items-center justify-center px-4 py-2 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-amber-600 hover:to-amber-700 text-white text-sm font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5 min-w-[120px]">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                                <span>Detail</span>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="{{ Auth::user()->level == 'admin' || Auth::user()->level == 'guru' ? '8' : '7' }}"
                                            class="px-6 py-12 text-center">
                                            <div class="text-gray-400">
                                                <svg class="mx-auto h-12 w-12" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                                </svg>
                                                <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada hasil ujian</h3>
                                                <p class="mt-1 text-sm text-gray-500">Siswa belum mengerjakan ujian ini.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            @elseif (Auth::user()->level == 'siswa')
                                @if ($data && $data->id_user)
                                    @php
                                        $userData = $user->where('id', $data->id_user)->first();
                                        $status = $data->skor >= 75 ? 'Lulus' : 'Tidak Lulus';
                                        $statusClass = $data->skor >= 75
                                            ? 'bg-green-100 text-green-800'
                                            : 'bg-red-100 text-red-800';
                                        $nilaiClass = $data->skor >= 75
                                            ? 'bg-gradient-to-br from-green-500 to-green-600'
                                            : ($data->skor >= 50
                                                ? 'bg-gradient-to-br from-amber-500 to-amber-600'
                                                : 'bg-gradient-to-br from-red-500 to-red-600');
                                    @endphp
                                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">1</div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center space-x-3">
                                                <div class="flex-shrink-0">
                                                    <div
                                                        class="h-10 w-10 rounded-full bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center">
                                                        <span class="text-white font-bold">
                                                            {{ strtoupper(substr($userData->name ?? '?', 0, 1)) }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $userData->name ?? 'User Tidak Ditemukan' }}
                                                    </div>
                                                    <div class="text-xs text-gray-500">{{ $userData->email ?? '' }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center space-x-2">
                                                <div class="p-2 bg-green-50 rounded-lg">
                                                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <div class="text-sm font-medium text-gray-900">{{ $data->jawaban_benar }}</div>
                                                    <div class="text-xs text-gray-500">soal</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center space-x-2">
                                                <div class="p-2 bg-red-50 rounded-lg">
                                                    <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <div class="text-sm font-medium text-gray-900">{{ $data->jawaban_salah }}</div>
                                                    <div class="text-xs text-gray-500">soal</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center space-x-2">
                                                <div class="p-2 bg-gray-50 rounded-lg">
                                                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <div class="text-sm font-medium text-gray-900">{{ $data->jawaban_kosong }}</div>
                                                    <div class="text-xs text-gray-500">soal</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            <div class="inline-flex items-center">
                                                <div
                                                    class="h-12 w-12 rounded-lg {{ $nilaiClass }} flex items-center justify-center">
                                                    <span class="text-white font-bold text-lg">{{ $data->skor }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $statusClass }}">
                                                @if($data->skor >= 75)
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M5 13l4 4L19 7" />
                                                    </svg>
                                                @else
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                @endif
                                                {{ $status }}
                                            </span>
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td colspan="7" class="px-6 py-12 text-center">
                                            <div class="text-gray-400">
                                                <svg class="mx-auto h-12 w-12" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                                </svg>
                                                <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada hasil ujian</h3>
                                                <p class="mt-1 text-sm text-gray-500">Anda belum mengerjakan ujian ini.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endif
                        </tbody>
                    </table>
                </div>

                <!-- Table Footer -->
                @if($totalSiswa > 0)
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                            <div class="text-sm text-gray-700">
                                @if (Auth::user()->level == 'admin' || Auth::user()->level == 'guru')
                                    Menampilkan <span class="font-semibold">{{ $totalSiswa }}</span> hasil ujian
                                @else
                                    Hasil ujian Anda
                                @endif
                            </div>
                            <div class="text-sm text-gray-500">
                                Batas kelulusan: <span class="font-semibold">75</span>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Detail Modal -->
        <div id="detailModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 p-4">
            <div class="bg-white rounded-2xl shadow-xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
                <div class="bg-gradient-to-r from-gray-900 to-gray-800 px-6 py-4 sticky top-0">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="p-2 bg-white/20 rounded-lg">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-white">Detail Hasil Ujian</h3>
                                <p class="text-sm text-gray-300">Informasi lengkap hasil ujian</p>
                            </div>
                        </div>
                        <button onclick="closeDetailModal()" class="text-white hover:text-gray-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="p-6" id="detailContent">
                    <!-- Detail content will be injected here -->
                </div>
            </div>
        </div>

        <script>
            // Search functionality
            document.getElementById('searchInput').addEventListener('input', function (e) {
                const searchTerm = e.target.value.toLowerCase();
                const rows = document.querySelectorAll('#hasilTable tr');

                rows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    row.style.display = text.includes(searchTerm) ? '' : 'none';
                });
            });

            // Detail hasil function
            function detailHasil(id) {
                // In a real application, you would fetch this data from your server
                // For now, we'll show a sample detail
                const detailContent = document.getElementById('detailContent');

                const html = `
                        <div class="space-y-6">
                            <div class="bg-gradient-to-br from-amber-50 to-amber-100 border border-amber-200 rounded-xl p-4">
                                <h4 class="text-sm font-medium text-amber-800 mb-2">Informasi Hasil Ujian</h4>
                                <p class="text-gray-800">Detail lengkap hasil ujian siswa.</p>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div class="bg-white border border-gray-200 rounded-xl p-4">
                                    <p class="text-xs text-gray-500 mb-1">Total Soal</p>
                                    <p class="text-lg font-bold text-gray-900" id="detailTotalSoal">-</p>
                                </div>
                                <div class="bg-white border border-gray-200 rounded-xl p-4">
                                    <p class="text-xs text-gray-500 mb-1">Waktu Pengerjaan</p>
                                    <p class="text-lg font-bold text-gray-900" id="detailWaktu">-</p>
                                </div>
                            </div>

                            <div class="bg-gradient-to-br from-blue-50 to-blue-100 border border-blue-200 rounded-xl p-4">
                                <h4 class="text-sm font-medium text-blue-800 mb-3">Analisis Hasil</h4>
                                <div class="space-y-2">
                                    <div class="flex justify-between items-center">
                                        <span class="text-sm text-gray-700">Jawaban Benar:</span>
                                        <span class="text-sm font-bold text-green-600" id="detailBenar">-</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-sm text-gray-700">Jawaban Salah:</span>
                                        <span class="text-sm font-bold text-red-600" id="detailSalah">-</span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-sm text-gray-700">Jawaban Kosong:</span>
                                        <span class="text-sm font-bold text-gray-600" id="detailKosong">-</span>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-gradient-to-br from-green-50 to-green-100 border border-green-200 rounded-xl p-4">
                                <h4 class="text-sm font-medium text-green-800 mb-2">Nilai Akhir</h4>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-2xl font-bold text-gray-900" id="detailNilai">-</p>
                                        <p class="text-xs text-gray-500" id="detailStatus">-</p>
                                    </div>
                                    <div class="h-16 w-16 rounded-full bg-gradient-to-br from-green-500 to-green-600 flex items-center justify-center">
                                        <span class="text-white text-xl font-bold" id="detailNilaiIcon">-</span>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <p class="text-sm text-gray-500">Detail lebih lengkap dapat dilihat di laporan ujian.</p>
                            </div>
                        </div>
                    `;

                detailContent.innerHTML = html;

                const modal = document.getElementById('detailModal');
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            }

            function closeDetailModal() {
                const modal = document.getElementById('detailModal');
                modal.classList.remove('flex');
                modal.classList.add('hidden');
            }

            // Close modal on outside click
            document.getElementById('detailModal').addEventListener('click', function (e) {
                if (e.target === this) {
                    closeDetailModal();
                }
            });

            // Close modal on escape key
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') {
                    closeDetailModal();
                }
            });

            // Add hover effects to table rows
            document.querySelectorAll('#hasilTable tr').forEach(row => {
                row.addEventListener('mouseenter', function () {
                    this.style.backgroundColor = '#f9fafb';
                });

                row.addEventListener('mouseleave', function () {
                    this.style.backgroundColor = '';
                });
            });

            // Responsive table adjustments
            function adjustTableForMobile() {
                const table = document.querySelector('table');
                const screenWidth = window.innerWidth;

                if (screenWidth < 768) {
                    table.classList.add('text-xs');
                    // Adjust action buttons
                    document.querySelectorAll('.inline-flex.min-w-\\[120px\\]').forEach(btn => {
                        btn.classList.add('px-2', 'py-1');
                        btn.classList.remove('px-4', 'py-2');
                        btn.querySelector('span').classList.add('hidden');
                        btn.querySelector('svg').classList.remove('mr-2');
                    });
                    // Adjust action buttons
                    document.querySelectorAll('.flex.space-x-3').forEach(actions => {
                        actions.classList.add('space-x-1');
                        actions.classList.remove('space-x-3');
                    });
                    // Hide some columns on very small screens
                    if (screenWidth < 640) {
                        document.querySelectorAll('td:nth-child(4), th:nth-child(4), td:nth-child(5), th:nth-child(5)').forEach(el => {
                            el.style.display = 'none';
                        });
                    }
                } else {
                    table.classList.remove('text-xs');
                    // Restore button sizes
                    document.querySelectorAll('.inline-flex.min-w-\\[120px\\]').forEach(btn => {
                        btn.classList.remove('px-2', 'py-1');
                        btn.classList.add('px-4', 'py-2');
                        btn.querySelector('span').classList.remove('hidden');
                        btn.querySelector('svg').classList.add('mr-2');
                    });
                    // Restore action buttons
                    document.querySelectorAll('.flex.space-x-3').forEach(actions => {
                        actions.classList.remove('space-x-1');
                        actions.classList.add('space-x-3');
                    });
                    // Show all columns
                    document.querySelectorAll('td, th').forEach(el => {
                        el.style.display = '';
                    });
                }
            }

            // Initial adjustment
            adjustTableForMobile();

            // Adjust on resize
            window.addEventListener('resize', adjustTableForMobile);

            // Highlight nilai based on score
            document.addEventListener('DOMContentLoaded', function () {
                document.querySelectorAll('#hasilTable tr').forEach(row => {
                    const nilaiCell = row.querySelector('td:nth-child(6) .text-white');
                    if (nilaiCell) {
                        const nilai = parseFloat(nilaiCell.textContent);
                        const nilaiDiv = row.querySelector('td:nth-child(6) .h-12.w-12');

                        if (nilai >= 75) {
                            if (nilaiDiv) {
                                nilaiDiv.classList.remove('from-amber-500', 'to-amber-600', 'from-red-500', 'to-red-600');
                                nilaiDiv.classList.add('from-green-500', 'to-green-600');
                            }
                        } else if (nilai >= 50) {
                            if (nilaiDiv) {
                                nilaiDiv.classList.remove('from-green-500', 'to-green-600', 'from-red-500', 'to-red-600');
                                nilaiDiv.classList.add('from-amber-500', 'to-amber-600');
                            }
                        } else {
                            if (nilaiDiv) {
                                nilaiDiv.classList.remove('from-green-500', 'to-green-600', 'from-amber-500', 'to-amber-600');
                                nilaiDiv.classList.add('from-red-500', 'to-red-600');
                            }
                        }
                    }
                });
            });
        </script>
    </div>
@endsection
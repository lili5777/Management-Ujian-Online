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
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h1 class="text-2xl font-bold text-gray-900">Data Jadwal Ujian Kelas {{ $head->kodekelas }}
                                </h1>
                                <p class="text-sm text-gray-600 mt-1">Kelola jadwal ujian untuk kelas {{ $head->namakelas }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- User Info & Actions -->
                    <div class="flex items-center space-x-4">
                        @if (Auth::user()->level == 'admin' || Auth::user()->level == 'guru')
                            <!-- Add Button -->
                            <a href="{{ route('tambahjadwal', ['id' => $kelas, 'mapel' => $mapel]) }}"
                                class="group bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-600 hover:to-amber-700 text-white px-5 py-2.5 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all duration-300 flex items-center space-x-2 transform hover:-translate-y-0.5">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                <span>Tambah Jadwal</span>
                            </a>
                        @endif

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
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="ml-1 text-sm font-medium text-amber-600 md:ml-2">Jadwal Ujian</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>

            <!-- Class Info Card -->
            <div class="bg-gradient-to-br from-blue-600 to-blue-700 rounded-2xl shadow-xl p-6 text-white mb-8">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                    <div class="mb-4 md:mb-0">
                        <div class="flex items-center space-x-3 mb-3">
                            <div class="p-3 bg-white/20 backdrop-blur-sm rounded-xl">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-xl font-bold">{{ $head->namakelas }}</h2>
                                <p class="text-blue-100 text-sm">{{ $head->kodekelas }} •
                                    @php
                                        $mapelData = \App\Models\Mapel::find($mapel);
                                        echo $mapelData ? $mapelData->namamapel : 'Mata Pelajaran';
                                    @endphp
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="text-center md:text-right">
                        <div class="text-3xl font-bold mb-1">{{ $data->count() }}</div>
                        <div class="text-sm text-blue-200">Total Jadwal</div>
                    </div>
                </div>
            </div>

            <!-- Upcoming Exams -->
            @php
                $upcomingExams = $data->where('tgl_ujian', '>=', $now->toDateString())->take(3);
            @endphp
            @if($upcomingExams->count() > 0)
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center space-x-2">
                        <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        <span>Ujian Mendatang</span>
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        @foreach($upcomingExams as $upcoming)
                            <div
                                class="bg-gradient-to-br {{ $upcoming->tgl_ujian == $now->toDateString() ? 'from-amber-500 to-amber-600' : 'from-blue-500 to-blue-600' }} rounded-xl p-4 text-white">
                                <div class="flex items-start justify-between mb-3">
                                    <div class="flex items-center space-x-2">
                                        <div class="p-2 bg-white/20 rounded-lg">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-bold">{{ $upcoming->jenis_ujian }}</h4>
                                            <p class="text-xs opacity-90">{{ $upcoming->tgl_ujian }}</p>
                                        </div>
                                    </div>
                                    @if($upcoming->tgl_ujian == $now->toDateString())
                                        <span class="text-xs font-semibold bg-white/30 px-2 py-1 rounded-full">Hari Ini</span>
                                    @endif
                                </div>
                                <div class="text-sm">
                                    <div class="flex justify-between items-center">
                                        <span>Jam: {{ $upcoming->jam }}:{{ str_pad($upcoming->menit, 2, '0', STR_PAD_LEFT) }}</span>
                                        @if(Auth::user()->level == 'siswa')
                                            @php
                                                $sudahMengerjakan = \App\Models\Hasil::where('id_user', Auth::id())
                                                    ->where('id_kelas', $kelas)
                                                    ->where('id_mapelkelas', $mapel)
                                                    ->where('id_jadwal', $upcoming->id)
                                                    ->exists();
                                            @endphp
                                            <span
                                                class="text-xs {{ $sudahMengerjakan ? 'bg-green-500' : 'bg-white/30' }} px-2 py-1 rounded-full">
                                                {{ $sudahMengerjakan ? 'Selesai' : 'Belum' }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Main Content Card -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200/50">
                <!-- Table Header -->
                <div class="bg-gradient-to-r from-gray-900 to-gray-800 px-6 py-4">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <div>
                            <h3 class="text-lg font-bold text-white">Daftar Jadwal Ujian</h3>
                            <p class="text-sm text-gray-300">Total {{ $data->count() }} jadwal ujian</p>
                        </div>
                        <div class="relative">
                            <input type="text" placeholder="Cari jadwal..." id="searchInput"
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
                                    JENIS UJIAN
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    TANGGAL
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    WAKTU
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    STATUS
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    SOAL
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    HASIL UJIAN
                                </th>
                                @if (Auth::user()->level == 'admin' || Auth::user()->level == 'guru')
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                        AKSI
                                    </th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200" id="jadwalTable">
                            @forelse ($data as $index => $d)
                                @php
                                    $sudahMengerjakan = \App\Models\Hasil::where('id_user', Auth::id())
                                        ->where('id_kelas', $kelas)
                                        ->where('id_mapelkelas', $mapel)
                                        ->where('id_jadwal', $d->id)
                                        ->exists();

                                    $status = '';
                                    $statusClass = '';
                                    if ($d->tgl_ujian == $now->toDateString()) {
                                        $status = 'Hari Ini';
                                        $statusClass = 'bg-amber-100 text-amber-800';
                                    } elseif ($d->tgl_ujian > $now->toDateString()) {
                                        $status = 'Mendatang';
                                        $statusClass = 'bg-blue-100 text-blue-800';
                                    } else {
                                        $status = 'Lewat';
                                        $statusClass = 'bg-gray-100 text-gray-800';
                                    }
                                @endphp
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $index + 1 }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center space-x-3">
                                            <div class="flex-shrink-0">
                                                <div
                                                    class="h-10 w-10 rounded-lg bg-gradient-to-br {{ $d->tgl_ujian == $now->toDateString() ? 'from-amber-500 to-amber-600' : ($d->tgl_ujian > $now->toDateString() ? 'from-blue-500 to-blue-600' : 'from-gray-500 to-gray-600') }} flex items-center justify-center">
                                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">{{ $d->jenis_ujian }}</div>
                                                <span
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $statusClass }}">
                                                    {{ $status }}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900 font-medium">{{ $d->tgl_ujian }}</div>
                                        <div class="text-xs text-gray-500">
                                            {{ \Carbon\Carbon::parse($d->tgl_ujian)->translatedFormat('l, d F Y') }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <div class="inline-flex items-center bg-gray-50 px-3 py-2 rounded-lg">
                                            <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span
                                                class="text-sm font-mono">{{ $d->jam }}:{{ str_pad($d->menit, 2, '0', STR_PAD_LEFT) }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        @if (Auth::user()->level == 'admin' || Auth::user()->level == 'guru')
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $statusClass }}">
                                                {{ $status }}
                                            </span>
                                        @else
                                            @if($sudahMengerjakan)
                                                <span
                                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M5 13l4 4L19 7" />
                                                    </svg>
                                                    Selesai
                                                </span>
                                            @elseif($d->tgl_ujian == $now->toDateString())
                                                <span
                                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-amber-100 text-amber-800">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    Tersedia
                                                </span>
                                            @elseif($d->tgl_ujian > $now->toDateString())
                                                <span
                                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                                    </svg>
                                                    Mendatang
                                                </span>
                                            @else
                                                <span
                                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                    Lewat
                                                </span>
                                            @endif
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        @if (Auth::user()->level == 'admin' || Auth::user()->level == 'guru')
                                            <a href="{{ route('datasoal', ['id' => $kelas, 'mapel' => $mapel, 'jadwal' => $d->id]) }}"
                                                class="inline-flex items-center justify-center px-4 py-2 bg-gradient-to-r from-gray-800 to-gray-900 hover:from-amber-600 hover:to-amber-700 text-white text-sm font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5 min-w-[120px]">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                                </svg>
                                                <span>Kelola Soal</span>
                                            </a>
                                        @elseif ($sudahMengerjakan)
                                            <span
                                                class="inline-flex items-center justify-center px-4 py-2 bg-gradient-to-r from-blue-600 to-blue-700 text-white text-sm font-semibold rounded-lg shadow-md min-w-[120px] cursor-default">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7" />
                                                </svg>
                                                <span>Selesai</span>
                                            </span>
                                        @elseif ($d->tgl_ujian == $now->toDateString())
                                            <a href="{{ route('ujian', ['id' => $kelas, 'mapel' => $mapel, 'jadwal' => $d->id]) }}"
                                                class="inline-flex items-center justify-center px-4 py-2 bg-gradient-to-r from-green-600 to-green-700 hover:from-amber-600 hover:to-amber-700 text-white text-sm font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5 min-w-[120px]">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                <span>Kerjakan</span>
                                            </a>
                                        @elseif ($d->tgl_ujian > $now->toDateString())
                                            <span
                                                class="inline-flex items-center justify-center px-4 py-2 bg-gradient-to-r from-gray-600 to-gray-700 text-white text-sm font-semibold rounded-lg shadow-md min-w-[120px] cursor-default">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                                </svg>
                                                <span>Belum Dibuka</span>
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex items-center justify-center px-4 py-2 bg-gradient-to-r from-red-600 to-red-700 text-white text-sm font-semibold rounded-lg shadow-md min-w-[120px] cursor-default">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                                <span>Sudah Lewat</span>
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        @if (Auth::user()->level == 'admin' || Auth::user()->level == 'guru')
                                            <a href="{{ route('datahasil', ['id' => $kelas, 'mapel' => $mapel, 'jadwal' => $d->id]) }}"
                                                class="inline-flex items-center justify-center px-4 py-2 bg-gradient-to-r from-purple-600 to-purple-700 hover:from-amber-600 hover:to-amber-700 text-white text-sm font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5 min-w-[120px]">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                                </svg>
                                                <span>Lihat Hasil</span>
                                            </a>
                                        @else
                                            <a href="{{ route('hasilujian', ['id' => $kelas, 'mapel' => $mapel, 'jadwal' => $d->id]) }}"
                                                class="inline-flex items-center justify-center px-4 py-2 bg-gradient-to-r from-purple-600 to-purple-700 hover:from-amber-600 hover:to-amber-700 text-white text-sm font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5 min-w-[120px]">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                                </svg>
                                                <span>Lihat Hasil</span>
                                            </a>
                                        @endif
                                    </td>
                                    @if (Auth::user()->level == 'admin' || Auth::user()->level == 'guru')
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            <div class="flex items-center justify-center space-x-3">
                                                <a href="{{ route('editjadwal', ['id' => $kelas, 'mapel' => $mapel, 'jadwal' => $d->id]) }}"
                                                    class="text-blue-600 hover:text-blue-900 bg-blue-50 hover:bg-blue-100 p-2 rounded-lg transition-colors duration-200 group"
                                                    title="Edit">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </a>
                                                <button type="button"
                                                    onclick="confirmDelete('{{ $d->jenis_ujian }}', '{{ route('hapusjadwal', ['id' => $kelas, 'mapel' => $mapel, 'jadwal' => $d->id]) }}')"
                                                    class="text-red-600 hover:text-red-900 bg-red-50 hover:bg-red-100 p-2 rounded-lg transition-colors duration-200 group"
                                                    title="Hapus">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="{{ (Auth::user()->level == 'admin' || Auth::user()->level == 'guru') ? '8' : '7' }}"
                                        class="px-6 py-12 text-center">
                                        <div class="text-gray-400">
                                            <svg class="mx-auto h-12 w-12" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <h3 class="mt-2 text-sm font-medium text-gray-900">Tidak ada data jadwal ujian</h3>
                                            <p class="mt-1 text-sm text-gray-500">
                                                @if (Auth::user()->level == 'admin' || Auth::user()->level == 'guru')
                                                    Mulai dengan menambahkan jadwal ujian baru.
                                                @else
                                                    Belum ada jadwal ujian yang tersedia.
                                                @endif
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Table Footer -->
                @if($data->count() > 0)
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                            <div class="text-sm text-gray-700">
                                Menampilkan <span class="font-semibold">{{ $data->count() }}</span> jadwal ujian
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 p-4">
            <div class="bg-white rounded-2xl shadow-xl max-w-md w-full p-6">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="p-2 bg-red-100 rounded-lg">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.874-.833-2.644 0L4.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900">Konfirmasi Hapus</h3>
                </div>
                <p class="text-gray-600 mb-6">
                    Apakah Anda yakin ingin menghapus jadwal ujian <span id="jadwalName" class="font-semibold"></span>?
                    Tindakan ini tidak dapat dibatalkan.
                </p>
                <div class="flex justify-end space-x-3">
                    <button onclick="closeModal()"
                        class="px-4 py-2 text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg font-medium transition-colors duration-200">
                        Batal
                    </button>
                    <form id="deleteForm" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg font-medium transition-colors duration-200">
                            Ya, Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <script>
            // Search functionality
            document.getElementById('searchInput').addEventListener('input', function (e) {
                const searchTerm = e.target.value.toLowerCase();
                const rows = document.querySelectorAll('#jadwalTable tr');

                rows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    row.style.display = text.includes(searchTerm) ? '' : 'none';
                });
            });

            // Delete confirmation modal
            function confirmDelete(name, deleteUrl) {
                const modal = document.getElementById('deleteModal');
                const jadwalName = document.getElementById('jadwalName');
                const form = document.getElementById('deleteForm');

                jadwalName.textContent = name;
                form.action = deleteUrl;

                modal.classList.remove('hidden');
                modal.classList.add('flex');
            }

            function closeModal() {
                const modal = document.getElementById('deleteModal');
                modal.classList.remove('flex');
                modal.classList.add('hidden');
            }

            // Close modal on outside click
            document.getElementById('deleteModal').addEventListener('click', function (e) {
                if (e.target === this) {
                    closeModal();
                }
            });

            // Close modal on escape key
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') {
                    closeModal();
                }
            });

            // Add hover effects to table rows
            document.querySelectorAll('#jadwalTable tr').forEach(row => {
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
                    // Adjust button sizes and text
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

            // Add date-based color coding
            document.addEventListener('DOMContentLoaded', function () {
                const now = new Date().toISOString().split('T')[0];

                document.querySelectorAll('tr').forEach(row => {
                    const dateCell = row.querySelector('td:nth-child(3) .text-sm.font-medium');
                    if (dateCell) {
                        const examDate = dateCell.textContent.trim();
                        const iconDiv = row.querySelector('td:nth-child(2) .h-10.w-10');

                        if (examDate === now) {
                            // Today's exam
                            row.classList.add('bg-amber-50', 'hover:bg-amber-100');
                            if (iconDiv) {
                                iconDiv.classList.remove('from-blue-500', 'to-blue-600', 'from-gray-500', 'to-gray-600');
                                iconDiv.classList.add('from-amber-500', 'to-amber-600');
                            }
                        } else if (examDate > now) {
                            // Upcoming exam
                            if (iconDiv) {
                                iconDiv.classList.remove('from-amber-500', 'to-amber-600', 'from-gray-500', 'to-gray-600');
                                iconDiv.classList.add('from-blue-500', 'to-blue-600');
                            }
                        } else {
                            // Past exam
                            if (iconDiv) {
                                iconDiv.classList.remove('from-amber-500', 'to-amber-600', 'from-blue-500', 'to-blue-600');
                                iconDiv.classList.add('from-gray-500', 'to-gray-600');
                            }
                        }
                    }
                });
            });
        </script>
    </div>
@endsection
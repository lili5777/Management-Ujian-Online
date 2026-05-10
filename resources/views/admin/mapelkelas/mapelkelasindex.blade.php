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
                                @if (isset($head) && $head)
                                    <h1 class="text-2xl font-bold text-gray-900">Data Mapel Kelas {{ $head->kodekelas }}</h1>
                                    <p class="text-sm text-gray-600 mt-1">{{ $head->namakelas }}</p>
                                @else
                                    <h1 class="text-2xl font-bold text-gray-900">Data Mapel Kelas</h1>
                                    <p class="text-sm text-gray-600 mt-1">Manajemen mata pelajaran per kelas</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- User Info & Actions -->
                    <div class="flex items-center space-x-4">
                        @if (isset($head) && $head)
                            <!-- Back Button -->
                            <a href="{{ route('datakelas') }}"
                                class="group border border-gray-300 text-gray-700 hover:bg-gray-50 px-5 py-2.5 rounded-xl font-semibold transition-all duration-300 flex items-center space-x-2 hover:shadow-sm">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                                <span>Kembali</span>
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
            <!-- Jika Tidak Ada Kelas -->
            @if (!isset($head))
                <div class="mb-6">
                    <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-r-lg">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-red-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.874-.833-2.644 0L4.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                            </svg>
                            <div>
                                <p class="text-red-700 font-medium">{{ $message }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <!-- Stats Overview -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-gradient-to-br from-blue-600 to-blue-700 rounded-2xl shadow-xl p-6 text-white">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-white/20 backdrop-blur-sm rounded-xl">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                            <span class="text-xs font-semibold bg-white/30 px-3 py-1 rounded-full">Total</span>
                        </div>
                        <h3 class="text-sm font-medium text-blue-100 mb-2">Mapel</h3>
                        <p class="text-3xl font-bold">{{ $data->count() }}</p>
                    </div>

                    <div class="bg-gradient-to-br from-green-600 to-green-700 rounded-2xl shadow-xl p-6 text-white">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-white/20 backdrop-blur-sm rounded-xl">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <span class="text-xs font-semibold bg-white/30 px-3 py-1 rounded-full">Pengajar</span>
                        </div>
                        <h3 class="text-sm font-medium text-green-100 mb-2">Guru</h3>
                        <p class="text-3xl font-bold">{{ $guru->count() }}</p>
                    </div>

                    <div class="bg-gradient-to-br from-purple-600 to-purple-700 rounded-2xl shadow-xl p-6 text-white">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-white/20 backdrop-blur-sm rounded-xl">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <span class="text-xs font-semibold bg-white/30 px-3 py-1 rounded-full">Materi</span>
                        </div>
                        <h3 class="text-sm font-medium text-purple-100 mb-2">Total Materi</h3>
                        <p class="text-3xl font-bold">{{ $materi->count() }}</p>
                    </div>

                    <div class="bg-gradient-to-br from-pink-600 to-pink-700 rounded-2xl shadow-xl p-6 text-white">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-white/20 backdrop-blur-sm rounded-xl">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <span class="text-xs font-semibold bg-white/30 px-3 py-1 rounded-full">Aktif</span>
                        </div>
                        <h3 class="text-sm font-medium text-pink-100 mb-2">Status</h3>
                        <p class="text-3xl font-bold">{{ $data->count() > 0 ? 'Aktif' : 'Tidak' }}</p>
                    </div>
                </div>

                <!-- Main Content Card -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200/50">
                    <!-- Table Header -->
                    <div class="bg-gradient-to-r from-gray-900 to-gray-800 px-6 py-4">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                            <div>
                                <h3 class="text-lg font-bold text-white">Daftar Mapel Kelas {{ $head->kodekelas }}</h3>
                                <p class="text-sm text-gray-300">Total {{ $data->count() }} mata pelajaran dalam kelas</p>
                            </div>
                            <div class="flex items-center space-x-3">
                                <!-- Search -->
                                <div class="relative">
                                    <input type="text" placeholder="Cari mapel..." id="searchInput"
                                        class="pl-10 pr-4 py-2 bg-white/10 border border-white/20 rounded-lg text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                                    <svg class="absolute left-3 top-2.5 w-5 h-5 text-gray-300" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>
                                <!-- Add Button -->
                                @if (Auth::user()->level == 'admin')
                                    <a href="{{ route('tambahmapelkelas', $kelas) }}"
                                        class="group bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-600 hover:to-amber-700 text-white px-5 py-2 rounded-lg font-semibold shadow-lg hover:shadow-xl transition-all duration-300 flex items-center space-x-2 transform hover:-translate-y-0.5">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4v16m8-8H4" />
                                        </svg>
                                        <span class="hidden sm:inline">Tambah Mapel</span>
                                        <span class="sm:hidden">Tambah</span>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Table Container -->
                    @if ($data->isEmpty())
                        <div class="p-12 text-center">
                            <div class="text-gray-400">
                                <svg class="mx-auto h-16 w-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                                <h3 class="mt-4 text-lg font-medium text-gray-900">Belum ada mata pelajaran di kelas ini</h3>
                                <p class="mt-2 text-sm text-gray-500">Mulai dengan menambahkan mata pelajaran ke kelas
                                    {{ $head->namakelas }}.</p>
                                @if (Auth::user()->level == 'admin')
                                    <div class="mt-6">
                                        <a href="{{ route('tambahmapelkelas', $kelas) }}"
                                            class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-amber-500 to-amber-600 text-white rounded-lg font-medium shadow hover:shadow-lg transition-all duration-300">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 4v16m8-8H4" />
                                            </svg>
                                            Tambah Mapel Pertama
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @else
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
                                            MATA PELAJARAN
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                            PENGAJAR
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                            MATERI
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                            JADWAL UJIAN
                                        </th>
                                        @if (Auth::user()->level == 'admin')
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider text-center">
                                                AKSI
                                            </th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200" id="subjectTable">
                                    @foreach ($data as $index => $d)
                                        @php
                                            $subject = $mapel->where('id', $d->namamapel)->first();
                                            $teacher = $guru->where('id', $d->pengajar)->first();
                                            $materiCount = $materi->where('id_mapelkelas', $d->id)->count();
                                        @endphp
                                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-medium text-gray-900">{{ $index + 1 }}</div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-10 w-10">
                                                        <div
                                                            class="h-10 w-10 rounded-lg bg-gradient-to-br from-amber-500 to-amber-600 flex items-center justify-center">
                                                            <span
                                                                class="text-white font-bold text-sm">{{ $subject ? substr($subject->namamapel, 0, 2) : '-' }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">{{ $subject->namamapel ?? '-' }}
                                                        </div>
                                                        <div class="text-sm text-gray-500">{{ $subject->kodemapel ?? 'Kode: -' }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="flex items-center">
                                                    @if($teacher)
                                                        <div class="flex-shrink-0 h-8 w-8">
                                                            <div
                                                                class="h-8 w-8 rounded-full bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center text-white font-bold text-xs">
                                                                {{ strtoupper(substr($teacher->name, 0, 1)) }}
                                                            </div>
                                                        </div>
                                                        <div class="ml-3">
                                                            <div class="text-sm font-medium text-gray-900">{{ $teacher->name }}</div>
                                                            <div class="text-xs text-gray-500">{{ $teacher->nis ?? 'NIP: -' }}</div>
                                                        </div>
                                                    @else
                                                        <span class="text-sm text-gray-400">-</span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if (Auth::user()->id == $d->pengajar || Auth::user()->level == 'admin' || Auth::user()->level == 'siswa')
                                                    <a href="{{ route('datamateri', ['id' => $kelas, 'mapel' => $d->id]) }}"
                                                        class="inline-flex items-center justify-center px-4 py-2 bg-gradient-to-r from-gray-800 to-gray-900 hover:from-amber-600 hover:to-amber-700 text-white text-sm font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5 min-w-[100px]">
                                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                        </svg>
                                                        <span>{{ $materiCount }} Materi</span>
                                                    </a>
                                                @else
                                                    <span class="text-sm text-gray-400">-</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if (Auth::user()->level == 'admin' || Auth::user()->level == 'guru')
                                                    @if (Auth::user()->id == $d->pengajar || Auth::user()->level == 'admin')
                                                        <a href="{{ route('datajadwal', ['id' => $kelas, 'mapel' => $d->id]) }}"
                                                            class="inline-flex items-center justify-center px-4 py-2 bg-gradient-to-r from-gray-800 to-gray-900 hover:from-amber-600 hover:to-amber-700 text-white text-sm font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5 min-w-[100px]">
                                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                            </svg>
                                                            <span>Kelola Jadwal</span>
                                                        </a>
                                                    @else
                                                        <span class="text-sm text-gray-400">-</span>
                                                    @endif
                                                @else
                                                    <a href="{{ route('datajadwal', ['id' => $kelas, 'mapel' => $d->id]) }}"
                                                        class="inline-flex items-center justify-center px-4 py-2 bg-gradient-to-r from-gray-800 to-gray-900 hover:from-amber-600 hover:to-amber-700 text-white text-sm font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5 min-w-[100px]">
                                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                        </svg>
                                                        <span>Lihat Jadwal</span>
                                                    </a>
                                                @endif
                                            </td>
                                            @if (Auth::user()->level == 'admin')
                                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                                    <div class="flex items-center justify-center space-x-2">
                                                        <a href="{{ route('editmapelkelas', ['id' => $d->id, 'kelas' => $kelas]) }}"
                                                            class="text-blue-600 hover:text-blue-900 bg-blue-50 hover:bg-blue-100 p-2 rounded-lg transition-colors duration-200 group"
                                                            title="Edit">
                                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                            </svg>
                                                        </a>
                                                        <form action="{{ route('hapusmapelkelas', ['id' => $d->id, 'kelas' => $kelas]) }}"
                                                            method="POST" class="inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button"
                                                                onclick="confirmDelete('{{ $subject->namamapel ?? 'Mapel' }}', this)"
                                                                class="text-red-600 hover:text-red-900 bg-red-50 hover:bg-red-100 p-2 rounded-lg transition-colors duration-200 group"
                                                                title="Hapus">
                                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                </svg>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Table Footer -->
                        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                                <div class="text-sm text-gray-700">
                                    Menampilkan <span class="font-semibold">{{ $data->count() }}</span> mata pelajaran di kelas
                                    {{ $head->namakelas }}
                                </div>
                                <div class="flex items-center space-x-2 mt-2 sm:mt-0">
                                    <button class="px-3 py-1 border border-gray-300 rounded text-sm text-gray-700 hover:bg-gray-50">
                                        Previous
                                    </button>
                                    <button class="px-3 py-1 border border-gray-300 rounded text-sm text-gray-700 hover:bg-gray-50">
                                        Next
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            @endif
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
                    Apakah Anda yakin ingin menghapus mata pelajaran <span id="subjectName" class="font-semibold"></span>
                    dari kelas ini?
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
            const searchInput = document.getElementById('searchInput');
            if (searchInput) {
                searchInput.addEventListener('input', function (e) {
                    const searchTerm = e.target.value.toLowerCase();
                    const rows = document.querySelectorAll('#subjectTable tr');

                    rows.forEach(row => {
                        const text = row.textContent.toLowerCase();
                        row.style.display = text.includes(searchTerm) ? '' : 'none';
                    });
                });
            }

            // Delete confirmation modal
            function confirmDelete(name, button) {
                const modal = document.getElementById('deleteModal');
                const subjectName = document.getElementById('subjectName');
                const form = document.getElementById('deleteForm');

                subjectName.textContent = name;
                form.action = button.closest('form').action;

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
            document.querySelectorAll('#subjectTable tr').forEach(row => {
                row.addEventListener('mouseenter', function () {
                    this.style.backgroundColor = '#f9fafb';
                });

                row.addEventListener('mouseleave', function () {
                    this.style.backgroundColor = '';
                });
            });

            // Add hover effects to action buttons
            document.querySelectorAll('a[title="Edit"], button[title="Hapus"]').forEach(btn => {
                btn.addEventListener('mouseenter', function () {
                    this.style.transform = 'translateY(-2px)';
                });

                btn.addEventListener('mouseleave', function () {
                    this.style.transform = 'translateY(0)';
                });
            });

            // Responsive table adjustments
            function adjustTableForMobile() {
                const table = document.querySelector('table');
                const screenWidth = window.innerWidth;

                if (screenWidth < 640) {
                    if (table) {
                        table.classList.add('text-xs');
                    }
                    // Adjust button sizes for mobile
                    document.querySelectorAll('a.inline-flex').forEach(btn => {
                        btn.classList.add('px-2', 'py-1', 'text-xs');
                        btn.classList.remove('px-4', 'py-2', 'text-sm');
                        btn.querySelector('span').classList.add('hidden');
                        btn.querySelector('svg').classList.remove('mr-2');
                        btn.querySelector('svg').classList.add('mx-auto');
                    });
                } else {
                    if (table) {
                        table.classList.remove('text-xs');
                    }
                    // Restore button sizes for desktop
                    document.querySelectorAll('a.inline-flex').forEach(btn => {
                        btn.classList.remove('px-2', 'py-1', 'text-xs');
                        btn.classList.add('px-4', 'py-2', 'text-sm');
                        btn.querySelector('span').classList.remove('hidden');
                        btn.querySelector('svg').classList.add('mr-2');
                        btn.querySelector('svg').classList.remove('mx-auto');
                    });
                }
            }

            // Initial adjustment
            adjustTableForMobile();

            // Adjust on resize
            window.addEventListener('resize', adjustTableForMobile);
        </script>
    </div>
@endsection
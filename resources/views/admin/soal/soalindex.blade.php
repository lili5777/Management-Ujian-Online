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
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                            <div>
                                <h1 class="text-2xl font-bold text-gray-900">Data Soal Kelas {{ $head->kodekelas }}</h1>
                                <p class="text-sm text-gray-600 mt-1">Kelola soal ujian untuk kelas {{ $head->namakelas }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- User Info & Actions -->
                    <div class="flex items-center space-x-4">
                        <!-- Add Button -->
                        <a href="{{ route('tambahsoal', ['id' => $kelas, 'mapel' => $mapel, 'jadwal' => $jadwal]) }}"
                            class="group bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-600 hover:to-amber-700 text-white px-5 py-2.5 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all duration-300 flex items-center space-x-2 transform hover:-translate-y-0.5">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            <span>Tambah Soal</span>
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
                                <span class="ml-1 text-sm font-medium text-amber-600 md:ml-2">Bank Soal</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>

            <!-- Exam Info Card -->
            @php
                $jadwalData = \App\Models\Jadwal::find($jadwal);
                $mapelData = \App\Models\Mapel::find($mapel);
            @endphp
            <div class="bg-gradient-to-br from-purple-600 to-purple-700 rounded-2xl shadow-xl p-6 text-white mb-8">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                    <div class="mb-4 md:mb-0">
                        <div class="flex items-center space-x-3 mb-3">
                            <div class="p-3 bg-white/20 backdrop-blur-sm rounded-xl">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-xl font-bold">{{ $mapelData ? $mapelData->namamapel : 'Mata Pelajaran' }}
                                </h2>
                                <p class="text-purple-100 text-sm">
                                    {{ $head->kodekelas }} •
                                    {{ $jadwalData ? $jadwalData->jenis_ujian : 'Ujian' }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="text-center md:text-right">
                        <div class="text-3xl font-bold mb-1">{{ $data->count() }}</div>
                        <div class="text-sm text-purple-200">Total Soal</div>
                    </div>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
                <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Total Soal</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $data->count() }}</p>
                        </div>
                        <div class="p-2 bg-blue-50 rounded-lg">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Pilihan A</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $data->where('kunci', 'A')->count() }}</p>
                        </div>
                        <div class="p-2 bg-red-50 rounded-lg">
                            <span class="text-lg font-bold text-red-600">A</span>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Pilihan B</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $data->where('kunci', 'B')->count() }}</p>
                        </div>
                        <div class="p-2 bg-blue-50 rounded-lg">
                            <span class="text-lg font-bold text-blue-600">B</span>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Pilihan C & D</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $data->whereIn('kunci', ['C', 'D'])->count() }}
                            </p>
                        </div>
                        <div class="p-2 bg-green-50 rounded-lg">
                            <span class="text-lg font-bold text-green-600">C/D</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Card -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200/50">
                <!-- Table Header -->
                <div class="bg-gradient-to-r from-gray-900 to-gray-800 px-6 py-4">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <div>
                            <h3 class="text-lg font-bold text-white">Bank Soal Ujian</h3>
                            <p class="text-sm text-gray-300">Total {{ $data->count() }} soal tersedia</p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="relative">
                                <input type="text" placeholder="Cari soal..." id="searchInput"
                                    class="pl-10 pr-4 py-2 bg-white/10 border border-white/20 rounded-lg text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent w-full">
                                <svg class="absolute left-3 top-2.5 w-5 h-5 text-gray-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            <div class="relative">
                                <select id="filterKunci"
                                    class="pl-10 pr-8 py-2 bg-white/10 border border-white/20 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent appearance-none">
                                    <option value="">Semua Kunci</option>
                                    <option value="A">Kunci A</option>
                                    <option value="B">Kunci B</option>
                                    <option value="C">Kunci C</option>
                                    <option value="D">Kunci D</option>
                                </select>
                                <svg class="absolute right-3 top-2.5 w-5 h-5 text-gray-300" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
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
                                    PERTANYAAN
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    PILIHAN JAWABAN
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    KUNCI
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    AKSI
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200" id="soalTable">
                            @forelse ($data as $index => $soal)
                                <tr class="hover:bg-gray-50 transition-colors duration-200 soal-row"
                                    data-kunci="{{ $soal->kunci }}">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $index + 1 }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-start space-x-3">
                                            <div class="flex-shrink-0 mt-1">
                                                <div
                                                    class="h-8 w-8 rounded-lg bg-gradient-to-br from-amber-500 to-amber-600 flex items-center justify-center">
                                                    <span class="text-white text-xs font-bold">{{ $index + 1 }}</span>
                                                </div>
                                            </div>
                                            <div class="min-w-0 flex-1">
                                                <div class="text-sm font-medium text-gray-900 mb-1">
                                                    {{ Str::limit($soal->pertanyaan, 100) }}
                                                </div>
                                                @if(strlen($soal->pertanyaan) > 100)
                                                    <button type="button" onclick="toggleFullText('pertanyaan{{ $soal->id }}')"
                                                        class="text-xs text-amber-600 hover:text-amber-800 font-medium">
                                                        Lihat selengkapnya
                                                    </button>
                                                    <div id="pertanyaan{{ $soal->id }}"
                                                        class="hidden mt-2 p-3 bg-gray-50 rounded-lg">
                                                        <p class="text-sm text-gray-700">{{ $soal->pertanyaan }}</p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="space-y-2">
                                            <div class="flex items-center space-x-2">
                                                <div
                                                    class="h-6 w-6 rounded-full {{ $soal->kunci == 'A' ? 'bg-gradient-to-br from-red-500 to-red-600 text-white' : 'bg-gray-100 text-gray-700' }} flex items-center justify-center text-xs font-bold">
                                                    A
                                                </div>
                                                <span
                                                    class="text-sm {{ $soal->kunci == 'A' ? 'font-semibold text-red-700' : 'text-gray-600' }}">{{ Str::limit($soal->a, 30) }}</span>
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <div
                                                    class="h-6 w-6 rounded-full {{ $soal->kunci == 'B' ? 'bg-gradient-to-br from-blue-500 to-blue-600 text-white' : 'bg-gray-100 text-gray-700' }} flex items-center justify-center text-xs font-bold">
                                                    B
                                                </div>
                                                <span
                                                    class="text-sm {{ $soal->kunci == 'B' ? 'font-semibold text-blue-700' : 'text-gray-600' }}">{{ Str::limit($soal->b, 30) }}</span>
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <div
                                                    class="h-6 w-6 rounded-full {{ $soal->kunci == 'C' ? 'bg-gradient-to-br from-green-500 to-green-600 text-white' : 'bg-gray-100 text-gray-700' }} flex items-center justify-center text-xs font-bold">
                                                    C
                                                </div>
                                                <span
                                                    class="text-sm {{ $soal->kunci == 'C' ? 'font-semibold text-green-700' : 'text-gray-600' }}">{{ Str::limit($soal->c, 30) }}</span>
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <div
                                                    class="h-6 w-6 rounded-full {{ $soal->kunci == 'D' ? 'bg-gradient-to-br from-purple-500 to-purple-600 text-white' : 'bg-gray-100 text-gray-700' }} flex items-center justify-center text-xs font-bold">
                                                    D
                                                </div>
                                                <span
                                                    class="text-sm {{ $soal->kunci == 'D' ? 'font-semibold text-purple-700' : 'text-gray-600' }}">{{ Str::limit($soal->d, 30) }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        @php
                                            $kunciColors = [
                                                'A' => 'from-red-500 to-red-600',
                                                'B' => 'from-blue-500 to-blue-600',
                                                'C' => 'from-green-500 to-green-600',
                                                'D' => 'from-purple-500 to-purple-600',
                                            ];
                                            $kunciColor = isset($kunciColors[$soal->kunci]) ? $kunciColors[$soal->kunci] : 'from-gray-500 to-gray-600';
                                        @endphp
                                        <div class="inline-flex items-center">
                                            <div
                                                class="h-10 w-10 rounded-lg bg-gradient-to-br {{ $kunciColor }} flex items-center justify-center">
                                                <span class="text-white font-bold text-lg">{{ $soal->kunci }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <div class="flex items-center justify-center space-x-3">
                                            <a href="{{ route('editsoal', ['id' => $kelas, 'mapel' => $mapel, 'jadwal' => $jadwal, 'soal' => $soal->id]) }}"
                                                class="text-blue-600 hover:text-blue-900 bg-blue-50 hover:bg-blue-100 p-2 rounded-lg transition-colors duration-200 group"
                                                title="Edit">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>
                                            <button type="button"
                                                onclick="confirmDelete('Soal #{{ $index + 1 }}', '{{ route('hapussoal', ['id' => $kelas, 'mapel' => $mapel, 'jadwal' => $jadwal, 'soal' => $soal->id]) }}')"
                                                class="text-red-600 hover:text-red-900 bg-red-50 hover:bg-red-100 p-2 rounded-lg transition-colors duration-200 group"
                                                title="Hapus">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                            <button type="button" onclick="previewSoal({{ $index }})"
                                                class="text-gray-600 hover:text-gray-900 bg-gray-50 hover:bg-gray-100 p-2 rounded-lg transition-colors duration-200 group"
                                                title="Preview">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center">
                                        <div class="text-gray-400">
                                            <svg class="mx-auto h-12 w-12" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                            </svg>
                                            <h3 class="mt-2 text-sm font-medium text-gray-900">Tidak ada data soal</h3>
                                            <p class="mt-1 text-sm text-gray-500">Mulai dengan menambahkan soal baru.</p>
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
                                Menampilkan <span class="font-semibold">{{ $data->count() }}</span> soal
                            </div>
                            <div class="text-sm text-gray-500">
                                @php
                                    $kunciCounts = [
                                        'A' => $data->where('kunci', 'A')->count(),
                                        'B' => $data->where('kunci', 'B')->count(),
                                        'C' => $data->where('kunci', 'C')->count(),
                                        'D' => $data->where('kunci', 'D')->count(),
                                    ];
                                @endphp
                                Distribusi kunci:
                                @foreach($kunciCounts as $kunci => $count)
                                    <span class="font-medium ml-2">{{ $kunci }}: {{ $count }}</span>
                                @endforeach
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
                    Apakah Anda yakin ingin menghapus <span id="soalName" class="font-semibold"></span>?
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

        <!-- Preview Modal -->
        <div id="previewModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 p-4">
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
                                <h3 class="text-lg font-bold text-white">Preview Soal</h3>
                                <p class="text-sm text-gray-300">Detail soal ujian</p>
                            </div>
                        </div>
                        <button onclick="closePreviewModal()" class="text-white hover:text-gray-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="p-6" id="previewContent">
                    <!-- Preview content will be injected here -->
                </div>
            </div>
        </div>

        <script>
            // Search functionality
            document.getElementById('searchInput').addEventListener('input', function (e) {
                const searchTerm = e.target.value.toLowerCase();
                const rows = document.querySelectorAll('#soalTable .soal-row');

                rows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    row.style.display = text.includes(searchTerm) ? '' : 'none';
                });
            });

            // Filter by kunci functionality
            document.getElementById('filterKunci').addEventListener('change', function (e) {
                const filterValue = e.target.value;
                const rows = document.querySelectorAll('#soalTable .soal-row');

                rows.forEach(row => {
                    const kunci = row.getAttribute('data-kunci');
                    if (!filterValue || kunci === filterValue) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });

            // Toggle full text function
            function toggleFullText(id) {
                const element = document.getElementById(id);
                element.classList.toggle('hidden');
                const button = element.previousElementSibling;
                if (element.classList.contains('hidden')) {
                    button.textContent = 'Lihat selengkapnya';
                } else {
                    button.textContent = 'Sembunyikan';
                }
            }

            // Preview soal function
            function previewSoal(index) {
                const row = document.querySelectorAll('.soal-row')[index];
                if (!row) return;

                const pertanyaan = row.querySelector('.text-sm.font-medium.text-gray-900.mb-1').textContent;
                const kunci = row.getAttribute('data-kunci');

                const options = [];
                row.querySelectorAll('.flex.items-center.space-x-2').forEach((option, i) => {
                    const letter = option.querySelector('.h-6.w-6.rounded-full').textContent.trim();
                    const text = option.querySelector('.text-sm').textContent;
                    options.push({ letter, text });
                });

                const previewContent = document.getElementById('previewContent');
                const kunciColors = {
                    'A': 'from-red-500 to-red-600',
                    'B': 'from-blue-500 to-blue-600',
                    'C': 'from-green-500 to-green-600',
                    'D': 'from-purple-500 to-purple-600'
                };

                const kunciColor = kunciColors[kunci] || 'from-gray-500 to-gray-600';
                const kunciTextColors = {
                    'A': 'text-red-700',
                    'B': 'text-blue-700',
                    'C': 'text-green-700',
                    'D': 'text-purple-700'
                };
                const kunciTextColor = kunciTextColors[kunci] || 'text-gray-700';

                const html = `
                        <div class="space-y-6">
                            <div class="bg-gradient-to-br from-amber-50 to-amber-100 border border-amber-200 rounded-xl p-4">
                                <h4 class="text-sm font-medium text-amber-800 mb-2">Soal #${index + 1}</h4>
                                <p class="text-gray-800 text-lg font-medium">${pertanyaan}</p>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                ${options.map((option, i) => `
                                    <div class="bg-white border ${option.letter === kunci ? 'bg-gradient-to-br from-gray-50 to-gray-100 border-amber-300' : 'border-gray-200'} rounded-xl p-4">
                                        <div class="flex items-center justify-between mb-2">
                                            <div class="flex items-center space-x-2">
                                                <div class="h-8 w-8 rounded-full ${option.letter === kunci ? 'bg-gradient-to-br from-amber-500 to-amber-600 text-white' : 'bg-gray-200 text-gray-700'} flex items-center justify-center font-bold">
                                                    ${option.letter}
                                                </div>
                                                <span class="font-medium ${option.letter === kunci ? 'text-amber-700' : 'text-gray-700'}">Pilihan ${option.letter}</span>
                                            </div>
                                            ${option.letter === kunci ? '<span class="text-xs font-semibold bg-amber-100 text-amber-800 px-2 py-1 rounded-full">Kunci Jawaban</span>' : ''}
                                        </div>
                                        <p class="text-gray-700">${option.text}</p>
                                    </div>
                                `).join('')}
                            </div>

                            <div class="bg-gradient-to-br from-blue-50 to-blue-100 border border-blue-200 rounded-xl p-4">
                                <h4 class="text-sm font-medium text-blue-800 mb-2">Kunci Jawaban</h4>
                                <div class="flex items-center space-x-4">
                                    <div class="h-12 w-12 rounded-lg bg-gradient-to-br ${kunciColor} flex items-center justify-center">
                                        <span class="text-white font-bold text-xl">${kunci}</span>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900">Jawaban yang benar adalah: <span class="text-lg font-bold ${kunciTextColor}">${kunci}</span></p>
                                        <p class="text-sm text-gray-600 mt-1">${options.find(opt => opt.letter === kunci).text}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;

                previewContent.innerHTML = html;

                const modal = document.getElementById('previewModal');
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            }

            function closePreviewModal() {
                const modal = document.getElementById('previewModal');
                modal.classList.remove('flex');
                modal.classList.add('hidden');
            }

            // Delete confirmation modal
            function confirmDelete(name, deleteUrl) {
                const modal = document.getElementById('deleteModal');
                const soalName = document.getElementById('soalName');
                const form = document.getElementById('deleteForm');

                soalName.textContent = name;
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

            document.getElementById('previewModal').addEventListener('click', function (e) {
                if (e.target === this) {
                    closePreviewModal();
                }
            });

            // Close modal on escape key
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') {
                    closeModal();
                    closePreviewModal();
                }
            });

            // Add hover effects to table rows
            document.querySelectorAll('#soalTable tr').forEach(row => {
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
                    document.querySelectorAll('.flex.space-x-3').forEach(actions => {
                        actions.classList.add('space-x-1');
                        actions.classList.remove('space-x-3');
                    });
                    // Hide some columns on very small screens
                    if (screenWidth < 640) {
                        // Only show question and actions on very small screens
                        document.querySelectorAll('td:nth-child(3), th:nth-child(3), td:nth-child(4), th:nth-child(4)').forEach(el => {
                            el.style.display = 'none';
                        });
                    } else {
                        // Show all columns on medium-small screens
                        document.querySelectorAll('td, th').forEach(el => {
                            el.style.display = '';
                        });
                    }
                } else {
                    table.classList.remove('text-xs');
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

            // Highlight correct answers on hover
            document.querySelectorAll('.soal-row').forEach(row => {
                row.addEventListener('mouseenter', function () {
                    const kunci = this.getAttribute('data-kunci');
                    this.querySelectorAll('.flex.items-center.space-x-2').forEach(option => {
                        const optionLetter = option.querySelector('.h-6.w-6.rounded-full').textContent.trim();
                        if (optionLetter === kunci) {
                            option.style.backgroundColor = '#f0f9ff';
                        }
                    });
                });

                row.addEventListener('mouseleave', function () {
                    this.querySelectorAll('.flex.items-center.space-x-2').forEach(option => {
                        option.style.backgroundColor = '';
                    });
                });
            });
        </script>
    </div>
@endsection
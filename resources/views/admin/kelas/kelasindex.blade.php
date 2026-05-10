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
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <div>
                                <h1 class="text-2xl font-bold text-gray-900">Data Kelas</h1>
                                <p class="text-sm text-gray-600 mt-1">Kelola ruang kelas dan pembagian siswa</p>
                            </div>
                        </div>
                    </div>

                    <!-- User Info & Actions -->
                    <div class="flex items-center space-x-4">
                        @if (Auth::user()->level == 'admin')
                            <!-- Add Button -->
                            <a href="{{ route('tambahkelas') }}"
                                class="group bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-600 hover:to-amber-700 text-white px-5 py-2.5 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all duration-300 flex items-center space-x-2 transform hover:-translate-y-0.5">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                <span>Tambah Kelas</span>
                            </a>
                        @endif

                        <!-- User Profile -->
                        <div class="flex items-center space-x-3 bg-gradient-to-r from-gray-900 to-gray-800 px-4 py-3 rounded-xl shadow-lg">
                            <div class="w-10 h-10 bg-gradient-to-br from-amber-500 to-amber-600 rounded-full flex items-center justify-center text-white font-bold text-lg shadow-lg ring-4 ring-amber-500/20">
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
            <!-- Stats Overview -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-gradient-to-br from-blue-600 to-blue-700 rounded-2xl shadow-xl p-6 text-white">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-white/20 backdrop-blur-sm rounded-xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <span class="text-xs font-semibold bg-white/30 px-3 py-1 rounded-full">Total</span>
                    </div>
                    <h3 class="text-sm font-medium text-blue-100 mb-2">Jumlah Kelas</h3>
                    <p class="text-3xl font-bold">{{ $data->count() }}</p>
                </div>

                <div class="bg-gradient-to-br from-green-600 to-green-700 rounded-2xl shadow-xl p-6 text-white">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-white/20 backdrop-blur-sm rounded-xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <span class="text-xs font-semibold bg-white/30 px-3 py-1 rounded-full">Siswa</span>
                    </div>
                    <h3 class="text-sm font-medium text-green-100 mb-2">Total Siswa</h3>
                    <p class="text-3xl font-bold">{{ $siswa->count() }}</p>
                </div>

                <div class="bg-gradient-to-br from-purple-600 to-purple-700 rounded-2xl shadow-xl p-6 text-white">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-white/20 backdrop-blur-sm rounded-xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <span class="text-xs font-semibold bg-white/30 px-3 py-1 rounded-full">Wali</span>
                    </div>
                    <h3 class="text-sm font-medium text-purple-100 mb-2">Wali Kelas</h3>
                    <p class="text-3xl font-bold">{{ $walikelas->count() }}</p>
                </div>

                <div class="bg-gradient-to-br from-pink-600 to-pink-700 rounded-2xl shadow-xl p-6 text-white">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-white/20 backdrop-blur-sm rounded-xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <span class="text-xs font-semibold bg-white/30 px-3 py-1 rounded-full">Mapel</span>
                    </div>
                    <h3 class="text-sm font-medium text-pink-100 mb-2">Total Mapel</h3>
                    <p class="text-3xl font-bold">{{ $mapel->count() }}</p>
                </div>
            </div>

            <!-- Main Content Card -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200/50">
                <!-- Table Header -->
                <div class="bg-gradient-to-r from-gray-900 to-gray-800 px-6 py-4">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <div>
                            <h3 class="text-lg font-bold text-white">Daftar Kelas</h3>
                            <p class="text-sm text-gray-300">Total {{ $data->count() }} kelas terdaftar</p>
                        </div>
                        <div class="relative">
                            <input type="text" placeholder="Cari kelas..." id="searchInput"
                                class="pl-10 pr-4 py-2 bg-white/10 border border-white/20 rounded-lg text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                            <svg class="absolute left-3 top-2.5 w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    <div class="flex items-center space-x-1">
                                        <span>NO</span>
                                        <button class="text-gray-400 hover:text-gray-600">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                                            </svg>
                                        </button>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    KODE KELAS
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    NAMA KELAS
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    WALI KELAS
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    JUMLAH SISWA
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    JUMLAH MAPEL
                                </th>
                                @if (Auth::user()->level == 'admin')
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider text-center">
                                        AKSI
                                    </th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200" id="classTable">
                            @forelse ($data as $index => $d)
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $index + 1 }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center space-x-2">
                                            <div class="flex-shrink-0">
                                                <div class="h-10 w-10 rounded-lg bg-gradient-to-br from-amber-500 to-amber-600 flex items-center justify-center">
                                                    <span class="text-white font-bold text-sm">{{ substr($d->kodekelas, 0, 2) }}</span>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="text-sm font-medium text-gray-900 font-mono">{{ $d->kodekelas }}</div>
                                                <div class="text-xs text-gray-500">Kode</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="ml-2">
                                                <div class="text-sm font-medium text-gray-900">{{ $d->namakelas }}</div>
                                                <div class="text-xs text-gray-500">Kelas</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            @if($wali->where('id', $d->wali)->first())
                                                <div class="flex-shrink-0 h-8 w-8">
                                                    <div class="h-8 w-8 rounded-full bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center text-white font-bold text-xs">
                                                        {{ strtoupper(substr($wali->where('id', $d->wali)->first()->name, 0, 1)) }}
                                                    </div>
                                                </div>
                                                <div class="ml-3">
                                                    <div class="text-sm font-medium text-gray-900">{{ $wali->where('id', $d->wali)->first()->name }}</div>
                                                    <div class="text-xs text-gray-500">Wali Kelas</div>
                                                </div>
                                            @else
                                                <span class="text-sm text-gray-400">-</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('datasiswakelas', $d->id) }}"
                                            class="inline-flex items-center justify-center px-4 py-2 bg-gradient-to-r from-gray-800 to-gray-900 hover:from-amber-600 hover:to-amber-700 text-white text-sm font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5 min-w-[100px]">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                            </svg>
                                            <span>{{ $siswa->where('id_kelas', $d->id)->count() }} Siswa</span>
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ route('datamapelkelas', $d->id) }}"
                                            class="inline-flex items-center justify-center px-4 py-2 bg-gradient-to-r from-gray-800 to-gray-900 hover:from-amber-600 hover:to-amber-700 text-white text-sm font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5 min-w-[100px]">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                            </svg>
                                            <span>{{ $mapel->where('id_kelas', $d->id)->count() }} Mapel</span>
                                        </a>
                                    </td>
                                    @if (Auth::user()->level == 'admin')
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            <div class="flex items-center justify-center space-x-2">
                                                <a href="{{ route('editkelas', $d->id) }}"
                                                    class="text-blue-600 hover:text-blue-900 bg-blue-50 hover:bg-blue-100 p-2 rounded-lg transition-colors duration-200 group"
                                                    title="Edit">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </a>
                                                <form action="{{ route('hapuskelas', $d->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button"
                                                        onclick="confirmDelete('{{ $d->namakelas }}', this)"
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
                            @empty
                                <tr>
                                    <td colspan="{{ Auth::user()->level == 'admin' ? '7' : '6' }}" class="px-6 py-12 text-center">
                                        <div class="text-gray-400">
                                            <svg class="mx-auto h-12 w-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                            </svg>
                                            <h3 class="mt-2 text-sm font-medium text-gray-900">Tidak ada data kelas</h3>
                                            <p class="mt-1 text-sm text-gray-500">Mulai dengan menambahkan kelas baru.</p>
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
                                Menampilkan <span class="font-semibold">{{ $data->count() }}</span> kelas
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
                    Apakah Anda yakin ingin menghapus kelas <span id="className" class="font-semibold"></span>?
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
            document.getElementById('searchInput').addEventListener('input', function(e) {
                const searchTerm = e.target.value.toLowerCase();
                const rows = document.querySelectorAll('#classTable tr');

                rows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    row.style.display = text.includes(searchTerm) ? '' : 'none';
                });
            });

            // Delete confirmation modal
            function confirmDelete(name, button) {
                const modal = document.getElementById('deleteModal');
                const className = document.getElementById('className');
                const form = document.getElementById('deleteForm');

                className.textContent = name;
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
            document.getElementById('deleteModal').addEventListener('click', function(e) {
                if (e.target === this) {
                    closeModal();
                }
            });

            // Close modal on escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    closeModal();
                }
            });

            // Add hover effects to table rows
            document.querySelectorAll('#classTable tr').forEach(row => {
                row.addEventListener('mouseenter', function() {
                    this.style.backgroundColor = '#f9fafb';
                });

                row.addEventListener('mouseleave', function() {
                    this.style.backgroundColor = '';
                });
            });

            // Add hover effects to action buttons
            document.querySelectorAll('a[title="Edit"], button[title="Hapus"]').forEach(btn => {
                btn.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-2px)';
                });

                btn.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });

            // Responsive table adjustments
            function adjustTableForMobile() {
                const table = document.querySelector('table');
                const screenWidth = window.innerWidth;

                if (screenWidth < 640) {
                    table.classList.add('text-xs');
                    // Hide some content on mobile
                    document.querySelectorAll('.text-xs.text-gray-500').forEach(el => {
                        el.style.display = 'none';
                    });
                    // Adjust button sizes
                    document.querySelectorAll('a.inline-flex').forEach(btn => {
                        btn.classList.add('px-2', 'py-1');
                        btn.classList.remove('px-4', 'py-2');
                        btn.querySelector('span').classList.add('hidden');
                        btn.querySelector('svg').classList.remove('mr-2');
                    });
                } else {
                    table.classList.remove('text-xs');
                    // Show all content on desktop
                    document.querySelectorAll('.text-xs.text-gray-500').forEach(el => {
                        el.style.display = '';
                    });
                    // Restore button sizes
                    document.querySelectorAll('a.inline-flex').forEach(btn => {
                        btn.classList.remove('px-2', 'py-1');
                        btn.classList.add('px-4', 'py-2');
                        btn.querySelector('span').classList.remove('hidden');
                        btn.querySelector('svg').classList.add('mr-2');
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
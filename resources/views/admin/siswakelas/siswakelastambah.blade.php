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
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </div>
                            <div>
                                <h1 class="text-2xl font-bold text-gray-900">
                                    {{ isset($user) ? 'Edit Siswa Kelas' : 'Tambah Siswa Kelas' }}
                                </h1>
                                <p class="text-sm text-gray-600 mt-1">
                                    {{ isset($user) ? 'Perbarui data siswa di kelas' : 'Tambahkan siswa ke kelas' }}
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
                                <a href="{{ route('datasiswakelas', $kelass) }}"
                                    class="ml-1 text-sm font-medium text-gray-700 hover:text-amber-600 md:ml-2">Siswa
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
                                    {{ isset($user) ? 'Edit Siswa' : 'Tambah Siswa' }}
                                </span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200/50 max-w-2xl mx-auto">
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
                                <h3 class="text-lg font-bold text-white">Form Siswa Kelas</h3>
                                <p class="text-sm text-gray-300">Pilih siswa untuk ditambahkan ke kelas</p>
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
                    <form action="{{ route('possiswakelas', $kelass) }}" method="POST" class="space-y-6">
                        @csrf
                        <input type="hidden" name="id" value="{{ isset($user) ? $user->id : '' }}">

                        <!-- Student Selection -->
                        <div>
                            <label for="siswa" class="block text-sm font-medium text-gray-700 mb-3">
                                Pilih Siswa <span class="text-red-500">*</span>
                            </label>

                            <!-- Search and Filter -->
                            <div class="mb-4">
                                <div class="relative">
                                    <input type="text" id="searchStudent"
                                        class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all duration-300"
                                        placeholder="Cari siswa berdasarkan nama atau NIS...">
                                    <svg class="absolute left-3 top-3.5 h-5 w-5 text-gray-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>
                            </div>

                            <!-- Student Selection -->
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                </div>
                                <select id="siswa" name="siswa" required
                                    class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all duration-300 appearance-none bg-white"
                                    onchange="updatePreview()">
                                    <option value="">-- Pilih Siswa --</option>
                                    @foreach ($siswa as $a)
                                        <option value="{{ $a->id }}" {{ old('siswa', isset($user) && $user->siswa == $a->id ? 'selected' : '') }} data-nis="{{ $a->nis }}" data-name="{{ $a->name }}"
                                            data-jekel="{{ $a->jekel }}">
                                            {{ $a->name }} ({{ $a->nis }})
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

                            @error('siswa')
                                <p class="mt-2 text-sm text-red-600 flex items-center space-x-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.874-.833-2.644 0L4.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                                    </svg>
                                    <span>{{ $message }}</span>
                                </p>
                            @enderror
                            <p class="mt-2 text-xs text-gray-500">
                                Pilih siswa dari daftar yang tersedia. Gunakan pencarian untuk menemukan siswa dengan cepat.
                            </p>
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
                                <span>Preview Siswa</span>
                            </h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="bg-white p-3 rounded-lg">
                                    <p class="text-xs text-gray-500 mb-1">Informasi Siswa</p>
                                    <div class="flex items-center space-x-3">
                                        <div
                                            class="h-10 w-10 rounded-full bg-gradient-to-br from-amber-500 to-amber-600 flex items-center justify-center">
                                            <span class="text-white font-bold text-sm" id="previewInitial">-</span>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-900" id="previewName">-</p>
                                            <p class="text-xs text-gray-500" id="previewNis">NIS: -</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-white p-3 rounded-lg">
                                    <p class="text-xs text-gray-500 mb-1">Detail</p>
                                    <div class="space-y-1">
                                        <p class="text-sm text-gray-700">
                                            <span class="font-medium">Jenis Kelamin:</span>
                                            <span id="previewGender" class="ml-1">-</span>
                                        </p>
                                        <p class="text-sm text-gray-700">
                                            <span class="font-medium">Status:</span>
                                            <span id="previewStatus"
                                                class="ml-1 px-2 py-0.5 text-xs rounded-full bg-blue-100 text-blue-800">Belum
                                                ditambahkan</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Available Students Count -->
                        <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-medium text-gray-700">Siswa Tersedia</p>
                                    <p class="text-xs text-gray-500">Total siswa yang belum terdaftar di kelas lain</p>
                                </div>
                                <span class="text-lg font-bold text-amber-600">{{ $siswa->count() }}</span>
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
                                <a href="{{ route('datasiswakelas', $kelass) }}"
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
            const siswaSelect = document.getElementById('siswa');
            const searchInput = document.getElementById('searchStudent');

            // Preview elements
            const previewInitial = document.getElementById('previewInitial');
            const previewName = document.getElementById('previewName');
            const previewNis = document.getElementById('previewNis');
            const previewGender = document.getElementById('previewGender');
            const previewStatus = document.getElementById('previewStatus');

            // Update preview function
            function updatePreview() {
                const selectedOption = siswaSelect.options[siswaSelect.selectedIndex];
                const studentName = selectedOption.getAttribute('data-name');
                const studentNis = selectedOption.getAttribute('data-nis');
                const studentJekel = selectedOption.getAttribute('data-jekel');

                if (studentName && studentName !== '-') {
                    // Update preview data
                    previewInitial.textContent = studentName.substring(0, 1).toUpperCase();
                    previewName.textContent = studentName;
                    previewNis.textContent = `NIS: ${studentNis}`;

                    // Update gender
                    if (studentJekel === 'l') {
                        previewGender.textContent = 'Laki-laki';
                        previewGender.className = 'ml-1 px-2 py-0.5 text-xs rounded-full bg-blue-100 text-blue-800';
                    } else if (studentJekel === 'p') {
                        previewGender.textContent = 'Perempuan';
                        previewGender.className = 'ml-1 px-2 py-0.5 text-xs rounded-full bg-pink-100 text-pink-800';
                    } else {
                        previewGender.textContent = '-';
                        previewGender.className = 'ml-1';
                    }

                    // Update status
                    previewStatus.textContent = 'Siap ditambahkan';
                    previewStatus.className = 'ml-1 px-2 py-0.5 text-xs rounded-full bg-green-100 text-green-800';
                } else {
                    // Reset preview
                    previewInitial.textContent = '-';
                    previewName.textContent = '-';
                    previewNis.textContent = 'NIS: -';
                    previewGender.textContent = '-';
                    previewGender.className = 'ml-1';
                    previewStatus.textContent = 'Belum dipilih';
                    previewStatus.className = 'ml-1 px-2 py-0.5 text-xs rounded-full bg-gray-100 text-gray-800';
                }
            }

            // Search functionality for student dropdown
            if (searchInput) {
                searchInput.addEventListener('input', function (e) {
                    const searchTerm = e.target.value.toLowerCase();
                    const options = siswaSelect.querySelectorAll('option');

                    options.forEach(option => {
                        if (option.value === '') {
                            option.style.display = ''; // Always show the placeholder
                            return;
                        }

                        const optionText = option.textContent.toLowerCase();
                        if (optionText.includes(searchTerm)) {
                            option.style.display = '';
                        } else {
                            option.style.display = 'none';
                        }
                    });

                    // If no option is selected and there's a search term, select the first visible option
                    if (searchTerm && siswaSelect.value === '') {
                        const firstVisible = Array.from(options).find(opt =>
                            opt.style.display !== 'none' && opt.value !== ''
                        );
                        if (firstVisible) {
                            siswaSelect.value = firstVisible.value;
                            updatePreview();
                        }
                    }
                });
            }

            // Add event listener for select change
            siswaSelect.addEventListener('change', updatePreview);

            // Initial update
            updatePreview();

            // Add focus styles to form inputs
            document.querySelectorAll('input, select').forEach(input => {
                input.addEventListener('focus', function () {
                    this.parentElement.classList.add('ring-2', 'ring-amber-500', 'ring-opacity-50');
                });

                input.addEventListener('blur', function () {
                    this.parentElement.classList.remove('ring-2', 'ring-amber-500', 'ring-opacity-50');
                });
            });

            // Responsive form adjustments
            function adjustFormForMobile() {
                const formCard = document.querySelector('.max-w-2xl');
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

            // Auto-focus search input on page load
            document.addEventListener('DOMContentLoaded', function () {
                if (searchInput) {
                    searchInput.focus();
                }
            });

            // Form validation
            document.querySelector('form').addEventListener('submit', function (e) {
                const siswa = siswaSelect.value;

                if (!siswa) {
                    e.preventDefault();
                    siswaSelect.classList.add('border-red-500');
                    siswaSelect.focus();

                    // Remove red border on change
                    siswaSelect.addEventListener('change', function () {
                        this.classList.remove('border-red-500');
                    });

                    return false;
                }
            });

            // Initialize preview if there's existing value
            if (siswaSelect.value) {
                updatePreview();
            }
        </script>
    </div>
@endsection
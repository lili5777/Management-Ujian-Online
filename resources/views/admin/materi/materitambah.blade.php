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
                                    {{ isset($user) ? 'Edit Materi' : 'Tambah Materi' }}
                                </h1>
                                <p class="text-sm text-gray-600 mt-1">
                                    {{ isset($user) ? 'Perbarui informasi materi' : 'Tambahkan materi pembelajaran baru' }}
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
                                <a href="{{ route('datamateri', ['id' => $kelas, 'mapel' => $mapel]) }}"
                                    class="ml-1 text-sm font-medium text-gray-700 hover:text-amber-600 md:ml-2">Materi</a>
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
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-white">Form Materi Pembelajaran</h3>
                            <p class="text-sm text-gray-300">Isi data materi dengan lengkap</p>
                        </div>
                    </div>
                </div>

                <!-- Form Content -->
                <div class="p-6">
                    <form action="{{ route('posmateri', ['id' => $kelas, 'mapel' => $mapel]) }}" method="POST"
                        enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        <input type="hidden" name="id" value="{{ isset($user) ? $user->id : '' }}">

                        <!-- Form Fields -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nama Materi -->
                            <div>
                                <label for="namamateri" class="block text-sm font-medium text-gray-700 mb-2">
                                    Nama Materi <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </div>
                                    <input type="text" id="namamateri" name="namamateri" required
                                        value="{{ old('namamateri', isset($user) ? $user->namamateri : '') }}"
                                        class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all duration-300"
                                        placeholder="Contoh: Pengenalan Algoritma, Teorema Pythagoras"
                                        oninput="updatePreview()">
                                </div>
                                @error('namamateri')
                                    <p class="mt-2 text-sm text-red-600 flex items-center space-x-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.874-.833-2.644 0L4.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                                        </svg>
                                        <span>{{ $message }}</span>
                                    </p>
                                @enderror
                                <p class="mt-1 text-xs text-gray-500">
                                    Berikan nama yang jelas dan deskriptif untuk materi pembelajaran
                                </p>
                            </div>

                            <!-- File Upload -->
                            <div>
                                <label for="file" class="block text-sm font-medium text-gray-700 mb-2">
                                    File Materi
                                    {{ isset($user) && $user->file ? '(Opsional)' : '<span class="text-red-500">*</span>' }}
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </div>
                                    <input type="file" id="file" name="file"
                                        class="pl-10 w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all duration-300 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100"
                                        onchange="updateFilePreview(this)">
                                </div>

                                @if (isset($user) && $user->file)
                                    <div class="mt-3 p-3 bg-green-50 border border-green-200 rounded-lg">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center space-x-2">
                                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7" />
                                                </svg>
                                                <span class="text-sm font-medium text-green-800">File saat ini:</span>
                                            </div>
                                            <a href="{{ asset('dokumen/' . $user->file) }}" target="_blank"
                                                class="text-sm text-blue-600 hover:text-blue-800 flex items-center space-x-1">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                                <span>Lihat File</span>
                                            </a>
                                        </div>
                                        <p class="text-xs text-green-600 mt-1 pl-7">{{ $user->file }}</p>
                                    </div>
                                @endif

                                @error('file')
                                    <p class="mt-2 text-sm text-red-600 flex items-center space-x-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.874-.833-2.644 0L4.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                                        </svg>
                                        <span>{{ $message }}</span>
                                    </p>
                                @enderror

                                <p class="mt-1 text-xs text-gray-500">
                                    Unggah file PDF, DOC, PPT, atau gambar (max: 10MB)
                                </p>

                                <div id="filePreview" class="mt-3 hidden p-3 bg-blue-50 border border-blue-200 rounded-lg">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        <span class="text-sm font-medium text-blue-800">File baru:</span>
                                        <span id="fileName" class="text-sm text-blue-600"></span>
                                    </div>
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
                                <span>Preview Materi</span>
                            </h4>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="bg-white p-3 rounded-lg">
                                    <p class="text-xs text-gray-500 mb-1">Nama Materi</p>
                                    <p class="text-sm font-medium text-gray-900" id="previewMateri">-</p>
                                </div>
                                <div class="bg-white p-3 rounded-lg">
                                    <p class="text-xs text-gray-500 mb-1">Status File</p>
                                    <div class="flex items-center space-x-2">
                                        <div id="fileStatusIcon"
                                            class="h-6 w-6 rounded-full bg-gradient-to-br from-gray-300 to-gray-400 flex items-center justify-center">
                                            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <span class="text-sm font-medium text-gray-900" id="fileStatusText">Belum ada
                                            file</span>
                                    </div>
                                </div>
                                <div class="bg-white p-3 rounded-lg">
                                    <p class="text-xs text-gray-500 mb-1">Mata Pelajaran</p>
                                    <p class="text-sm font-medium text-gray-900">
                                        {{ $mapelData ? $mapelData->namamapel : '-' }}</p>
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
                                <a href="{{ route('datamateri', ['id' => $kelas, 'mapel' => $mapel]) }}"
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
            const namamateriInput = document.getElementById('namamateri');
            const fileInput = document.getElementById('file');

            // Preview elements
            const previewMateri = document.getElementById('previewMateri');
            const fileStatusIcon = document.getElementById('fileStatusIcon');
            const fileStatusText = document.getElementById('fileStatusText');
            const filePreview = document.getElementById('filePreview');
            const fileName = document.getElementById('fileName');

            // Check if there's existing file
            const hasExistingFile = {{ isset($user) && $user->file ? 'true' : 'false' }};

            // Initialize file status
            if (hasExistingFile) {
                updateFileStatus('existing', 'File tersedia');
                fileStatusIcon.className = 'h-6 w-6 rounded-full bg-gradient-to-br from-green-500 to-green-600 flex items-center justify-center';
                fileStatusIcon.innerHTML = '<svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>';
            }

            // Update preview function
            function updatePreview() {
                const materiValue = namamateriInput.value.trim();

                if (materiValue) {
                    previewMateri.textContent = materiValue;
                } else {
                    previewMateri.textContent = '-';
                }
            }

            // Update file preview function
            function updateFilePreview(input) {
                if (input.files && input.files[0]) {
                    const file = input.files[0];
                    const fileSize = (file.size / 1024 / 1024).toFixed(2); // MB

                    // Check file size
                    if (fileSize > 10) {
                        alert('Ukuran file terlalu besar. Maksimum 10MB.');
                        input.value = '';
                        updateFileStatus('none', 'Belum ada file');
                        filePreview.classList.add('hidden');
                        return;
                    }

                    // Update file preview
                    fileName.textContent = file.name;
                    filePreview.classList.remove('hidden');

                    // Update status based on file type
                    const fileExtension = file.name.split('.').pop().toLowerCase();
                    const allowedExtensions = ['pdf', 'doc', 'docx', 'ppt', 'pptx', 'xls', 'xlsx', 'jpg', 'jpeg', 'png'];

                    if (allowedExtensions.includes(fileExtension)) {
                        updateFileStatus('new', 'File baru dipilih');
                        fileStatusIcon.className = 'h-6 w-6 rounded-full bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center';
                        fileStatusIcon.innerHTML = '<svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>';
                    } else {
                        alert('Format file tidak didukung. Harap unggah PDF, DOC, PPT, atau gambar.');
                        input.value = '';
                        updateFileStatus('none', 'Belum ada file');
                        filePreview.classList.add('hidden');
                    }
                }
            }

            // Update file status function
            function updateFileStatus(status, text) {
                fileStatusText.textContent = text;

                switch (status) {
                    case 'existing':
                        fileStatusIcon.className = 'h-6 w-6 rounded-full bg-gradient-to-br from-green-500 to-green-600 flex items-center justify-center';
                        fileStatusIcon.innerHTML = '<svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>';
                        break;
                    case 'new':
                        fileStatusIcon.className = 'h-6 w-6 rounded-full bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center';
                        fileStatusIcon.innerHTML = '<svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>';
                        break;
                    default:
                        fileStatusIcon.className = 'h-6 w-6 rounded-full bg-gradient-to-br from-gray-300 to-gray-400 flex items-center justify-center';
                        fileStatusIcon.innerHTML = '<svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>';
                }
            }

            // Add event listeners
            namamateriInput.addEventListener('input', updatePreview);

            // Initial update
            updatePreview();

            // Form validation
            document.querySelector('form').addEventListener('submit', function (e) {
                const materi = namamateriInput.value.trim();

                let hasError = false;

                if (!materi) {
                    namamateriInput.classList.add('border-red-500');
                    hasError = true;
                }

                // Check if file is required (only for new entries without existing file)
                if (!hasExistingFile && !fileInput.files[0]) {
                    fileInput.classList.add('border-red-500');
                    hasError = true;
                }

                if (hasError) {
                    e.preventDefault();

                    // Scroll to first error
                    if (!materi) {
                        namamateriInput.focus();
                    } else if (!hasExistingFile && !fileInput.files[0]) {
                        fileInput.focus();
                    }

                    // Remove red border on input/change
                    namamateriInput.addEventListener('input', function () {
                        this.classList.remove('border-red-500');
                    });

                    fileInput.addEventListener('change', function () {
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

            // Auto-focus input field on page load
            document.addEventListener('DOMContentLoaded', function () {
                namamateriInput.focus();
            });

            // Drag and drop for file input (optional enhancement)
            const fileDropArea = fileInput.parentElement;

            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                fileDropArea.addEventListener(eventName, preventDefaults, false);
            });

            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }

            ['dragenter', 'dragover'].forEach(eventName => {
                fileDropArea.addEventListener(eventName, highlight, false);
            });

            ['dragleave', 'drop'].forEach(eventName => {
                fileDropArea.addEventListener(eventName, unhighlight, false);
            });

            function highlight() {
                fileDropArea.classList.add('border-amber-500', 'bg-amber-50');
            }

            function unhighlight() {
                fileDropArea.classList.remove('border-amber-500', 'bg-amber-50');
            }

            fileDropArea.addEventListener('drop', handleDrop, false);

            function handleDrop(e) {
                const dt = e.dataTransfer;
                const files = dt.files;

                if (files.length) {
                    fileInput.files = files;
                    updateFilePreview(fileInput);
                }
            }
        </script>
    </div>
@endsection
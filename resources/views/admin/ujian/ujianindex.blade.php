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
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h1 class="text-2xl font-bold text-gray-900">Ujian {{ $head->namakelas ?? 'Kelas' }}</h1>
                                <p class="text-sm text-gray-600 mt-1">
                                    {{ $mapelData ? $mapelData->namamapel : 'Mata Pelajaran' }} •
                                    {{ $jadwal ? $jadwal->jenis_ujian : 'Ujian' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- User Info & Timer -->
                    <div class="flex items-center space-x-4">
                        <!-- Timer Card -->
                        <div class="bg-gradient-to-r from-red-600 to-red-700 rounded-xl shadow-lg px-5 py-3 text-white">
                            <div class="flex items-center space-x-4">
                                <div class="text-center">
                                    <div id="jam" class="text-2xl font-bold font-mono">00</div>
                                    <div class="text-xs opacity-80">Jam</div>
                                </div>
                                <div class="text-xl font-bold">:</div>
                                <div class="text-center">
                                    <div id="menit" class="text-2xl font-bold font-mono">00</div>
                                    <div class="text-xs opacity-80">Menit</div>
                                </div>
                                <div class="text-xl font-bold">:</div>
                                <div class="text-center">
                                    <div id="detik" class="text-2xl font-bold font-mono">00</div>
                                    <div class="text-xs opacity-80">Detik</div>
                                </div>
                            </div>
                        </div>

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
                                <span class="ml-1 text-sm font-medium text-amber-600 md:ml-2">Ujian Berlangsung</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>

            <!-- Exam Info Card -->
            <div class="bg-gradient-to-br from-blue-600 to-blue-700 rounded-2xl shadow-xl p-6 text-white mb-8">
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
                                <p class="text-blue-100 text-sm">
                                    {{ $head->kodekelas ?? '' }} •
                                    {{ $jadwal ? $jadwal->jenis_ujian : 'Ujian' }} •
                                    {{ $data->count() }} Soal
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="text-center md:text-right">
                        <div class="text-3xl font-bold mb-1">{{ $data->count() }}</div>
                        <div class="text-sm text-blue-200">Total Soal</div>
                    </div>
                </div>
            </div>

            <!-- Flash Messages -->
            @if(session('warning'))
                <div class="bg-gradient-to-br from-amber-50 to-amber-100 border-l-4 border-amber-500 text-amber-800 p-4 mb-6 rounded-lg"
                    role="alert">
                    <div class="flex items-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.874-.833-2.644 0L4.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                        </svg>
                        <p class="font-medium">{{ session('warning') }}</p>
                    </div>
                </div>
            @endif

            <!-- Main Content Card -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200/50">
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
                            <h3 class="text-lg font-bold text-white">Ujian Berlangsung</h3>
                            <p class="text-sm text-gray-300">Jawab semua soal sebelum waktu habis</p>
                        </div>
                    </div>
                </div>

                <!-- Form Content -->
                <div class="p-6">
                    <form action="{{ route('simpanhasil', ['id' => $kelas, 'mapel' => $mapel, 'jadwal' => $jadwal]) }}"
                        method="POST" id="ujian-form">
                        @csrf

                        <!-- Progress Indicator -->
                        <div class="mb-6">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm font-medium text-gray-700">Progress</span>
                                <span class="text-sm font-semibold text-amber-600"
                                    id="progressText">1/{{ $data->count() }}</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div id="progressBar"
                                    class="bg-gradient-to-r from-amber-500 to-amber-600 h-2.5 rounded-full"
                                    style="width: {{ (1 / $data->count()) * 100 }}%"></div>
                            </div>
                        </div>

                        <!-- Soal Container -->
                        <div id="soal-container" class="mb-8">
                            @foreach ($data as $index => $soal)
                                <div class="soal {{ $index == 0 ? 'block' : 'hidden' }}" data-id="{{ $soal->id }}">
                                    <!-- Question Card -->
                                    <div
                                        class="bg-gradient-to-br from-blue-50 to-blue-100 border border-blue-200 rounded-xl p-6 mb-6">
                                        <div class="flex items-start space-x-3 mb-4">
                                            <div class="flex-shrink-0 mt-1">
                                                <div
                                                    class="h-10 w-10 rounded-lg bg-gradient-to-br from-amber-500 to-amber-600 flex items-center justify-center">
                                                    <span class="text-white font-bold">{{ $index + 1 }}</span>
                                                </div>
                                            </div>
                                            <div class="flex-1">
                                                <h2 class="text-lg font-bold text-gray-900 mb-2">Soal {{ $index + 1 }}</h2>
                                                <p class="text-gray-800 leading-relaxed">{{ $soal->pertanyaan }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Answer Options -->
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <!-- Option A -->
                                        <div class="answer-option">
                                            <input type="radio" name="jawaban_{{ $soal->id }}" value="A" id="a_{{ $soal->id }}"
                                                class="hidden peer">
                                            <label for="a_{{ $soal->id }}"
                                                class="flex items-center space-x-3 p-4 bg-white border-2 border-gray-200 rounded-xl hover:border-amber-300 hover:bg-amber-50 cursor-pointer transition-all duration-300 peer-checked:border-amber-500 peer-checked:bg-gradient-to-br peer-checked:from-amber-50 peer-checked:to-amber-100">
                                                <div class="flex-shrink-0">
                                                    <div
                                                        class="h-10 w-10 rounded-full bg-gradient-to-br from-red-500 to-red-600 flex items-center justify-center">
                                                        <span class="text-white font-bold">A</span>
                                                    </div>
                                                </div>
                                                <div class="flex-1">
                                                    <p class="text-gray-800">{{ $soal->a }}</p>
                                                </div>
                                                <svg class="w-5 h-5 text-amber-600 opacity-0 peer-checked:opacity-100 transition-opacity duration-300"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7" />
                                                </svg>
                                            </label>
                                        </div>

                                        <!-- Option B -->
                                        <div class="answer-option">
                                            <input type="radio" name="jawaban_{{ $soal->id }}" value="B" id="b_{{ $soal->id }}"
                                                class="hidden peer">
                                            <label for="b_{{ $soal->id }}"
                                                class="flex items-center space-x-3 p-4 bg-white border-2 border-gray-200 rounded-xl hover:border-amber-300 hover:bg-amber-50 cursor-pointer transition-all duration-300 peer-checked:border-amber-500 peer-checked:bg-gradient-to-br peer-checked:from-amber-50 peer-checked:to-amber-100">
                                                <div class="flex-shrink-0">
                                                    <div
                                                        class="h-10 w-10 rounded-full bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center">
                                                        <span class="text-white font-bold">B</span>
                                                    </div>
                                                </div>
                                                <div class="flex-1">
                                                    <p class="text-gray-800">{{ $soal->b }}</p>
                                                </div>
                                                <svg class="w-5 h-5 text-amber-600 opacity-0 peer-checked:opacity-100 transition-opacity duration-300"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7" />
                                                </svg>
                                            </label>
                                        </div>

                                        <!-- Option C -->
                                        <div class="answer-option">
                                            <input type="radio" name="jawaban_{{ $soal->id }}" value="C" id="c_{{ $soal->id }}"
                                                class="hidden peer">
                                            <label for="c_{{ $soal->id }}"
                                                class="flex items-center space-x-3 p-4 bg-white border-2 border-gray-200 rounded-xl hover:border-amber-300 hover:bg-amber-50 cursor-pointer transition-all duration-300 peer-checked:border-amber-500 peer-checked:bg-gradient-to-br peer-checked:from-amber-50 peer-checked:to-amber-100">
                                                <div class="flex-shrink-0">
                                                    <div
                                                        class="h-10 w-10 rounded-full bg-gradient-to-br from-green-500 to-green-600 flex items-center justify-center">
                                                        <span class="text-white font-bold">C</span>
                                                    </div>
                                                </div>
                                                <div class="flex-1">
                                                    <p class="text-gray-800">{{ $soal->c }}</p>
                                                </div>
                                                <svg class="w-5 h-5 text-amber-600 opacity-0 peer-checked:opacity-100 transition-opacity duration-300"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7" />
                                                </svg>
                                            </label>
                                        </div>

                                        <!-- Option D -->
                                        <div class="answer-option">
                                            <input type="radio" name="jawaban_{{ $soal->id }}" value="D" id="d_{{ $soal->id }}"
                                                class="hidden peer">
                                            <label for="d_{{ $soal->id }}"
                                                class="flex items-center space-x-3 p-4 bg-white border-2 border-gray-200 rounded-xl hover:border-amber-300 hover:bg-amber-50 cursor-pointer transition-all duration-300 peer-checked:border-amber-500 peer-checked:bg-gradient-to-br peer-checked:from-amber-50 peer-checked:to-amber-100">
                                                <div class="flex-shrink-0">
                                                    <div
                                                        class="h-10 w-10 rounded-full bg-gradient-to-br from-purple-500 to-purple-600 flex items-center justify-center">
                                                        <span class="text-white font-bold">D</span>
                                                    </div>
                                                </div>
                                                <div class="flex-1">
                                                    <p class="text-gray-800">{{ $soal->d }}</p>
                                                </div>
                                                <svg class="w-5 h-5 text-amber-600 opacity-0 peer-checked:opacity-100 transition-opacity duration-300"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7" />
                                                </svg>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Navigation and Question Indicators -->
                        <div class="space-y-6">
                            <!-- Question Indicators -->
                            <div class="bg-gradient-to-br from-gray-50 to-gray-100 border border-gray-200 rounded-xl p-4">
                                <h4 class="text-sm font-medium text-gray-700 mb-3">Navigasi Soal</h4>
                                <div class="flex flex-wrap gap-2">
                                    @foreach ($data as $index => $soal)
                                        <button type="button"
                                            class="soal-indicator h-10 w-10 rounded-lg flex items-center justify-center text-sm font-medium transition-all duration-300 
                                                           {{ $index == 0 ? 'bg-gradient-to-br from-amber-500 to-amber-600 text-white shadow-lg transform scale-105' : 'bg-white border border-gray-300 text-gray-700 hover:border-amber-300 hover:text-amber-700 hover:shadow-sm' }}"
                                            data-index="{{ $index }}">
                                            {{ $index + 1 }}
                                        </button>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Navigation Buttons -->
                            <div
                                class="flex flex-col sm:flex-row items-center justify-between pt-6 border-t border-gray-200">
                                <div class="mb-4 sm:mb-0">
                                    <button type="button" id="prev-button"
                                        class="px-6 py-3 border border-gray-300 text-gray-700 hover:bg-gray-50 rounded-xl font-medium transition-all duration-300 flex items-center space-x-2 hover:shadow-sm disabled:opacity-50 disabled:cursor-not-allowed"
                                        disabled>
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                        </svg>
                                        <span>Soal Sebelumnya</span>
                                    </button>
                                </div>

                                <div class="flex items-center space-x-3">
                                    <div class="text-sm text-gray-500 hidden sm:block">
                                        <span id="answeredCount">0</span> dari {{ $data->count() }} soal terjawab
                                    </div>

                                    <button type="submit"
                                        class="px-6 py-3 bg-gradient-to-r from-green-600 to-green-700 hover:from-amber-600 hover:to-amber-700 text-white rounded-xl font-medium shadow-lg hover:shadow-xl transition-all duration-300 flex items-center space-x-2 transform hover:-translate-y-0.5"
                                        onclick="return confirmSubmit()">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>Submit Ujian</span>
                                    </button>
                                </div>

                                <div>
                                    <button type="button" id="next-button"
                                        class="px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-amber-600 hover:to-amber-700 text-white rounded-xl font-medium shadow-lg hover:shadow-xl transition-all duration-300 flex items-center space-x-2 transform hover:-translate-y-0.5">
                                        <span>Soal Selanjutnya</span>
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const form = document.getElementById('ujian-form');
                const deadline = @json($deadline);
                const now = Math.floor(Date.now() / 1000);
                let remainingTime = deadline - now;
                const data = @json($data);
                let currentIndex = 0;
                let formSubmitted = false;

                // Timer Countdown
                function updateCountdown() {
                    if (remainingTime <= 0) {
                        clearInterval(timerInterval);
                        showTimeUpAlert();
                        return;
                    }

                    const jam = Math.floor(remainingTime / 3600);
                    const menit = Math.floor((remainingTime % 3600) / 60);
                    const detik = remainingTime % 60;

                    document.getElementById('jam').textContent = jam.toString().padStart(2, '0');
                    document.getElementById('menit').textContent = menit.toString().padStart(2, '0');
                    document.getElementById('detik').textContent = detik.toString().padStart(2, '0');

                    // Change color when less than 5 minutes
                    if (remainingTime < 300) { // 5 minutes = 300 seconds
                        const timerCard = document.querySelector('.bg-gradient-to-r.from-red-600');
                        if (timerCard) {
                            timerCard.classList.remove('from-red-600', 'to-red-700');
                            timerCard.classList.add('from-red-700', 'to-red-800');
                        }
                    }

                    remainingTime--;
                }

                function showTimeUpAlert() {
                    const alertDiv = document.createElement('div');
                    alertDiv.className = 'fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50';
                    alertDiv.innerHTML = `
                            <div class="bg-white rounded-2xl shadow-xl max-w-md w-full p-6">
                                <div class="flex items-center space-x-3 mb-4">
                                    <div class="p-2 bg-red-100 rounded-lg">
                                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <h3 class="text-lg font-semibold text-gray-900">Waktu Habis!</h3>
                                </div>
                                <p class="text-gray-600 mb-6">Waktu ujian telah habis. Jawaban Anda akan disimpan secara otomatis.</p>
                                <div class="flex justify-center">
                                    <button type="button" onclick="submitForm()"
                                        class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg font-medium transition-colors duration-200">
                                        Kirim Jawaban
                                    </button>
                                </div>
                            </div>
                        `;
                    document.body.appendChild(alertDiv);
                }

                function submitForm() {
                    if (!formSubmitted) {
                        formSubmitted = true;
                        localStorage.removeItem('ujian_answers_' + @json($jadwal->id));
                        form.submit();
                    }
                }

                const timerInterval = setInterval(updateCountdown, 1000);
                updateCountdown();

                // Save answers to localStorage
                const saveAnswersToLocalStorage = () => {
                    const formData = new FormData(form);
                    const answers = {};

                    formData.forEach((value, key) => {
                        if (key.startsWith('jawaban_')) {
                            answers[key] = value;
                        }
                    });

                    localStorage.setItem('ujian_answers_' + @json($jadwal), JSON.stringify(answers));
                    updateAnsweredCount();
                };

                // Load answers from localStorage
                const loadAnswersFromLocalStorage = () => {
                    const saved = localStorage.getItem('ujian_answers_' + @json($jadwal));
                    if (saved) {
                        const answers = JSON.parse(saved);
                        Object.keys(answers).forEach(key => {
                            const input = document.querySelector(`input[name="${key}"][value="${answers[key]}"]`);
                            if (input) {
                                input.checked = true;
                            }
                        });
                    }
                    updateAnsweredCount();
                };

                // Update answered count
                const updateAnsweredCount = () => {
                    const answered = Array.from(document.querySelectorAll('input[type="radio"]:checked')).length;
                    document.getElementById('answeredCount').textContent = answered;

                    // Update indicator colors
                    data.forEach((soal, index) => {
                        const indicator = document.querySelector(`.soal-indicator[data-index="${index}"]`);
                        const answer = document.querySelector(`input[name="jawaban_${soal.id}"]:checked`);

                        if (answer) {
                            if (!indicator.classList.contains('from-amber-500')) {
                                indicator.classList.remove('bg-white', 'border-gray-300', 'text-gray-700');
                                indicator.classList.add('bg-gradient-to-br', 'from-green-500', 'to-green-600', 'text-white');
                            }
                        }
                    });
                };

                // Update soal display
                function updateSoal() {
                    const allSoal = document.querySelectorAll('.soal');
                    const allIndicators = document.querySelectorAll('.soal-indicator');

                    // Hide all soal
                    allSoal.forEach(soal => soal.classList.add('hidden'));
                    allSoal.forEach(soal => soal.classList.remove('block'));

                    // Show current soal
                    document.querySelector(`.soal[data-id="${data[currentIndex].id}"]`).classList.remove('hidden');
                    document.querySelector(`.soal[data-id="${data[currentIndex].id}"]`).classList.add('block');

                    // Update indicators
                    allIndicators.forEach((indicator, index) => {
                        indicator.classList.remove('from-amber-500', 'to-amber-600', 'scale-105');
                        if (index === currentIndex) {
                            indicator.classList.add('from-amber-500', 'to-amber-600', 'text-white', 'scale-105', 'shadow-lg');
                            indicator.classList.remove('bg-white', 'border-gray-300', 'text-gray-700');
                        } else {
                            const answer = document.querySelector(`input[name="jawaban_${data[index].id}"]:checked`);
                            if (!answer) {
                                indicator.classList.remove('from-green-500', 'to-green-600');
                                indicator.classList.add('bg-white', 'border', 'border-gray-300', 'text-gray-700');
                            }
                        }
                    });

                    // Update navigation buttons
                    document.getElementById('prev-button').disabled = currentIndex === 0;
                    document.getElementById('next-button').disabled = currentIndex === data.length - 1;

                    // Update progress
                    const progress = ((currentIndex + 1) / data.length) * 100;
                    document.getElementById('progressBar').style.width = `${progress}%`;
                    document.getElementById('progressText').textContent = `${currentIndex + 1}/${data.length}`;

                    saveAnswersToLocalStorage();
                }

                // Navigation
                document.getElementById('next-button').addEventListener('click', function () {
                    if (currentIndex < data.length - 1) {
                        currentIndex++;
                        updateSoal();
                    }
                });

                document.getElementById('prev-button').addEventListener('click', function () {
                    if (currentIndex > 0) {
                        currentIndex--;
                        updateSoal();
                    }
                });

                // Indicator navigation
                document.querySelectorAll('.soal-indicator').forEach(button => {
                    button.addEventListener('click', function () {
                        currentIndex = parseInt(this.getAttribute('data-index'));
                        updateSoal();
                    });
                });

                // Radio button change event
                document.querySelectorAll('input[type="radio"]').forEach(radio => {
                    radio.addEventListener('change', function () {
                        saveAnswersToLocalStorage();

                        // Update current indicator if it's the current question
                        const currentIndicator = document.querySelector(`.soal-indicator[data-index="${currentIndex}"]`);
                        if (currentIndicator && !currentIndicator.classList.contains('from-amber-500')) {
                            currentIndicator.classList.remove('bg-white', 'border-gray-300', 'text-gray-700');
                            currentIndicator.classList.add('bg-gradient-to-br', 'from-green-500', 'to-green-600', 'text-white');
                        }
                    });
                });

                // Form submit handler
                form.addEventListener('submit', function (e) {
                    if (formSubmitted) {
                        e.preventDefault();
                        return;
                    }

                    const unanswered = data.filter(soal => {
                        return !document.querySelector(`input[name="jawaban_${soal.id}"]:checked`);
                    }).length;

                    if (unanswered > 0 && !window.confirmSubmitConfirmed) {
                        e.preventDefault();
                        showUnansweredAlert(unanswered);
                        return;
                    }

                    formSubmitted = true;
                    localStorage.removeItem('ujian_answers_' + @json($jadwal->id));

                    // Disable submit button
                    const submitBtn = form.querySelector('button[type="submit"]');
                    if (submitBtn) {
                        submitBtn.disabled = true;
                        submitBtn.innerHTML = `
                                <svg class="animate-spin w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                                Mengirim Jawaban...
                            `;
                    }
                });

                function showUnansweredAlert(unanswered) {
                    const alertDiv = document.createElement('div');
                    alertDiv.className = 'fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50';
                    alertDiv.innerHTML = `
                            <div class="bg-white rounded-2xl shadow-xl max-w-md w-full p-6">
                                <div class="flex items-center space-x-3 mb-4">
                                    <div class="p-2 bg-amber-100 rounded-lg">
                                        <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.874-.833-2.644 0L4.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                                        </svg>
                                    </div>
                                    <h3 class="text-lg font-semibold text-gray-900">Masih Ada Soal Belum Terjawab</h3>
                                </div>
                                <p class="text-gray-600 mb-6">Masih ada <span class="font-semibold">${unanswered}</span> soal yang belum terjawab. Apakah Anda yakin ingin mengirim jawaban?</p>
                                <div class="flex justify-end space-x-3">
                                    <button type="button" onclick="closeAlert()"
                                        class="px-4 py-2 text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg font-medium transition-colors duration-200">
                                        Kembali
                                    </button>
                                    <button type="button" onclick="confirmSubmitNow()"
                                        class="px-4 py-2 bg-amber-600 hover:bg-amber-700 text-white rounded-lg font-medium transition-colors duration-200">
                                        Ya, Kirim Sekarang
                                    </button>
                                </div>
                            </div>
                        `;
                    document.body.appendChild(alertDiv);
                }

                window.closeAlert = function () {
                    const alertDiv = document.querySelector('.fixed.inset-0.bg-black');
                    if (alertDiv) {
                        alertDiv.remove();
                    }
                };

                window.confirmSubmitNow = function () {
                    window.confirmSubmitConfirmed = true;
                    closeAlert();
                    form.submit();
                };

                window.confirmSubmit = function () {
                    return true;
                };

                // Auto-save every 30 seconds
                setInterval(saveAnswersToLocalStorage, 30000);

                // Initial load
                loadAnswersFromLocalStorage();
                updateSoal();

                // Prevent page unload
                window.addEventListener('beforeunload', function (e) {
                    if (!formSubmitted) {
                        e.preventDefault();
                        e.returnValue = '';
                    }
                });

                // Initialize answered count
                updateAnsweredCount();
            });
        </script>
    </div>
@endsection
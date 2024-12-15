@extends('component.adminmaster')
@section('content')
    <!-- Content -->
    <div class="flex-1 ml-64 p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">UJIAN {{ $head->kodekelas }}</h1>
            <div class="flex items-center space-x-4">
                <span class="text-gray-700">{{ Auth::user()->name }} | {{ Auth::user()->level }}</span>
                <a href="{{ route('logout') }}" class="bg-red-500 text-white py-2 px-4 rounded">Logout</a>
            </div>
        </div>



        <!-- Main Dashboard Content -->
        <div class="grid grid-cols-1 gap-6">
            <!-- Teacher Data Table -->
            <div class="bg-gray-800 flex gap-5 pl-5 py-5 text-white">
                <div>
                    <h1 class="text-center">Jam</h1>
                    <div id="jam" class="bg-amber-500 p-3 text-black font-bold">00</div>
                </div>
                <div>
                    <h1 class="text-center">Menit</h1>
                    <div id="menit" class="bg-amber-500 p-3 text-black font-bold">00</div>
                </div>
                <div>
                    <h1 class="text-center">Detik</h1>
                    <div id="detik" class="bg-amber-500 p-3 text-black font-bold">00</div>
                </div>
            </div>

            <!-- Soal Pilihan Ganda -->
            <div id="soal-container">
                <form action="{{ route('posujian', ['id' => $kelas, 'mapel' => $mapel, 'jadwal' => $jadwal]) }}"
                    method="POST">
                    @csrf
                    <div id="soal-container" class="bg-white p-6 rounded-lg shadow-md">
                        <!-- Menampilkan soal pertama -->
                        {{-- <h2 class="text-xl font-bold mb-4" id="pertanyaan">{{ $data[0]->pertanyaan }}</h2> --}}
                        <!-- Ini akan diperbarui dengan JS -->

                        <div class="space-y-2">
                            @foreach ($data as $soal)
                                <div class="soal" data-id="{{ $soal->id }}" style="display: none;">
                                    <h2 class="text-xl font-bold mb-4" id="pertanyaan">{{ $soal->pertanyaan }}</h2>
                                    <input type="radio" name="jawaban_{{ $soal->id }}" value="A"
                                        id="a_{{ $soal->id }}" class="mr-2">
                                    <label id="a-text_{{ $soal->id }}" class="text-lg">{{ $soal->a }}</label>
                                    <br>
                                    <input type="radio" name="jawaban_{{ $soal->id }}" value="B"
                                        id="b_{{ $soal->id }}" class="mr-2">
                                    <label id="b-text_{{ $soal->id }}" class="text-lg">{{ $soal->b }}</label>
                                    <br>
                                    <input type="radio" name="jawaban_{{ $soal->id }}" value="C"
                                        id="c_{{ $soal->id }}" class="mr-2">
                                    <label id="c-text_{{ $soal->id }}" class="text-lg">{{ $soal->c }}</label>
                                    <br>
                                    <input type="radio" name="jawaban_{{ $soal->id }}" value="D"
                                        id="d_{{ $soal->id }}" class="mr-2">
                                    <label id="d-text_{{ $soal->id }}" class="text-lg">{{ $soal->d }}</label>
                                    <br>
                                </div>
                            @endforeach
                        </div>

                        <div class="flex justify-between mt-4">
                            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg">Submit</button>
                            <button id="prev-button" class="bg-gray-500 text-white px-4 py-2 rounded-lg"
                                disabled>Prev</button>
                            <button id="next-button" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Next</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const deadline = @json($deadline);
            const now = Math.floor(Date.now() / 1000); // Waktu sekarang dalam detik
            let remainingTime = deadline - now; // Sisa waktu dalam detik

            // Mengunci halaman agar tidak bisa ditutup/reload tanpa peringatan
            window.addEventListener('beforeunload', function(e) {
                // Menampilkan peringatan kepada pengguna
                e.preventDefault();
                e.returnValue = ''; // Beberapa browser memerlukan nilai ini untuk memunculkan prompt
                return ''; // Menjamin peringatan tetap muncul
            });

            // Event Listener untuk otomatis post jika reload/close
            window.addEventListener('unload', function() {
                const formData = new FormData(form);
                navigator.sendBeacon(form.action, formData);
            });

            // Timer Countdown
            function updateCountdown() {
                if (remainingTime <= 0) {
                    clearInterval(timerInterval);
                    localStorage.removeItem('deadline'); // Hapus jika waktu habis
                    alert('Waktu Habis!');
                    form.submit(); // Kirim otomatis jika waktu habis
                    return;
                }

                const jam = Math.floor(remainingTime / 3600);
                const menit = Math.floor((remainingTime % 3600) / 60);
                const detik = remainingTime % 60;

                document.getElementById('jam').textContent = jam.toString().padStart(2, '0');
                document.getElementById('menit').textContent = menit.toString().padStart(2, '0');
                document.getElementById('detik').textContent = detik.toString().padStart(2, '0');

                remainingTime--;
            }

            const timerInterval = setInterval(updateCountdown, 1000);
            updateCountdown();

            // Logika soal (Next dan Prev)
            const data = @json($data); // Soal dari PHP ke JS
            let currentIndex = 0;

            function updateSoal() {
                const allSoal = document.querySelectorAll('.soal');
                allSoal.forEach(soal => soal.style.display = 'none');
                document.querySelector(`.soal[data-id="${data[currentIndex].id}"]`).style.display = 'block';
                document.getElementById('prev-button').disabled = currentIndex === 0;
                document.getElementById('next-button').disabled = currentIndex === data.length - 1;
            }

            document.getElementById('next-button').addEventListener('click', function() {
                if (currentIndex < data.length - 1) {
                    currentIndex++;
                    updateSoal();
                }
            });

            document.getElementById('prev-button').addEventListener('click', function() {
                if (currentIndex > 0) {
                    currentIndex--;
                    updateSoal();
                }
            });

            updateSoal();
        });
    </script>
@endsection

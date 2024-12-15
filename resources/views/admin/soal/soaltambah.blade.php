@extends('component.adminmaster')
@section('content')
    <div class="flex-1 ml-64 p-6">
        <div class="grid grid-cols-1 gap-6 mb-6">
            <div class="bg-white p-6 rounded shadow">
                <h3 class="text-xl font-semibold">{{ isset($soal) ? 'Edit Soal' : 'Tambah Soal' }}</h3>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-lg p-6 mt-6">
            <form action="{{ route('possoal', ['id' => $kelas, 'mapel' => $mapel, 'jadwal' => $jadwal]) }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ isset($soal) ? $soal->id : '' }}">

                <!-- Pertanyaan -->
                <div class="mb-4">
                    <label for="pertanyaan" class="block text-gray-700 font-semibold">Pertanyaan</label>
                    <textarea id="pertanyaan" name="pertanyaan" required
                        class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-amber-500">{{ isset($soal) ? $soal->pertanyaan : '' }}</textarea>
                    @error('pertanyaan')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Pilihan Jawaban -->
                <div class="mb-4 flex space-x-4">
                    <div class="flex-1">
                        <label for="a" class="block text-gray-700 font-semibold">Pilihan A</label>
                        <input type="text" id="a" name="a" required
                            value="{{ isset($soal) ? $soal->a : '' }}"
                            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-amber-500">
                        @error('a')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="b" class="block text-gray-700 font-semibold">Pilihan B</label>
                        <input type="text" id="b" name="b" required
                            value="{{ isset($soal) ? $soal->b : '' }}"
                            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-amber-500">
                        @error('b')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mb-4 flex space-x-4">
                    <div class="flex-1">
                        <label for="c" class="block text-gray-700 font-semibold">Pilihan C</label>
                        <input type="text" id="c" name="c" required
                            value="{{ isset($soal) ? $soal->c : '' }}"
                            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-amber-500">
                        @error('c')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="d" class="block text-gray-700 font-semibold">Pilihan D</label>
                        <input type="text" id="d" name="d" required
                            value="{{ isset($soal) ? $soal->d : '' }}"
                            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-amber-500">
                        @error('d')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Kunci Jawaban -->
                <div class="mb-4">
                    <label for="kunci" class="block text-gray-700 font-semibold">Kunci Jawaban</label>
                    <select id="kunci" name="kunci" required
                        class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-amber-500">
                        <option value="">Pilih Jawaban yang Benar</option>
                        <option value="A" {{ isset($soal) && $soal->kunci == 'A' ? 'selected' : '' }}>A</option>
                        <option value="B" {{ isset($soal) && $soal->kunci == 'B' ? 'selected' : '' }}>B</option>
                        <option value="C" {{ isset($soal) && $soal->kunci == 'C' ? 'selected' : '' }}>C</option>
                        <option value="D" {{ isset($soal) && $soal->kunci == 'D' ? 'selected' : '' }}>D</option>
                    </select>
                    @error('kunci')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end gap-3">
                    <a href="{{ route('datasoal', ['id' => $kelas, 'mapel' => $mapel, 'jadwal' => $jadwal]) }}"
                        class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded font-semibold">Kembali</a>
                    <button type="submit"
                        class="bg-amber-500 hover:bg-amber-600 text-white px-6 py-2 rounded font-semibold">{{ isset($soal) ? 'Perbarui' : 'Tambah' }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection

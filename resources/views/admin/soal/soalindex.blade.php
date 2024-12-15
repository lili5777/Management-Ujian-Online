@extends('component.adminmaster')
@section('content')
    <!-- Content -->
    <div class="flex-1 ml-64 p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Data Soal Kelas {{ $head->kodekelas }}</h1>
            <div class="flex items-center space-x-4">
                <span class="text-gray-700">{{ Auth::user()->name }} | {{ Auth::user()->level }}</span>
                <a href="{{ route('logout') }}" class="bg-red-500 text-white py-2 px-4 rounded">Logout</a>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="my-10">
            <a href="{{ route('tambahsoal', ['id' => $kelas, 'mapel' => $mapel, 'jadwal' => $jadwal]) }}"
                class="bg-amber-500 hover:bg-amber-600 text-white  px-6 py-3 rounded shadow font-semibold">
                Tambah Soal
            </a>
        </div>

        <!-- Main Dashboard Content -->
        <div class="grid grid-cols-1 gap-6">
            <!-- Soal Data Table -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b text-left text-gray-700 font-semibold">NO</th>
                            <th class="py-2 px-4 border-b text-left text-gray-700 font-semibold">Pertanyaan</th>
                            <th class="py-2 px-4 border-b text-left text-gray-700 font-semibold">Pilihan A</th>
                            <th class="py-2 px-4 border-b text-left text-gray-700 font-semibold">Pilihan B</th>
                            <th class="py-2 px-4 border-b text-left text-gray-700 font-semibold">Pilihan C</th>
                            <th class="py-2 px-4 border-b text-left text-gray-700 font-semibold">Pilihan D</th>
                            <th class="py-2 px-4 border-b text-left text-gray-700 font-semibold">Kunci Jawaban</th>
                            <th class="py-2 px-4 border-b text-center text-gray-700 font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example Data Row -->
                        @foreach ($data as $index => $soal)
                            <tr class="hover:bg-gray-100">
                                <td class="py-2 px-4 border-b text-gray-700">{{ $index + 1 }}</td>
                                <td class="py-2 px-4 border-b text-gray-700 max-w-xs">
                                    <div class="truncate overflow-y-auto max-h-16" title="{{ $soal->pertanyaan }}">
                                        {{ Str::limit($soal->pertanyaan, 50) }}
                                    </div>
                                </td>
                                <td class="py-2 px-4 border-b text-gray-700">{{ $soal->a }}</td>
                                <td class="py-2 px-4 border-b text-gray-700">{{ $soal->b }}</td>
                                <td class="py-2 px-4 border-b text-gray-700">{{ $soal->c }}</td>
                                <td class="py-2 px-4 border-b text-gray-700">{{ $soal->d }}</td>
                                <td class="py-2 px-4 border-b text-gray-700 text-center">{{ $soal->kunci }}</td>
                                <td class="py-2 px-4 border-b text-center flex justify-center">
                                    <a href="{{ route('editsoal', ['id' => $kelas, 'mapel' => $mapel, 'jadwal' => $jadwal, 'soal' => $soal->id]) }}"
                                        class="text-blue-500 hover:text-blue-700 mx-2">Edit</a>

                                    <form
                                        action="{{ route('hapussoal', ['id' => $kelas, 'mapel' => $mapel, 'jadwal' => $jadwal, 'soal' => $soal->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 mx-2">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        <!-- Additional rows would be dynamically populated here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

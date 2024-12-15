@extends('component.adminmaster')
@section('content')
    <!-- Content -->
    <div class="flex-1 ml-64 p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Data Kelas</h1>
            <div class="flex items-center space-x-4">
                <span class="text-gray-700">{{ Auth::user()->name }} | {{ Auth::user()->level }}</span>
                <a href="{{ route('logout') }}" class="bg-red-500 text-white py-2 px-4 rounded">Logout</a>
            </div>
        </div>


        <!-- Stats Section -->
        {{-- <div class="my-10">
            <a href="{{ route('tambahkelas') }}"
                class="bg-amber-500 hover:bg-amber-600 text-white  px-6 py-3 rounded shadow  font-semibold">
                Tambah Kelas
            </a>
        </div> --}}

        <!-- Main Dashboard Content -->
        <div class="grid grid-cols-1 gap-6">
            <!-- Teacher Data Table -->
            <div class="bg-white rounded-lg shadow-lg p-6 ">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b text-left text-gray-700 font-semibold">NO</th>
                            <th class="py-2 px-4 border-b text-left text-gray-700 font-semibold">Nama</th>
                            <th class="py-2 px-4 border-b text-left text-gray-700 font-semibold">Jumlah Soal</th>
                            <th class="py-2 px-4 border-b text-left text-gray-700 font-semibold">Jawaban Benar</th>
                            <th class="py-2 px-4 border-b text-left text-gray-700 font-semibold">Jawaban Salah</th>
                            <th class="py-2 px-4 border-b text-left text-gray-700 font-semibold">Jawaban Kosong</th>
                            <th class="py-2 px-4 border-b text-left text-gray-700 font-semibold">Nilai</th>
                            {{-- <th class="py-2 px-4 border-b text-center text-gray-700 font-semibold">Aksi</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example Data Row -->
                        @if (Auth::user()->level == 'admin' || Auth::user()->level == 'guru')
                            @forelse ($data as $index => $d)
                                <tr class="hover:bg-gray-100">
                                    <td class="py-2 px-4 border-b text-gray-700">{{ $index + 1 }}</td>
                                    <td class="py-2 px-4 border-b text-gray-700">
                                        {{ $user->where('id', $d->id_user)->first()->name ?? 'User Tidak Ditemukan' }}
                                    </td>
                                    <td class="py-2 px-4 border-b text-gray-700">{{ $d->jumlah_soal }}</td>
                                    <td class="py-2 px-4 border-b text-gray-700">{{ $d->jawaban_benar }}</td>
                                    <td class="py-2 px-4 border-b text-gray-700">{{ $d->jawaban_salah }}</td>
                                    <td class="py-2 px-4 border-b text-gray-700">{{ $d->jawaban_kosong }}</td>
                                    <td class="py-2 px-4 border-b text-gray-700">{{ $d->skor }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="py-2 px-4 border-b text-center text-gray-700">Data tidak
                                        tersedia</td>
                                </tr>
                            @endforelse
                        @elseif (Auth::user()->level == 'siswa')
                            @if ($data && $data->id_user)
                                <tr class="hover:bg-gray-100">
                                    <td class="py-2 px-4 border-b text-gray-700">1</td>
                                    <td class="py-2 px-4 border-b text-gray-700">
                                        {{ $user->where('id', $data->id_user)->first()->name ?? 'User Tidak Ditemukan' }}
                                    </td>
                                    <td class="py-2 px-4 border-b text-gray-700">{{ $data->jumlah_soal }}</td>
                                    <td class="py-2 px-4 border-b text-gray-700">{{ $data->jawaban_benar }}</td>
                                    <td class="py-2 px-4 border-b text-gray-700">{{ $data->jawaban_salah }}</td>
                                    <td class="py-2 px-4 border-b text-gray-700">{{ $data->jawaban_kosong }}</td>
                                    <td class="py-2 px-4 border-b text-gray-700">{{ $data->skor }}</td>
                                </tr>
                            @else
                                <tr>
                                    <td colspan="7" class="py-2 px-4 border-b text-center text-gray-700">Tidak ada nilai
                                    </td>
                                </tr>
                            @endif
                        @endif


                        <!-- Additional rows would be dynamically populated here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

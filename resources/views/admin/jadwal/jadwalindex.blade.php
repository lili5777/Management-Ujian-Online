@extends('component.adminmaster')
@section('content')
    <!-- Content -->
    <div class="flex-1 ml-64 p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Data Jadwal Ujian Kelas {{ $head->kodekelas }}</h1>
            <div class="flex items-center space-x-4">
                <span class="text-gray-700">{{ Auth::user()->name }} | {{ Auth::user()->level }}</span>
                <a href="{{ route('logout') }}" class="bg-red-500 text-white py-2 px-4 rounded">Logout</a>
            </div>
        </div>


        <!-- Stats Section -->
        @if (Auth::user()->level == 'admin' || Auth::user()->level == 'guru')
            <div class="my-10">
                <a href="{{ route('tambahjadwal', ['id' => $kelas, 'mapel' => $mapel]) }}"
                    class="bg-amber-500 hover:bg-amber-600 text-white  px-6 py-3 rounded shadow  font-semibold">
                    Tambah Jadwal
                </a>
            </div>
        @endif

        <!-- Main Dashboard Content -->
        <div class="grid grid-cols-1 gap-6">
            <!-- Teacher Data Table -->
            <div class="bg-white rounded-lg shadow-lg p-6 ">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b text-left text-gray-700 font-semibold">NO</th>
                            <th class="py-2 px-4 border-b text-left text-gray-700 font-semibold">Jenis Ujian</th>
                            <th class="py-2 px-4 border-b text-left text-gray-700 font-semibold">Tanggal</th>
                            <th class="py-2 px-4 border-b text-center text-gray-700 font-semibold">Jam</th>
                            <th class="py-2 px-4 border-b text-center text-gray-700 font-semibold">Menit</th>
                            <th class="py-2 px-4 border-b text-center text-gray-700 font-semibold">Soal</th>
                            <th class="py-2 px-4 border-b text-left text-gray-700 font-semibold">Hasil Ujian</th>
                            @if (Auth::user()->level == 'admin' || Auth::user()->level == 'guru')
                                <th class="py-2 px-4 border-b text-center text-gray-700 font-semibold">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example Data Row -->
                        @foreach ($data as $index => $d)
                            <tr class="hover:bg-gray-100">
                                <td class="py-2 px-4 border-b text-gray-700">{{ $index + 1 }}</td>
                                <td class="py-2 px-4 border-b text-gray-700">
                                    {{ $d->jenis_ujian }}</td>
                                <td class="py-2 px-4 border-b text-gray-700">
                                    {{ $d->tgl_ujian }}
                                </td>
                                <td class="py-2 px-4 border-b text-gray-700">
                                    {{ $d->jam }}
                                </td>
                                <td class="py-2 px-4 border-b text-gray-700">
                                    {{ $d->menit }}
                                </td>
                                <td class="py-2 px-4 border-b text-gray-700">
                                    @php
                                        // Cek apakah pengguna sudah mengerjakan soal
                                        $sudahMengerjakan = \App\Models\Hasil::where('id_user', Auth::id())
                                            ->where('id_kelas', $kelas)
                                            ->where('id_mapelkelas', $mapel)
                                            ->where('id_jadwal', $d->id)
                                            ->exists();
                                    @endphp
                                    @if (Auth::user()->level == 'admin' || Auth::user()->level == 'guru')
                                        <a href="{{ route('datasoal', ['id' => $kelas, 'mapel' => $mapel, 'jadwal' => $d->id]) }}"
                                            class="bg-gray-700 hover:bg-amber-600 text-white px-10 py-1 rounded shadow-md font-semibold">
                                            Buat Soal
                                        </a>
                                    @elseif ($sudahMengerjakan)
                                        <a href="#"
                                            class="bg-blue-500 text-white px-10 py-1 rounded shadow-md font-semibold">
                                            Selesai
                                        </a>
                                    @elseif ($d->tgl_ujian == $now->toDateString())
                                        <a href="{{ route('ujian', ['id' => $kelas, 'mapel' => $mapel, 'jadwal' => $d->id]) }}"
                                            class="bg-green-500 hover:bg-amber-600 text-white px-10 py-1 rounded shadow-md font-semibold">
                                            Kerjakan
                                        </a>
                                    @elseif ($d->tgl_ujian > $now->toDateString())
                                        <a href="#"
                                            class="bg-gray-700  text-white px-10 py-1 rounded shadow-md font-semibold">
                                            Belum Dibuka
                                        </a>
                                    @else
                                        <a href="#"
                                            class="bg-red-500  text-white px-10 py-1 rounded shadow-md font-semibold">
                                            Sudah Lewat
                                        </a>
                                    @endif
                                </td>
                                <td class="py-2 px-4 border-b text-gray-700">
                                    @if (Auth::user()->level == 'admin' || Auth::user()->level == 'guru')
                                        <a href="{{ route('datahasil', ['id' => $kelas, 'mapel' => $mapel, 'jadwal' => $d->id]) }}"
                                            class=" bg-gray-700 hover:bg-amber-600 text-white  px-10 py-1 rounded shadow-md  font-semibold">
                                            Lihat Hasil
                                        </a>
                                    @else
                                        <a href="{{ route('hasilujian', ['id' => $kelas, 'mapel' => $mapel, 'jadwal' => $d->id]) }}"
                                            class=" bg-gray-700 hover:bg-amber-600 text-white  px-10 py-1 rounded shadow-md  font-semibold">
                                            Lihat Hasil
                                        </a>
                                    @endif
                                </td>
                                @if (Auth::user()->level == 'admin' || Auth::user()->level == 'guru')
                                    <td class="py-2 px-4 border-b text-center flex justify-center">
                                        <a href="{{ route('editjadwal', ['id' => $kelas, 'mapel' => $mapel, 'jadwal' => $d->id]) }}"
                                            class="text-blue-500 hover:text-blue-700 mx-2">Edit</a>
                                        <form
                                            action="{{ route('hapusjadwal', ['id' => $kelas, 'mapel' => $mapel, 'jadwal' => $d->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-500 hover:text-red-700 mx-2">Hapus</button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach

                        <!-- Additional rows would be dynamically populated here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

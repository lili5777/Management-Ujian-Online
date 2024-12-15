@extends('component.adminmaster')
@section('content')
    <div class="flex-1 ml-64 p-6">
        <!-- Header -->
        @if (isset($head) && $head)
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold">Data Mapel Kelas {{ $head->kodekelas }}</h1>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-700">{{ Auth::user()->name }} | {{ Auth::user()->level }}</span>
                    <a href="{{ route('logout') }}" class="bg-red-500 text-white py-2 px-4 rounded">Logout</a>
                </div>
            </div>
        @endif

        <!-- Jika Tidak Ada Kelas -->
        @if (!isset($head))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ $message }}</span>
            </div>
        @else
            <!-- Button Tambah Mapel -->
            @if (Auth::user()->level == 'admin')
                <div class="my-10">
                    <a href="{{ route('tambahmapelkelas', $kelas) }}"
                        class="bg-amber-500 hover:bg-amber-600 text-white px-6 py-3 rounded shadow font-semibold">
                        Tambah Mapel Kelas
                    </a>
                </div>
            @endif

            <!-- Main Dashboard Content -->
            <div class="grid grid-cols-1 gap-6">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    @if ($data->isEmpty())
                        <p class="text-gray-500">Tidak ada data mapel kelas tersedia.</p>
                    @else
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 border-b text-left text-gray-700 font-semibold">NO</th>
                                    <th class="py-2 px-4 border-b text-left text-gray-700 font-semibold">Nama Mapel</th>
                                    <th class="py-2 px-4 border-b text-left text-gray-700 font-semibold">Pengajar</th>
                                    <th class="py-2 px-4 border-b text-left text-gray-700 font-semibold">Materi</th>
                                    <th class="py-2 px-4 border-b text-left text-gray-700 font-semibold">Jadwal Ujian</th>
                                    {{-- <th class="py-2 px-4 border-b text-left text-gray-700 font-semibold">Hasil Ujian</th> --}}
                                    @if (Auth::user()->level == 'admin')
                                        <th class="py-2 px-4 border-b text-center text-gray-700 font-semibold">Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $index => $d)
                                    <tr class="hover:bg-gray-100">
                                        <td class="py-2 px-4 border-b text-gray-700">{{ $index + 1 }}</td>
                                        <td class="py-2 px-4 border-b text-gray-700">
                                            {{ $mapel->where('id', $d->namamapel)->first()->namamapel }}</td>
                                        <td class="py-2 px-4 border-b text-gray-700">
                                            {{ $guru->where('id', $d->pengajar)->first()->name }}</td>
                                        <td class="py-2 px-4 border-b text-gray-700">
                                            @if (Auth::user()->id == $d->pengajar || Auth::user()->level == 'admin' || Auth::user()->level == 'siswa')
                                                <a href="{{ route('datamateri', ['id' => $kelas, 'mapel' => $d->id]) }}"
                                                    class=" bg-gray-700 hover:bg-amber-600 text-white  px-10 py-1 rounded shadow-md  font-semibold">
                                                    {{ $materi->where('id_mapelkelas', $d->id)->count() }}
                                                </a>
                                            @else
                                                <p>-</p>
                                            @endif
                                        </td>
                                        <td class="py-2 px-4 border-b text-gray-700">
                                            @if (Auth::user()->level == 'admin' || Auth::user()->level == 'guru')
                                                @if (Auth::user()->id == $d->pengajar || Auth::user()->level == 'admin')
                                                    <a href="{{ route('datajadwal', ['id' => $kelas, 'mapel' => $d->id]) }}"
                                                        class=" bg-gray-700 hover:bg-amber-600 text-white  px-10 py-1 rounded shadow-md  font-semibold">
                                                        Create
                                                    </a>
                                                @else
                                                    <p>-</p>
                                                @endif
                                            @else
                                                <a href="{{ route('datajadwal', ['id' => $kelas, 'mapel' => $d->id]) }}"
                                                    class=" bg-gray-700 hover:bg-amber-600 text-white  px-10 py-1 rounded shadow-md  font-semibold">
                                                    Room
                                                </a>
                                            @endif
                                        </td>
                                        {{-- <td class="py-2 px-4 border-b text-gray-700">
                                            <a href="#"
                                                class=" bg-gray-700 hover:bg-amber-600 text-white  px-10 py-1 rounded shadow-md  font-semibold">
                                                Lihat Hasil
                                            </a>
                                        </td> --}}
                                        </td>
                                        @if (Auth::user()->level == 'admin')
                                            <td class="py-2 px-4 border-b text-center flex justify-center">
                                                <a href="{{ route('editmapelkelas', ['id' => $d->id, 'kelas' => $kelas]) }}"
                                                    class="text-blue-500 hover:text-blue-700 mx-2">Edit</a>
                                                <form
                                                    action="{{ route('hapusmapelkelas', ['id' => $d->id, 'kelas' => $kelas]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="text-red-500 hover:text-red-700 mx-2">Hapus</button>
                                                </form>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        @endif
    </div>
@endsection

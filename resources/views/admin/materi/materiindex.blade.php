@extends('component.adminmaster')
@section('content')
    <!-- Content -->
    <div class="flex-1 ml-64 p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Data Materi Kelas {{ $head->kodekelas }}</h1>
            <div class="flex items-center space-x-4">
                <span class="text-gray-700">{{ Auth::user()->name }} | {{ Auth::user()->level }}</span>
                <a href="{{ route('logout') }}" class="bg-red-500 text-white py-2 px-4 rounded">Logout</a>
            </div>
        </div>


        <!-- Stats Section -->
        @if (Auth::user()->level == 'admin' || Auth::user()->level == 'guru')
            <div class="my-10">
                <a href="{{ route('tambahmateri', ['id' => $kelas, 'mapel' => $mapel]) }}"
                    class="bg-amber-500 hover:bg-amber-600 text-white  px-6 py-3 rounded shadow  font-semibold">
                    Tambah Materi
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
                            <th class="py-2 px-4 border-b text-left text-gray-700 font-semibold">Materi</th>
                            <th class="py-2 px-4 border-b text-left text-gray-700 font-semibold">File</th>
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
                                    {{ $d->namamateri }}</td>
                                <td class="py-2 px-4 border-b text-gray-700">
                                    <a href="{{ asset('dokumen/' . $d->file) }}" target="_blank"
                                        class=" bg-gray-700 hover:bg-amber-600 text-white  px-10 py-1 rounded shadow-md  font-semibold">
                                        Lihat
                                    </a>
                                </td>
                                @if (Auth::user()->level == 'admin' || Auth::user()->level == 'guru')
                                    <td class="py-2 px-4 border-b text-center flex justify-center">
                                        <a href="{{ route('editmateri', ['id' => $kelas, 'mapel' => $mapel, 'materi' => $d->id]) }}"
                                            class="text-blue-500 hover:text-blue-700 mx-2">Edit</a>

                                        <form
                                            action="{{ route('hapusmateri', ['id' => $kelas, 'mapel' => $mapel, 'materi' => $d->id]) }}"
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

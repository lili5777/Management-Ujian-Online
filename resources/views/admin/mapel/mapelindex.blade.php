@extends('component.adminmaster')
@section('content')
    <!-- Content -->
    <div class="flex-1 ml-64 p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Data Mapel</h1>
            <div class="flex items-center space-x-4">
                <span class="text-gray-700">{{ Auth::user()->name }} | {{ Auth::user()->level }}</span>
                <a href="{{ route('logout') }}" class="bg-red-500 text-white py-2 px-4 rounded">Logout</a>
            </div>
        </div>

        @if (Auth::user()->level == 'admin')
            <!-- Stats Section -->
            <div class="my-10">
                <a href="{{ route('tambahmapel') }}"
                    class="bg-amber-500 hover:bg-amber-600 text-white  px-6 py-3 rounded shadow  font-semibold">
                    Tambah Data
                </a>
            </div>
        @endif

        <!-- Main Dashboard Content -->
        <div class="grid grid-cols-1 gap-6">
            <!-- Teacher Data Table -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b text-left text-gray-700 font-semibold">NO</th>
                            <th class="py-2 px-4 border-b text-left text-gray-700 font-semibold">KODE</th>
                            <th class="py-2 px-4 border-b text-left text-gray-700 font-semibold">Nama Mapel</th>
                            @if (Auth::user()->level == 'admin')
                                <th class="py-2 px-4 border-b text-center text-gray-700 font-semibold">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example Data Row -->
                        @foreach ($data as $index => $d)
                            <tr class="hover:bg-gray-100">
                                <td class="py-2 px-4 border-b text-gray-700">{{ $index + 1 }}</td>
                                <td class="py-2 px-4 border-b text-gray-700">{{ $d->kodemapel }}</td>
                                <td class="py-2 px-4 border-b text-gray-700">{{ $d->namamapel }}</td>
                                @if (Auth::user()->level == 'admin')
                                    <td class="py-2 px-4 border-b text-center flex justify-center">
                                        <a href="{{ route('editmapel', $d->id) }}"
                                            class="text-blue-500 hover:text-blue-700 mx-2">Edit</a>
                                        <form action="{{ route('hapusmapel', $d->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-500 hover:text-red-700 mx-2">Hapus</button>
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

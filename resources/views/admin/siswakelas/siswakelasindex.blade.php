@extends('component.adminmaster')
@section('content')
    <!-- Content -->
    <div class="flex-1 ml-64 p-6">
        <!-- Header -->
        @if (isset($head) && $head)
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold">Data Siswa Kelas {{ $head->kodekelas }}</h1>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-700">{{ Auth::user()->name }} | {{ Auth::user()->level }}</span>
                    <a href="{{ route('logout') }}" class="bg-red-500 text-white py-2 px-4 rounded">Logout</a>
                </div>
            </div>
        @endif

        <!-- Jika Tidak Ada Kelas -->
        @if (!isset($head))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
                <span class="block sm:inline">{{ $message }}</span>
            </div>
        @else
            <!-- Stats Section -->
            @if (Auth::user()->level == 'admin' || Auth::user()->level == 'guru')
                <div class="my-10">
                    <a href="{{ route('tambahsiswakelas', $kelas) }}"
                        class="bg-amber-500 hover:bg-amber-600 text-white px-6 py-3 rounded shadow font-semibold">
                        Tambah Siswa
                    </a>
                </div>
            @endif

            <!-- Main Dashboard Content -->
            <div class="grid grid-cols-1 gap-6">
                <!-- Teacher Data Table -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    @if ($data->isEmpty())
                        <p class="text-gray-500">Tidak ada data siswa kelas tersedia.</p>
                    @else
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 border-b text-left text-gray-700 font-semibold">NO</th>
                                    <th class="py-2 px-4 border-b text-left text-gray-700 font-semibold">NIS</th>
                                    <th class="py-2 px-4 border-b text-left text-gray-700 font-semibold">Nama siswa</th>
                                    @if (Auth::user()->level == 'admin' || Auth::user()->level == 'guru')
                                        <th class="py-2 px-4 border-b text-center text-gray-700 font-semibold">Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $index => $d)
                                    <tr class="hover:bg-gray-100">
                                        <td class="py-2 px-4 border-b text-gray-700">{{ $index + 1 }}</td>
                                        <td class="py-2 px-4 border-b text-gray-700">
                                            {{ $siswa->where('id', $d->siswa)->first()->nis ?? '-' }}</td>
                                        <td class="py-2 px-4 border-b text-gray-700">
                                            {{ $siswa->where('id', $d->siswa)->first()->name ?? '-' }}</td>
                                        @if (Auth::user()->level == 'admin' || Auth::user()->level == 'guru')
                                            <td class="py-2 px-4 border-b text-center flex justify-center">
                                                <a href="{{ route('editsiswakelas', ['id' => $d->id, 'kelas' => $kelas]) }}"
                                                    class="text-blue-500 hover:text-blue-700 mx-2">Edit</a>
                                                <form action="{{ route('hapussiswakelas', ['id' => $d->id, 'kelas' => $kelas]) }}"
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

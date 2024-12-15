@extends('component.adminmaster')
@section('content')
    <div class="flex-1 ml-64 p-6">
        <div class="grid grid-cols-1 gap-6 mb-6">
            <div class="bg-white p-6 rounded shadow">
                <h3 class="text-xl font-semibold">{{ isset($user) ? 'Edit Data Mapel' : 'Tambah Data Mapel' }}</h3>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-lg p-6 mt-6">
            <form action="{{ route('posmapel') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ isset($user) ? $user->id : '' }}">
                <div class="mb-4 flex space-x-4">
                    <div class="flex-1">
                        <label for="kode" class="block text-gray-700 font-semibold">KODE</label>
                        <input type="text" id="kode" name="kode" required
                            value="{{ isset($user) ? $user->kodemapel : '' }}"
                            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-amber-500">
                        @error('kode')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="nama" class="block text-gray-700 font-semibold">Nama Mapel</label>
                        <input type="text" id="nama" name="nama" required
                            value="{{ isset($user) ? $user->namamapel : '' }}"
                            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-amber-500">
                        @error('mapel')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-end gap-3">
                    <a href="{{ route('datamapel') }}"
                        class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded font-semibold">Kembali</a>
                    <button type="submit"
                        class="bg-amber-500 hover:bg-amber-600 text-white px-6 py-2 rounded font-semibold">{{ isset($user) ? 'Perbarui' : 'Tambah' }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection

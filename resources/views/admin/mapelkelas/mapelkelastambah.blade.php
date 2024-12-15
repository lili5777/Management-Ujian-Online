@extends('component.adminmaster')
@section('content')
    <div class="flex-1 ml-64 p-6">
        <div class="grid grid-cols-1 gap-6 mb-6">
            <div class="bg-white p-6 rounded shadow">
                <h3 class="text-xl font-semibold">{{ isset($user) ? 'Edit Mapel Kelas' : 'Tambah Mapel Kelas' }}</h3>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-lg p-6 mt-6">
            <form action="{{ route('posmapelkelas', $kelass) }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ isset($user) ? $user->id : '' }}">
                <input type="hidden" name="id_kelas" value="{{ $kelass }}">
                <div class="mb-4 flex space-x-4">
                    <div class="flex-1">
                        <label for="mapel" class="block text-gray-700 font-semibold">Wali Kelas</label>
                        <select id="mapel" name="mapel" required
                            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-amber-500">
                            <option value="">Mata Pelajaran</option>
                            @foreach ($mapel as $a)
                                <option value="{{ $a->id }}"
                                    {{ isset($user) && $user->namamapel == $a->id ? 'selected' : '' }}>
                                    {{ $a->namamapel }}
                                </option>
                            @endforeach
                        </select>
                        @error('kode')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="wali" class="block text-gray-700 font-semibold">Pengajar</label>
                        <select id="wali" name="wali" required
                            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-amber-500">
                            <option value="">Pengajar</option>
                            @foreach ($wali as $guru)
                                <option value="{{ $guru->id }}"
                                    {{ isset($user) && $user->pengajar == $guru->id ? 'selected' : '' }}>
                                    {{ $guru->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="flex justify-end gap-3">
                    <a href="{{ route('datamapelkelas', $kelass) }}"
                        class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded font-semibold">Kembali</a>
                    <button type="submit"
                        class="bg-amber-500 hover:bg-amber-600 text-white px-6 py-2 rounded font-semibold">{{ isset($user) ? 'Perbarui' : 'Tambah' }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection

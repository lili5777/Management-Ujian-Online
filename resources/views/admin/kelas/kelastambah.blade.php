@extends('component.adminmaster')
@section('content')
    <div class="flex-1 ml-64 p-6">
        <div class="grid grid-cols-1 gap-6 mb-6">
            <div class="bg-white p-6 rounded shadow">
                <h3 class="text-xl font-semibold">{{ isset($user) ? 'Edit Data Kelas' : 'Tambah Data Kelas' }}</h3>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-lg p-6 mt-6">
            <form action="{{ route('poskelas') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ isset($user) ? $user->id : '' }}">
                <div class="mb-4 flex space-x-4">
                    <div class="flex-1">
                        <label for="kodekelas" class="block text-gray-700 font-semibold">Kode Kelas</label>
                        <input type="text" id="kodekelas" name="kodekelas" required
                            value="{{ isset($user) ? $user->kodekelas : '' }}"
                            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-amber-500">
                        @error('kode')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="namakelas" class="block text-gray-700 font-semibold">Nama Kelas</label>
                        <input type="text" id="namakelas" name="namakelas" required
                            value="{{ isset($user) ? $user->namakelas : '' }}"
                            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-amber-500">
                        @error('kelas')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-4">
                    <label for="wali" class="block text-gray-700 font-semibold">Wali Kelas</label>
                    <select id="wali" name="wali" required
                        class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-amber-500">
                        <option value="">Wali Kelas</option>
                        @foreach ($wali as $guru)
                            <option value="{{ $guru->id }}"
                                {{ isset($user) && $user->wali == $guru->id ? 'selected' : '' }}>
                                {{ $guru->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('wali')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex justify-end gap-3">
                    <a href="{{ route('datakelas') }}"
                        class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded font-semibold">Kembali</a>
                    <button type="submit"
                        class="bg-amber-500 hover:bg-amber-600 text-white px-6 py-2 rounded font-semibold">{{ isset($user) ? 'Perbarui' : 'Tambah' }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection

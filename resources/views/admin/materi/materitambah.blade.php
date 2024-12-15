@extends('component.adminmaster')
@section('content')
    <div class="flex-1 ml-64 p-6">
        <div class="grid grid-cols-1 gap-6 mb-6">
            <div class="bg-white p-6 rounded shadow">
                <h3 class="text-xl font-semibold">{{ isset($user) ? 'Edit Materi' : 'Tambah Materi' }}</h3>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-lg p-6 mt-6">
            <form action="{{ route('posmateri', ['id' => $kelas, 'mapel' => $mapel]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ isset($user) ? $user->id : '' }}">
                <div class="mb-4 flex space-x-4">
                    <div class="flex-1">
                        <label for="namamateri" class="block text-gray-700 font-semibold">Nama Materi</label>
                        <input type="text" id="namamateri" name="namamateri" required
                            value="{{ isset($user) ? $user->namamateri : '' }}"
                            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-amber-500">
                        @error('kode')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="file" class="block text-gray-700 font-semibold">File</label>
                        <input type="file" id="file" name="file" value="{{ isset($user) ? $user->file : '' }}"
                            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-amber-500">
                        @if (isset($user) && $user->file)
                            <p class="text-sm text-gray-500 mt-2">File saat ini: <a
                                    href="{{ asset('dokumen/' . $user->file) }}" target="_blank"
                                    class="text-blue-500 underline">Lihat File</a></p>
                        @endif
                    </div>
                </div>
                <div class="flex justify-end gap-3">
                    <a href="{{ route('datamateri', ['id' => $kelas, 'mapel' => $mapel]) }}"
                        class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded font-semibold">Kembali</a>
                    <button type="submit"
                        class="bg-amber-500 hover:bg-amber-600 text-white px-6 py-2 rounded font-semibold">{{ isset($user) ? 'Perbarui' : 'Tambah' }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection

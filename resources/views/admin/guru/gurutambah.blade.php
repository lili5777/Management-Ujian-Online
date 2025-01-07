@extends('component.adminmaster')
@section('content')
    <div class="flex-1 ml-64 p-6">
        <div class="grid grid-cols-1 gap-6 mb-6">
            <div class="bg-white p-6 rounded shadow">
                <h3 class="text-xl font-semibold">{{ isset($user) ? 'Edit Data Guru' : 'Tambah Data Guru' }}</h3>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-lg p-6 mt-6">
            <form action="{{ route('posguru') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ isset($user) ? $user->id : '' }}">
                <div class="mb-4 flex space-x-4">
                    <div class="flex-1">
                        <label for="nip" class="block text-gray-700 font-semibold">NIP</label>
                        <input type="text" id="nip" name="nis" required
                            value="{{ isset($user) ? $user->nis : '' }}"
                            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-amber-500">
                        @error('nis')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="name" class="block text-gray-700 font-semibold">Nama</label>
                        <input type="text" id="name" name="name" required
                            value="{{ isset($user) ? $user->name : '' }}"
                            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-amber-500">
                    </div>
                </div>
                <div class="mb-4 flex space-x-4">
                    <div class="flex-1">
                        <label for="username" class="block text-gray-700 font-semibold">Username</label>
                        <input type="text" id="username" name="username" required
                            value="{{ isset($user) ? $user->username : '' }}"
                            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-amber-500">
                        @error('username')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex-1">
                        <label for="jekel" class="block text-gray-700 font-semibold">Jenis Kelamin</label>
                        <select id="jekel" name="jekel" required
                            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-amber-500">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="l" {{ isset($user) && $user->jekel == 'l' ? 'selected' : '' }}>Laki-laki
                            </option>
                            <option value="p" {{ isset($user) && $user->jekel == 'p' ? 'selected' : '' }}>Perempuan
                            </option>
                        </select>
                    </div>
                </div>
                <div class="mb-4 relative">
                    <label for="password" class="block text-gray-700 font-semibold">Password</label>
                    <input type="password" id="password" name="password" 
                        {{ isset($user) ? '' : 'required' }}
                        placeholder="{{ isset($user) ? 'Kosongkan jika tidak ingin mengubah password' : '' }}"
                        class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-amber-500">
                    <span class="absolute right-3 top-9 cursor-pointer" onclick="togglePassword()">
                        <!-- Ikon Mata (SVG atau Font Awesome) -->
                        <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path
                                d="M10 3C5.555 3 2.034 6.234.327 10.57a1.028 1.028 0 0 0 0 .86C2.034 13.766 5.555 17 10 17c4.445 0 7.966-3.234 9.673-6.57a1.028 1.028 0 0 0 0-.86C17.966 6.234 14.445 3 10 3zm0 12c-3.294 0-6.327-2.49-8-5 1.673-2.51 4.706-5 8-5s6.327 2.49 8 5c-1.673 2.51-4.706 5-8 5zm0-2a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                        </svg>
                    </span>
                </div>
                <div class="mb-4">
                    <label for="alamat" class="block text-gray-700 font-semibold">Alamat</label>
                    <textarea id="alamat" name="alamat" required
                        class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-amber-500">{{ isset($user) ? $user->alamat : '' }}</textarea>
                </div>
                <div class="flex justify-end gap-3">
                    <a href="{{ route('dataguru') }}"
                        class="bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded font-semibold">Kembali</a>
                    <button type="submit"
                        class="bg-amber-500 hover:bg-amber-600 text-white px-6 py-2 rounded font-semibold">{{ isset($user) ? 'Perbarui' : 'Tambah' }}</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById("password");
            const eyeIcon = document.getElementById("eyeIcon");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.add("text-amber-500"); // Ubah warna ikon saat aktif
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.remove("text-amber-500");
            }
        }
    </script>
@endsection

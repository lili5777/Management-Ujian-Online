@extends('component.master')
@section('judul', 'login')
@section('content')
    <div class="min-h-screen flex items-center justify-center bg-cover bg-center"
        style="background-image: url('{{ asset('gambar/bg.jpg') }}')">
        {{-- <div class="absolute top-0 left-0 p-4 text-gray-700">
            <h1 class="text-lg font-bold">Angie</h1>
            <p class="mt-1 text-sm">Ujian Online</p>
        </div> --}}

        <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-sm">
            <h2 class="text-xl font-bold text-center mb-4">Login</h2>
            <p class="text-center mb-4 text-gray-600 text-sm">Silahkan login terlebih dahulu</p>

            <!-- Login Form -->
            <form action="{{ route('proses_login') }}" method="POST" id="logForm">
    @csrf
    <div>
        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
        <input type="text" id="username" name="username"
               class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-400"
               placeholder="example" value="{{ old('username') }}">
        
        <!-- Menampilkan pesan error jika username tidak valid -->
        @error('username')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" id="password" name="password"
               class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-400"
               placeholder="********">
        
        <!-- Menampilkan pesan error jika password tidak valid -->
        @error('password')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div><br>

    <button type="submit" class="w-full bg-amber-500 text-white py-2 rounded-lg hover:bg-amber-600">Sign in</button>

    <!-- Menampilkan pesan error umum untuk login gagal -->
    @if ($errors->has('login_gagal'))
        <div class="text-red-500 text-center mt-4">
            {{ $errors->first('login_gagal') }}
        </div>
    @endif
</form>

        </div>

        <div class="absolute top-0 right-0 p-4">
            <h1 class="bg-amber-500 text-white py-2 px-4 rounded-lg hover:bg-amber-600">Ujian Online</h1>
        </div>

        <div class="absolute bottom-0 text-center w-full p-4 text-gray-400 text-sm">
            <p>Copyright @angie 2024 | <a href="#" class="text-gray-500 hover:underline">Privacy Policy</a></p>
        </div>
    </div>
@endsection

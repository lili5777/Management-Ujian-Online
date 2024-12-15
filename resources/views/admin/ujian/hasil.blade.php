@extends('component.adminmaster')

@section('content')
    <!-- Content -->
    <div class="flex-1 ml-64 p-6 bg-gray-50">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-4xl font-semibold text-gray-800">UJIAN {{ $head->kodekelas }}</h1>
            <div class="flex items-center space-x-4">
                <span class="text-gray-700 font-medium">{{ Auth::user()->name }} | {{ Auth::user()->level }}</span>
                <a href="{{ route('logout') }}" class="bg-red-500 text-white py-2 px-4 rounded-lg shadow hover:bg-red-600 transition ease-in-out duration-300">Logout</a>
            </div>
        </div>

        <!-- Main Dashboard Content -->
        <div class="grid grid-cols-1 gap-6">
            <!-- Teacher Data Table -->
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Hasil Ujian</h2>
                <div class="space-y-3">
                    <div class="flex justify-between text-lg font-medium text-gray-700">
                        <span>Jumlah Soal:</span>
                        <span class="text-gray-900">{{ $hasil->jumlah_soal }}</span>
                    </div>
                    <div class="flex justify-between text-lg font-medium text-gray-700">
                        <span>Jawaban Benar:</span>
                        <span class="text-green-500">{{ $hasil->jawaban_benar }}</span>
                    </div>
                    <div class="flex justify-between text-lg font-medium text-gray-700">
                        <span>Jawaban Salah:</span>
                        <span class="text-red-500">{{ $hasil->jawaban_salah }}</span>
                    </div>
                    <div class="flex justify-between text-lg font-medium text-gray-700">
                        <span>Jawaban Kosong:</span>
                        <span class="text-yellow-500">{{ $hasil->jawaban_kosong }}</span>
                    </div>
                    <div class="flex justify-between text-lg font-medium text-gray-700">
                        <span>Skor:</span>
                        <span class="text-blue-600">{{ $hasil->skor }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

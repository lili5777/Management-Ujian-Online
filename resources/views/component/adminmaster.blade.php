<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <!-- Main Container -->
    <div class="min-h-screen flex">
        <!-- Sidebar (Fixed) -->
        <aside class="w-64 bg-gray-800 text-white fixed inset-y-0 left-0 overflow-y-auto">
            <div class="p-6">
                <h2 class="text-2xl font-bold">Headstart</h2>
            </div>
            <nav class="space-y-2 p-6">
                <!-- Semua level bisa mengakses Dashboard -->
                <a href="{{ route('masuk') }}" class="block py-2 px-4 hover:bg-amber-500 rounded">Dashboard</a>

                @if (Auth::user()->level == 'admin')
                    <!-- Menu yang hanya bisa diakses oleh admin -->
                    <a href="{{ route('dataguru') }}" class="block py-2 px-4 hover:bg-amber-500 rounded">Data Guru</a>
                @endif

                @if (Auth::user()->level == 'admin' || Auth::user()->level == 'guru')
                    <!-- Menu yang bisa diakses oleh admin dan guru -->
                    <a href="{{ route('datasiswa') }}" class="block py-2 px-4 hover:bg-amber-500 rounded">Data Siswa</a>
                @endif

                @if (Auth::user()->level == 'admin' || Auth::user()->level == 'guru')
                    <!-- Menu yang bisa diakses oleh admin, guru, dan siswa -->
                    <a href="{{ route('datamapel') }}" class="block py-2 px-4 hover:bg-amber-500 rounded">Data Mapel</a>
                    <a href="{{ route('datakelas') }}" class="block py-2 px-4 hover:bg-amber-500 rounded">Kelas</a>
                @endif

                @if (Auth::user()->level == 'siswa')
                    <!-- Menu yang bisa diakses oleh admin, guru, dan siswa -->
                    <a href="{{ route('daftarsiswa') }}" class="block py-2 px-4 hover:bg-amber-500 rounded">Daftar
                        Siswa</a>
                    <a href="{{ route('showRoomKelas') }}"
                        class="block py-2 px-4 hover:bg-amber-500 rounded">Room Kelas</a>
                @endif


                <!-- Menu logout yang bisa diakses oleh semua level -->
                <a href="{{ route('logout') }}" class="block py-2 px-4 hover:bg-red-500 rounded">Log out</a>
            </nav>

        </aside>

        @yield('content')
    </div>

    <!-- Chart.js Library -->

</body>

</html>

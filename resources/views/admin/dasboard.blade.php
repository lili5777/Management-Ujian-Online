@extends('component.adminmaster')

@section('content')
    <!-- Content -->
    <div class="flex-1 ml-64 p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Dashboard</h1>
            <div class="flex items-center space-x-4">
                <span class="text-gray-700">{{ Auth::user()->name }} | {{ Auth::user()->level }}</span>
                <a href="{{ route('logout') }}" class="bg-red-500 text-white py-2 px-4 rounded">Logout</a>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="grid grid-cols-4 gap-6 mb-6">
            <div class="bg-white p-6 rounded shadow">
                <h3 class="text-xl font-semibold">Data Guru</h3>
                <p class="text-3xl font-bold">{{ $data->where('level', 'guru')->count() }}</p>
            </div>
            <div class="bg-white p-6 rounded shadow">
                <h3 class="text-xl font-semibold">Data Siswa</h3>
                <p class="text-3xl font-bold">{{ $data->where('level', 'siswa')->count() }}</p>
            </div>
            <div class="bg-white p-6 rounded shadow">
                <h3 class="text-xl font-semibold">Data Mapel</h3>
                <p class="text-3xl font-bold">{{ $mapel }}</p>
            </div>
            <div class="bg-white p-6 rounded shadow">
                <h3 class="text-xl font-semibold">Data Kelas</h3>
                <p class="text-3xl font-bold">{{ $kelas }}</p>
            </div>
        </div>

        <!-- Main Dashboard Content -->
        <div class="grid grid-cols-2 gap-6">
            <!-- Students Section -->
            <div class="bg-white p-6 rounded shadow">
                <h3 class="text-xl font-semibold mb-4">Siswa</h3>
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h4 class="text-2xl font-bold">{{ $data->where('level', 'siswa')->count() }}</h4>
                        <p>Laki-laki: {{ $data->where('level', 'siswa')->where('jekel', 'l')->count() }} | Perempuan:
                            {{ $data->where('level', 'siswa')->where('jekel', 'p')->count() }}</p>
                    </div>
                    <div class="w-32 h-32">
                        <canvas id="studentChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Teacher Section -->
            <div class="bg-white p-6 rounded shadow">
                <h3 class="text-xl font-semibold mb-4">Guru</h3>
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h4 class="text-2xl font-bold">{{ $data->where('level', 'guru')->count() }}</h4>
                        <p>Laki-laki: {{ $data->where('level', 'guru')->where('jekel', 'l')->count() }} | Perempuan:
                            {{ $data->where('level', 'guru')->where('jekel', 'p')->count() }}</p>
                    </div>
                    <div class="w-32 h-32">
                        <canvas id="teacherChart"></canvas>
                    </div>
                </div>
            </div>



        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Student chart
        const studentChartCtx = document.getElementById('studentChart').getContext('2d');
        new Chart(studentChartCtx, {
            type: 'doughnut',
            data: {
                labels: ['Laki-laki', 'Perempuan'],
                datasets: [{
                    data: [{{ $data->where('level', 'siswa')->where('jekel', 'l')->count() }},
                        {{ $data->where('level', 'siswa')->where('jekel', 'p')->count() }}
                    ],
                    backgroundColor: ['#4F46E5', '#F59E0B']
                }]
            }
        });

        // Teacher chart
        const teacherChartCtx = document.getElementById('teacherChart').getContext('2d');
        new Chart(teacherChartCtx, {
            type: 'doughnut',
            data: {
                labels: ['Laki-laki', 'Perempuan'],
                datasets: [{
                    data: [{{ $data->where('level', 'guru')->where('jekel', 'l')->count() }},
                        {{ $data->where('level', 'guru')->where('jekel', 'p')->count() }}
                    ],
                    backgroundColor: ['#4F46E5', '#F59E0B']
                }]
            }
        });
    </script>
@endsection

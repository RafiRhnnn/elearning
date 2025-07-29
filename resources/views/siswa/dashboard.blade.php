<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Siswa</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">
    <!-- Jika ingin PNG: <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}"> -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex min-h-screen bg-gray-100">
    @include('siswa.sidebar')

    <main class="flex-1 p-4 sm:p-6 mt-16 sm:mt-0">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Selamat Datang, {{ Auth::user()->name }}</h2>

        <div class="bg-white p-4 rounded-lg shadow mb-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Informasi Siswa</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <p class="text-gray-600"><strong>Nama:</strong> {{ Auth::user()->name }}</p>
                    <p class="text-gray-600"><strong>Email:</strong> {{ Auth::user()->email }}</p>
                </div>
                <div>
                    <p class="text-gray-600"><strong>Kelas:</strong>
                        @if (Auth::user()->kelas_id)
                            {{ Auth::user()->kelas_id }}
                        @else
                            Kelas belum ditentukan
                        @endif
                    </p>
                </div>
            </div>
        </div>

        {{-- Jadwal Pelajaran --}}
        @if (isset($jadwal) && count($jadwal))
            <div class="bg-white p-4 rounded-lg shadow mb-6">
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Jadwal Pelajaran</h3>
                <div class="overflow-x-auto">
                    <table class="w-full table-auto border border-gray-300">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="border px-2 py-1">Hari</th>
                                <th class="border px-2 py-1">Jam</th>
                                <th class="border px-2 py-1">Pelajaran</th>
                                <th class="border px-2 py-1">Guru</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jadwal as $j)
                                <tr>
                                    <td class="border px-2 py-1">{{ $j->hari }}</td>
                                    <td class="border px-2 py-1">{{ $j->jam }}</td>
                                    <td class="border px-2 py-1">{{ $j->nama_pelajaran }}</td>
                                    <td class="border px-2 py-1">{{ $j->guru->name ?? '-' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="bg-white p-4 rounded-lg shadow mb-6">
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Jadwal Pelajaran</h3>
                <p class="text-gray-500">Belum ada jadwal pelajaran untuk kelas Anda.</p>
            </div>
        @endif

        <p class="text-gray-600">Ini adalah halaman dashboard untuk siswa. Silakan pilih menu di sidebar untuk mulai
            mengakses materi atau tugas.</p>
    </main>
</body>

</html>

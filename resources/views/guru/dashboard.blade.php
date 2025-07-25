<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Guru</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">
    <!-- Jika ingin PNG: <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}"> -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex min-h-screen bg-gray-100">
    @include('guru.sidebar')

    <main class="flex-1 p-4 sm:p-6 mt-16 sm:mt-0">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Selamat Datang, {{ Auth::user()->name }}</h2>
        <p class="text-gray-600 mb-6">Ini adalah halaman dashboard untuk guru. Silakan pilih menu di sidebar untuk mulai
            mengelola materi atau tugas.</p>

        <h3 class="text-xl font-semibold text-green-700 mb-4">Kelas & Pelajaran yang Anda Ajar:</h3>

        @forelse ($kelas as $namaKelas => $items)
            <div class="bg-white p-4 rounded-lg shadow mb-5">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                    <div class="w-full">
                        <h4 class="text-lg font-bold text-gray-800">{{ $namaKelas }}</h4>
                        <ul class="mt-2 list-disc list-inside text-sm text-gray-700">
                            @foreach ($items as $p)
                                <li>{{ $p->nama_pelajaran }} ({{ $p->hari }} - {{ $p->jam }})</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="w-full sm:w-auto flex justify-end">
                        <a href="{{ route('guru.kelas.detail', $namaKelas) }}"
                            class="bg-green-600 text-white text-sm px-4 py-2 rounded hover:bg-green-700 transition text-center">
                            Detail
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-gray-600">Belum ada jadwal mengajar yang ditentukan oleh admin.</p>
        @endforelse
    </main>
</body>

</html>

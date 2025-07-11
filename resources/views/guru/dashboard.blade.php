<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Guru</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex min-h-screen bg-gray-100">
    @include('guru.sidebar')

    <main class="flex-1 p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Selamat Datang, {{ Auth::user()->name }}</h2>
        <p class="text-gray-600 mb-6">Ini adalah halaman dashboard untuk guru. Silakan pilih menu di sidebar untuk mulai
            mengelola materi atau tugas.</p>

        <div class="bg-white p-4 rounded shadow">
            <h3 class="text-lg font-semibold mb-3 text-green-700">Kelas & Pelajaran yang Anda Ajar:</h3>

            @forelse ($kelas as $namaKelas => $items)
                <div class="mb-4">
                    <p class="font-medium text-gray-800">{{ $namaKelas }}</p>
                    <ul class="ml-5 list-disc text-sm text-gray-700">
                        @foreach ($items as $p)
                            <li>{{ $p->nama_pelajaran }} ({{ $p->hari }} - {{ $p->jam }})</li>
                        @endforeach
                    </ul>
                </div>
            @empty
                <p class="text-gray-600">Belum ada jadwal mengajar yang ditentukan oleh admin.</p>
            @endforelse
        </div>
    </main>
</body>

</html>

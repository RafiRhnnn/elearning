<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tugas - Siswa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex min-h-screen bg-gray-100">
    @include('siswa.sidebar')

    <main class="flex-1 p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Tugas Pembelajaran</h2>

        <div class="bg-white p-4 rounded-lg shadow mb-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Informasi Siswa</h3>
            <p class="text-gray-600"><strong>Nama:</strong> {{ Auth::user()->name }}</p>
            <p class="text-gray-600"><strong>Kelas:</strong>
                @if (Auth::user()->kelas_id)
                    {{ Auth::user()->kelas_id }}
                @else
                    Kelas belum ditentukan
                @endif
            </p>
            <p class="text-gray-600"><strong>Email:</strong> {{ Auth::user()->email }}</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Daftar Tugas</h3>
            <p class="text-gray-600 mb-4">Berikut adalah tugas yang harus Anda kerjakan:</p>

            <!-- Placeholder untuk daftar tugas -->
            <div class="text-center py-8">
                <div class="text-gray-400 text-6xl mb-4">📝</div>
                <p class="text-gray-500">Belum ada tugas yang tersedia</p>
                <p class="text-gray-400 text-sm">Tugas akan ditampilkan ketika guru memberikan tugas baru</p>
            </div>
        </div>
    </main>
</body>

</html>

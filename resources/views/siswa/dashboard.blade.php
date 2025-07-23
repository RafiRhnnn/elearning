<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Siswa</title>
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

        <p class="text-gray-600">Ini adalah halaman dashboard untuk siswa. Silakan pilih menu di sidebar untuk mulai
            mengakses materi atau tugas.</p>
    </main>
</body>

</html>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex min-h-screen bg-gray-100">
    @include('admin.sidebar')

    <main class="flex-1 p-4 sm:p-6 pt-16 sm:ml-0">
        <h2 class="text-xl sm:text-2xl font-bold text-gray-800 mb-4">Selamat Datang, Admin</h2>
        <p class="text-gray-600 mb-6 text-sm sm:text-base">Ini adalah halaman dashboard admin. Silakan pilih menu di
            sidebar untuk mengelola data.</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
            <div class="bg-white p-4 sm:p-6 rounded shadow text-center">
                <h3 class="text-base sm:text-lg font-semibold text-gray-700">Total Pengguna</h3>
                <p class="text-2xl sm:text-3xl font-bold text-green-600 mt-2">{{ $totalUsers }}</p>
            </div>
            <div class="bg-white p-4 sm:p-6 rounded shadow text-center">
                <h3 class="text-base sm:text-lg font-semibold text-gray-700">Total Guru</h3>
                <p class="text-2xl sm:text-3xl font-bold text-blue-600 mt-2">{{ $totalGuru }}</p>
            </div>
            <div class="bg-white p-4 sm:p-6 rounded shadow text-center">
                <h3 class="text-base sm:text-lg font-semibold text-gray-700">Total Siswa</h3>
                <p class="text-2xl sm:text-3xl font-bold text-indigo-600 mt-2">{{ $totalSiswa }}</p>
            </div>
        </div>
    </main>

</body>

</html>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">
    <!-- Jika ingin PNG: <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}"> -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex min-h-screen bg-gradient-to-br from-green-100 to-white">
    @include('admin.sidebar')

    <main class="flex-1 p-4 sm:p-8 pt-16 sm:ml-0">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row items-center justify-between mb-8">
            <div>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-green-800 mb-1">Selamat Datang, Admin</h2>
                <p class="text-gray-600 text-sm sm:text-base">Kelola data e-learning UTB dengan mudah dan profesional.
                </p>
            </div>
            <div class="flex items-center gap-3 mt-4 sm:mt-0">
                <span class="font-semibold text-green-700">Administrator</span>
            </div>
        </div>

        <!-- Statistik Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white p-6 rounded-xl shadow flex items-center gap-4 border-t-4 border-green-500">
                <div class="bg-green-100 rounded-full p-3">
                    <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path
                            d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87M16 3.13a4 4 0 010 7.75M8 3.13a4 4 0 000 7.75">
                        </path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-base font-semibold text-gray-700">Total Pengguna</h3>
                    <p class="text-3xl font-bold text-green-600 mt-1">{{ $totalUsers }}</p>
                </div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow flex items-center gap-4 border-t-4 border-blue-500">
                <div class="bg-blue-100 rounded-full p-3">
                    <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path d="M12 14l9-5-9-5-9 5-9-5 9-5zm0 7v-6m0 0l-9-5m9 5l9-5"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-base font-semibold text-gray-700">Total Guru</h3>
                    <p class="text-3xl font-bold text-blue-600 mt-1">{{ $totalGuru }}</p>
                </div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow flex items-center gap-4 border-t-4 border-indigo-500">
                <div class="bg-indigo-100 rounded-full p-3">
                    <svg class="w-7 h-7 text-indigo-600" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path
                            d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87M16 3.13a4 4 0 010 7.75M8 3.13a4 4 0 000 7.75">
                        </path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-base font-semibold text-gray-700">Total Siswa</h3>
                    <p class="text-3xl font-bold text-indigo-600 mt-1">{{ $totalSiswa }}</p>
                </div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow flex items-center gap-4 border-t-4 border-orange-500">
                <div class="bg-orange-100 rounded-full p-3">
                    <svg class="w-7 h-7 text-orange-600" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path
                            d="M3 7v4a1 1 0 001 1h3V7a1 1 0 00-1-1H4a1 1 0 00-1 1zM17 7v4a1 1 0 001 1h3V7a1 1 0 00-1-1h-2a1 1 0 00-1 1z">
                        </path>
                        <path
                            d="M3 17v-2a1 1 0 011-1h3v3a1 1 0 01-1 1H4a1 1 0 01-1-1zm14 0v-2a1 1 0 011-1h3v3a1 1 0 01-1 1h-2a1 1 0 01-1-1z">
                        </path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-base font-semibold text-gray-700">Total Kelas</h3>
                    <p class="text-3xl font-bold text-orange-600 mt-1">{{ $totalKelas }}</p>
                </div>
            </div>
        </div>
    </main>
</body>

</html>

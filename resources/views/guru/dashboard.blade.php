<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Guru</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex min-h-screen bg-gray-100">
    @include('guru.sidebar')

    <main class="flex-1 p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Selamat Datang, Guru</h2>
        <p class="text-gray-600">Ini adalah halaman dashboard untuk guru. Silakan pilih menu di sidebar untuk mulai
            mengelola materi atau tugas.</p>
    </main>
</body>

</html>

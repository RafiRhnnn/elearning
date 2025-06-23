<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex min-h-screen bg-gray-100">
    <!-- Sidebar -->
    @include('admin.sidebar')

    <!-- Konten Utama -->
    <main class="flex-1 p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Selamat Datang, Admin</h2>
        <p class="text-gray-600">Ini adalah halaman dashboard admin. Silakan pilih menu di sidebar untuk mengelola data.
        </p>
    </main>
</body>

</html>

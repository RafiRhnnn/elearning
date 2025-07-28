<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Kelas</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex min-h-screen bg-gray-100">
    @include('admin.sidebar')
    <main class="flex-1 p-4 sm:p-6 pt-16 sm:pt-6">
        <h2 class="text-xl sm:text-2xl font-bold mb-4">Kelola Kelas</h2>
        <div class="overflow-x-auto bg-white rounded shadow">
            <table class="w-full">
                <thead class="bg-green-600 text-white">
                    <tr>
                        <th class="px-4 py-2 text-left">No</th>
                        <th class="px-4 py-2 text-left">Kelas</th>
                        <th class="px-4 py-2 text-left">Total Siswa</th>
                        <th class="px-4 py-2 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kelas as $i => $k)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $i + 1 }}</td>
                            <td class="px-4 py-2">{{ $k->nama }}</td>
                            <td class="px-4 py-2">{{ $k->users_count }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('admin.kelola_kelas.detail', $k->id) }}"
                                    class="text-blue-600 hover:underline">Detail</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4">Tidak ada kelas ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>

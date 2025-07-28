<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kelas {{ $kelas->nama }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex min-h-screen bg-gray-100">
    @include('admin.sidebar')
    <main class="flex-1 p-4 sm:p-6 pt-16 sm:pt-6">
        <h2 class="text-xl sm:text-2xl font-bold mb-4">Detail Kelas: {{ $kelas->nama }}</h2>
        <a href="{{ route('admin.kelola_kelas') }}" class="inline-block mb-4 text-green-700 hover:underline">&larr;
            Kembali ke Kelola Kelas</a>
        <div class="overflow-x-auto bg-white rounded shadow">
            <table class="w-full">
                <thead class="bg-green-600 text-white">
                    <tr>
                        <th class="px-4 py-2 text-left">No</th>
                        <th class="px-4 py-2 text-left">Nama Siswa</th>
                        <th class="px-4 py-2 text-left">Email</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($siswa as $i => $user)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $i + 1 }}</td>
                            <td class="px-4 py-2">{{ $user->name }}</td>
                            <td class="px-4 py-2">{{ $user->email }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-4">Tidak ada siswa di kelas ini.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>

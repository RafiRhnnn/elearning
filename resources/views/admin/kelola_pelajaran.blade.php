<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pelajaran</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">
    <!-- Jika ingin PNG: <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}"> -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex min-h-screen bg-gray-100">
    @include('admin.sidebar')

    <main class="flex-1 p-4 sm:p-6 pt-16 sm:pt-6 sm:ml-0">
        <div class="max-w-full mx-auto bg-white p-4 sm:p-6 rounded shadow">
            <h2 class="text-xl sm:text-2xl font-bold mb-4">Kelola Data Pelajaran</h2>

            @if (session('success'))
                <div class="mb-4 text-green-600">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Mobile card view -->
            <div class="block sm:hidden space-y-4">
                @forelse ($dataPelajaran as $index => $p)
                    <div class="bg-gray-50 p-4 rounded-lg border">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="font-semibold text-lg">{{ $p->nama_pelajaran }}</h3>
                            <span class="text-sm text-gray-500">#{{ $index + 1 }}</span>
                        </div>
                        <div class="space-y-1 text-sm">
                            <p><span class="font-medium">Guru:</span> {{ $p->guru->name ?? '-' }}</p>
                            <p><span class="font-medium">Kelas:</span> {{ $p->kelas }}</p>
                            <p><span class="font-medium">Hari:</span> {{ $p->hari }}</p>
                            <p><span class="font-medium">Jam:</span> {{ $p->jam }}</p>
                        </div>
                        <div class="flex space-x-2 mt-3">
                            <a href="{{ route('admin.kelola_pelajaran.edit', $p->id) }}"
                                class="bg-blue-500 text-white px-3 py-1 rounded text-sm hover:bg-blue-600">Edit</a>
                            <form action="{{ route('admin.kelola_pelajaran.destroy', $p->id) }}" method="POST"
                                class="inline" onsubmit="return confirm('Yakin ingin menghapus pelajaran ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 text-white px-3 py-1 rounded text-sm hover:bg-red-600">Hapus</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-8 text-gray-500">Belum ada data pelajaran.</div>
                @endforelse
            </div>

            <!-- Desktop table view -->
            <div class="hidden sm:block overflow-x-auto">
                <table class="w-full table-auto border-collapse border border-gray-300">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="border px-4 py-2">#</th>
                            <th class="border px-4 py-2">Guru</th>
                            <th class="border px-4 py-2">Kelas</th>
                            <th class="border px-4 py-2">Nama Pelajaran</th>
                            <th class="border px-4 py-2">Hari</th>
                            <th class="border px-4 py-2">Jam</th>
                            <th class="border px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataPelajaran as $index => $p)
                            <tr class="text-center">
                                <td class="border px-2 py-1">{{ $index + 1 }}</td>
                                <td class="border px-2 py-1">{{ $p->guru->name ?? '-' }}</td>
                                <td class="border px-2 py-1">{{ $p->kelas }}</td>
                                <td class="border px-2 py-1">{{ $p->nama_pelajaran }}</td>
                                <td class="border px-2 py-1">{{ $p->hari }}</td>
                                <td class="border px-2 py-1">{{ $p->jam }}</td>
                                <td class="border px-2 py-1">
                                    <a href="{{ route('admin.kelola_pelajaran.edit', $p->id) }}"
                                        class="text-blue-600 hover:underline">Edit</a>
                                    |
                                    <form action="{{ route('admin.kelola_pelajaran.destroy', $p->id) }}" method="POST"
                                        class="inline"
                                        onsubmit="return confirm('Yakin ingin menghapus pelajaran ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">Belum ada data pelajaran.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>

</html>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kelola Pelajaran</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex min-h-screen bg-gray-100">
    <!-- Sidebar -->
    @include('admin.sidebar')

    <!-- Konten Utama -->
    <main class="flex-1 p-6">
        <div class="max-w-6xl mx-auto bg-white p-6 rounded shadow">
            <h2 class="text-2xl font-bold mb-6 text-center">Kelola Mata Pelajaran</h2>

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="w-full border border-gray-200 text-sm">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="border px-4 py-2 text-left">No</th>
                            <th class="border px-4 py-2 text-left">Kelas</th>
                            <th class="border px-4 py-2 text-left">Mata Pelajaran</th>
                            <th class="border px-4 py-2 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dataPelajaran as $index => $item)
                            <tr class="border-t">
                                <td class="border px-4 py-2">{{ $index + 1 }}</td>
                                <td class="border px-4 py-2 font-semibold">{{ $item->kelas }}</td>
                                <td class="border px-4 py-2">
                                    <ul class="list-disc ml-5">
                                        @for ($i = 1; $i <= 10; $i++)
                                            @php $field = 'pelajaran' . $i; @endphp
                                            @if (!empty($item->$field))
                                                <li>{{ $item->$field }}</li>
                                            @endif
                                        @endfor
                                    </ul>
                                </td>
                                <td class="border px-4 py-2">
                                    <div class="flex gap-2">
                                        <a href="{{ route('admin.kelola_pelajaran.edit', $item->id) }}"
                                            class="text-blue-600 hover:underline">Edit</a>
                                        <form action="{{ route('admin.kelola_pelajaran.destroy', $item->id) }}"
                                            method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4 text-gray-500">Belum ada data pelajaran.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>

</html>

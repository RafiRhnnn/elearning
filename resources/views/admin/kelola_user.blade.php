<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola User</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">
    <!-- Jika ingin PNG: <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}"> -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex min-h-screen bg-gray-100">

    @include('admin.sidebar')

    <main class="flex-1 p-4 sm:p-6 pt-16 sm:pt-6 sm:ml-0">
        <h2 class="text-xl sm:text-2xl font-bold mb-4">Kelola Pengguna</h2>

        @if (session('success'))
            <div class="mb-4 text-green-600">
                {{ session('success') }}
            </div>
        @endif

        <!-- Mobile card view -->
        <div class="block sm:hidden space-y-4">
            @forelse ($users as $i => $user)
                <div class="bg-white p-4 rounded-lg shadow border">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="font-semibold text-lg">{{ $user->name }}</h3>
                        <span class="text-sm text-gray-500">#{{ $i + 1 }}</span>
                    </div>
                    <div class="space-y-1 text-sm">
                        <p><span class="font-medium">Email:</span> {{ $user->email }}</p>
                        <p><span class="font-medium">Role:</span> <span class="capitalize">{{ $user->role }}</span>
                        </p>
                        <p><span class="font-medium">Kelas:</span> {{ $user->kelas_id ?? '-' }}</p>
                    </div>
                    <div class="flex space-x-2 mt-3">
                        <a href="{{ route('admin.kelola_user.edit', $user) }}"
                            class="bg-blue-500 text-white px-3 py-1 rounded text-sm hover:bg-blue-600">Edit</a>
                        <form action="{{ route('admin.kelola_user.destroy', $user) }}" method="POST" class="inline"
                            onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 text-white px-3 py-1 rounded text-sm hover:bg-red-600">Hapus</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="text-center py-8 text-gray-500">Tidak ada pengguna ditemukan.</div>
            @endforelse
        </div>

        <!-- Desktop table view -->
        <div class="hidden sm:block overflow-x-auto">
            <table class="w-full bg-white rounded shadow overflow-hidden">
                <thead class="bg-green-600 text-white">
                    <tr>
                        <th class="px-4 py-2 text-left">No</th>
                        <th class="px-4 py-2 text-left">Nama</th>
                        <th class="px-4 py-2 text-left">Email</th>
                        <th class="px-4 py-2 text-left">Role</th>
                        <th class="px-4 py-2 text-left">Kelas</th>
                        <th class="px-4 py-2 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $i => $user)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $i + 1 }}</td>
                            <td class="px-4 py-2">{{ $user->name }}</td>
                            <td class="px-4 py-2">{{ $user->email }}</td>
                            <td class="px-4 py-2 capitalize">{{ $user->role }}</td>
                            <td class="px-4 py-2">{{ $user->kelas_id ?? '-' }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('admin.kelola_user.edit', $user) }}"
                                    class="text-blue-600 hover:underline mr-2">Edit</a>
                                <form action="{{ route('admin.kelola_user.destroy', $user) }}" method="POST"
                                    class="inline-block" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">Tidak ada pengguna ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>

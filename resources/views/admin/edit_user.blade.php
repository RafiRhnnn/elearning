<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengguna</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">
    <!-- Jika ingin PNG: <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}"> -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex min-h-screen bg-gray-100">
    @include('admin.sidebar')

    <main class="flex-1 p-4 sm:p-6 pt-16 sm:pt-6">
        <div class="max-w-xl mx-auto bg-white p-4 sm:p-8 rounded shadow">
            <h2 class="text-xl sm:text-2xl font-bold mb-6 text-center">Edit Pengguna</h2>

            @if (session('success'))
                <div class="mb-4 text-green-600">{{ session('success') }}</div>
            @endif

            <form method="POST" action="{{ route('admin.kelola_user.update', $user->id) }}">
                @csrf
                @method('PUT')

                <!-- Nama -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-semibold text-gray-700">Nama</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                        class="w-full mt-1 p-2 border rounded bg-gray-50" required>
                    @error('name')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-semibold text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                        class="w-full mt-1 p-2 border rounded bg-gray-50" required>
                    @error('email')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Baru -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-semibold text-gray-700">Password Baru
                        (Opsional)</label>
                    <input type="password" name="password" id="password"
                        class="w-full mt-1 p-2 border rounded bg-gray-50">
                    @error('password')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <p class="text-sm text-gray-500 mt-1">Kosongkan jika tidak ingin mengubah password.</p>
                </div>

                <!-- Role -->
                <div class="mb-4">
                    <label for="role" class="block text-sm font-semibold text-gray-700">Role</label>
                    <select name="role" id="role" class="w-full mt-1 p-2 border rounded bg-gray-50" required>
                        <option value="guru" {{ $user->role == 'guru' ? 'selected' : '' }}>Guru</option>
                        <option value="siswa" {{ $user->role == 'siswa' ? 'selected' : '' }}>Siswa</option>
                    </select>
                    @error('role')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Kelas -->
                <div class="mb-4">
                    <label for="kelas_id" class="block text-sm font-semibold text-gray-700">Kelas</label>
                    <select name="kelas_id" id="kelas_id" class="w-full mt-1 p-2 border rounded bg-gray-50">
                        <option value="">-- Pilih Kelas --</option>
                        @foreach ($kelas as $k)
                            <option value="{{ $k->nama }}"
                                {{ old('kelas_id', $user->kelas_id ?? '') == $k->nama ? 'selected' : '' }}>
                                {{ $k->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Tombol -->
                <div class="flex flex-col sm:flex-row gap-2 sm:justify-end">
                    <a href="{{ route('admin.kelola_user') }}"
                        class="bg-gray-300 text-gray-800 py-2 px-4 rounded hover:bg-gray-400 text-center">
                        Batal
                    </a>
                    <button type="submit"
                        class="bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700 transition">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>

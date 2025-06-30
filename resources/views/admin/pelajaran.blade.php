<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Pelajaran untuk Kelas</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex min-h-screen bg-gray-100">
    <!-- Sidebar -->
    @include('admin.sidebar')

    <!-- Konten Utama -->
    <main class="flex-1 p-6">
        <div class="max-w-3xl mx-auto bg-white p-8 rounded shadow">
            <h2 class="text-2xl font-bold mb-6 text-center">Tambah Pelajaran untuk Kelas</h2>

            @if (session('success'))
                <div class="mb-4 text-green-600">{{ session('success') }}</div>
            @endif

            <form method="POST" action="{{ route('admin.pelajaran.store') }}">
                @csrf

                <!-- Pilih Kelas -->
                <div class="mb-4">
                    <label for="kelas" class="block text-sm font-semibold text-gray-700">Pilih Kelas</label>
                    <select name="kelas" id="kelas" class="w-full mt-1 p-2 border rounded bg-gray-50" required>
                        <option value="">-- Pilih Kelas --</option>
                        @foreach ($kelas as $k)
                            <option value="{{ $k->nama }}" {{ old('kelas') == $k->nama ? 'selected' : '' }}>
                                {{ $k->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('kelas')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Input Pelajaran 1–10 -->
                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Isi Mata Pelajaran (opsional)</label>
                    @for ($i = 1; $i <= 10; $i++)
                        <input type="text" name="pelajaran{{ $i }}"
                            placeholder="Pelajaran {{ $i }}" value="{{ old('pelajaran' . $i) }}"
                            class="w-full mb-2 p-2 border rounded bg-gray-50">
                    @endfor
                </div>

                <!-- Tombol -->
                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700 transition">
                        Simpan Pelajaran
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>

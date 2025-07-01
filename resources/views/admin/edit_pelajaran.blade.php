<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Pelajaran</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex min-h-screen bg-gray-100">
    <!-- Sidebar -->
    @include('admin.sidebar')

    <!-- Konten Utama -->
    <main class="flex-1 p-6">
        <div class="max-w-3xl mx-auto bg-white p-8 rounded shadow">
            <h2 class="text-2xl font-bold mb-6 text-center">Edit Pelajaran untuk Kelas {{ $pelajaran->kelas }}</h2>

            @if ($errors->any())
                <div class="mb-4 text-red-600">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.kelola_pelajaran.update', $pelajaran->id) }}">
                @csrf
                @method('PUT')

                <!-- Edit Nama Kelas -->
                <div class="mb-4">
                    <label for="kelas" class="block text-sm font-semibold text-gray-700">Nama Kelas</label>
                    <input type="text" name="kelas" id="kelas" value="{{ old('kelas', $pelajaran->kelas) }}"
                        class="w-full mt-1 p-2 border rounded bg-gray-50" required>
                </div>

                <!-- Edit Pelajaran 1–10 -->
                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Mata Pelajaran</label>
                    @for ($i = 1; $i <= 10; $i++)
                        @php $field = 'pelajaran' . $i; @endphp
                        <input type="text" name="{{ $field }}" placeholder="Pelajaran {{ $i }}"
                            value="{{ old($field, $pelajaran->$field) }}"
                            class="w-full mb-2 p-2 border rounded bg-gray-50">
                    @endfor
                </div>

                <!-- Tombol -->
                <div class="flex justify-between">
                    <a href="{{ route('admin.kelola_pelajaran') }}"
                        class="bg-gray-300 text-gray-800 py-2 px-4 rounded hover:bg-gray-400 transition">
                        Batal
                    </a>
                    <button type="submit"
                        class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition">
                        Update Pelajaran
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>

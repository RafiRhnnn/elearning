<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tugas Kelas - {{ $kelas }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex min-h-screen bg-gray-100">
    @include('guru.sidebar')

    <main class="flex-1 p-6">
        <h2 class="text-2xl font-bold mb-4 text-gray-800">Tugas Kelas: {{ $kelas }}</h2>

        <!-- Tombol Aksi -->
        <div class="flex justify-between items-center mb-4">
            <a href="{{ route('guru.kelas.detail', $kelas) }}"
                class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 inline-block">
                ⬅ Kembali
            </a>

            <button onclick="showModal()"
                class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 inline-block">
                + Tambah Tugas
            </button>
        </div>

        <!-- Modal Form Tambah Tugas -->
        <div id="modalTambah" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
                <h3 class="text-lg font-bold mb-4">Tambah Tugas</h3>
                <form action="{{ route('guru.tugas.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="kelas" value="{{ $kelas }}">
                    <input type="hidden" name="guru_id" value="{{ Auth::id() }}">


                    <div class="mb-3">
                        <label class="block text-gray-700">Nama Guru</label>
                        <input type="text" value="{{ Auth::user()->name }}" disabled
                            class="w-full border rounded px-3 py-2 bg-gray-100">
                    </div>

                    <div class="mb-3">
                        <label class="block text-gray-700">Kelas</label>
                        <input type="text" value="{{ $kelas }}" disabled
                            class="w-full border rounded px-3 py-2 bg-gray-100">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 mb-1">Upload File</label>
                        <input type="file" name="file" required
                            class="w-full border rounded px-3 py-2 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:bg-green-600 file:text-white hover:file:bg-green-700">
                    </div>

                    <div class="flex justify-end space-x-2">
                        <button type="button" onclick="document.getElementById('modalTambah').classList.add('hidden')"
                            class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Batal</button>
                        <button type="submit"
                            class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Table Tugas -->
        <div class="overflow-x-auto mt-6">
            <table class="w-full table-auto border border-gray-300">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-4 py-2">Nama Guru</th>
                        <th class="border px-4 py-2">Kelas</th>
                        <th class="border px-4 py-2">File</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tugasList as $tugas)
                        <tr class="text-center">
                            <td class="border px-4 py-2">{{ $tugas->guru->name }}</td>
                            <td class="border px-4 py-2">{{ $tugas->kelas }}</td>
                            <td class="border px-4 py-2">
                                <a href="{{ asset('storage/' . $tugas->file) }}" target="_blank"
                                    class="text-blue-600 hover:underline">
                                    {{ basename($tugas->file) }}
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-4 text-gray-500">Belum ada tugas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>

    <script>
        function showModal() {
            document.getElementById('modalTambah').classList.remove('hidden');
        }
    </script>
</body>

</html>

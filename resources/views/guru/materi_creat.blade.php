<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Materi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex min-h-screen bg-gray-100">
    @include('guru.sidebar')

    <main class="flex-1 p-4 sm:p-6 mt-16 sm:mt-0">
        <div class="max-w-xl mx-auto">
            <div class="flex flex-col sm:flex-row justify-between items-stretch sm:items-center mb-6 gap-2">
                <h2 class="text-2xl font-bold text-gray-800">Tambah Materi</h2>
                <a href="{{ route('guru.materi.index', $kelas) }}"
                    class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 text-center">
                    ⬅ Kembali
                </a>
            </div>

            <div class="bg-white p-4 sm:p-6 rounded-lg shadow">
                <form action="{{ route('guru.materi.store', $kelas) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label class="block font-semibold text-gray-700 mb-1">File Materi (pdf, docx, jpg)</label>
                        <input type="file" name="file"
                            class="w-full border px-3 py-2 rounded file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:bg-green-600 file:text-white hover:file:bg-green-700"
                            required>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-2">
                        <button type="submit"
                            class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 w-full sm:w-auto">
                            Simpan
                        </button>
                        <a href="{{ route('guru.materi.index', $kelas) }}"
                            class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 text-center w-full sm:w-auto">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>

<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tugas - Siswa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex min-h-screen bg-gray-100">
    @include('siswa.sidebar')

    <main class="flex-1 p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Tugas Pembelajaran</h2>

        <div class="bg-white p-4 rounded-lg shadow mb-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Informasi Siswa</h3>
            <p class="text-gray-600"><strong>Nama:</strong> {{ Auth::user()->name }}</p>
            <p class="text-gray-600"><strong>Kelas:</strong>
                @if (Auth::user()->kelas_id)
                    {{ Auth::user()->kelas_id }}
                @else
                    Kelas belum ditentukan
                @endif
            </p>
            <p class="text-gray-600"><strong>Email:</strong> {{ Auth::user()->email }}</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Daftar Tugas</h3>
            <p class="text-gray-600 mb-4">Berikut adalah tugas yang harus Anda kerjakan:</p>

            @if ($tugasList->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full table-auto border border-gray-300">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border px-4 py-2">No</th>
                                <th class="border px-4 py-2">Guru</th>
                                <th class="border px-4 py-2">Mata Pelajaran</th>
                                <th class="border px-4 py-2">Pertemuan</th>
                                <th class="border px-4 py-2">File Tugas</th>
                                <th class="border px-4 py-2">Tanggal Upload</th>
                                <th class="border px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tugasList as $index => $tugas)
                                <tr class="text-center">
                                    <td class="border px-4 py-2">{{ $index + 1 }}</td>
                                    <td class="border px-4 py-2">{{ $tugas->guru->name }}</td>
                                    <td class="border px-4 py-2">{{ $tugas->mata_pelajaran ?? 'Umum' }}</td>
                                    <td class="border px-4 py-2">{{ $tugas->pertemuan ?? '-' }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ asset('storage/' . $tugas->file) }}" target="_blank"
                                            class="text-blue-600 hover:underline">
                                            📄 {{ basename($tugas->file) }}
                                        </a>
                                    </td>
                                    <td class="border px-4 py-2">{{ $tugas->created_at->format('d/m/Y H:i') }}</td>
                                    <td class="border px-4 py-2">
                                        @if ($tugas->pengumpulan->count() > 0)
                                            <span class="text-green-600 font-semibold">✓ Sudah Dikumpulkan</span>
                                            <br>
                                            <small
                                                class="text-gray-500">{{ $tugas->pengumpulan->first()->dikumpulkan_pada->format('d/m/Y H:i') }}</small>
                                        @else
                                            <button
                                                onclick="showKumpulModal({{ $tugas->id }}, '{{ $tugas->mata_pelajaran ?? 'Umum' }}', '{{ $tugas->pertemuan }}')"
                                                class="bg-blue-600 text-white px-3 py-1 rounded text-sm hover:bg-blue-700">
                                                Kumpulkan
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-8">
                    <div class="text-gray-400 text-6xl mb-4">📝</div>
                    <p class="text-gray-500">Belum ada tugas yang tersedia</p>
                    <p class="text-gray-400 text-sm">Tugas akan ditampilkan ketika guru memberikan tugas baru</p>
                </div>
            @endif
        </div>

        <!-- Modal Kumpul Tugas -->
        <div id="modalKumpul" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50"
            style="display: none;">
            <div class="bg-white rounded-lg shadow-lg p-6 w-[400px]">
                <h3 class="text-lg font-bold mb-4">Kumpulkan Tugas</h3>
                <form action="{{ route('siswa.tugas.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="tugas_id" id="tugas_id">

                    <div class="mb-3">
                        <label class="block text-gray-700 text-sm">Nama Siswa</label>
                        <input type="text" value="{{ Auth::user()->name }}" disabled
                            class="w-full border rounded px-3 py-2 bg-gray-100 text-sm">
                    </div>

                    <div class="mb-3">
                        <label class="block text-gray-700 text-sm">Kelas</label>
                        <input type="text" value="{{ Auth::user()->kelas_id }}" disabled
                            class="w-full border rounded px-3 py-2 bg-gray-100 text-sm">
                    </div>

                    <div class="mb-3">
                        <label class="block text-gray-700 text-sm">Mata Pelajaran</label>
                        <input type="text" id="mata_pelajaran_display" disabled
                            class="w-full border rounded px-3 py-2 bg-gray-100 text-sm">
                    </div>

                    <div class="mb-3">
                        <label class="block text-gray-700 text-sm">Pertemuan</label>
                        <input type="text" id="pertemuan_display" disabled
                            class="w-full border rounded px-3 py-2 bg-gray-100 text-sm">
                    </div>

                    <div class="mb-3">
                        <label class="block text-gray-700 text-sm">Keterangan *</label>
                        <textarea name="keterangan" required rows="3" placeholder="Tulis keterangan pengumpulan tugas..."
                            class="w-full border rounded px-3 py-2 text-sm"></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm mb-1">Upload File (Opsional)</label>
                        <input type="file" name="file" accept=".pdf,.doc,.docx,.xls,.xlsx,.png,.jpg,.jpeg"
                            class="w-full border rounded px-3 py-2 text-sm file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:bg-blue-600 file:text-white hover:file:bg-blue-700">
                        <small class="text-gray-500">Format: PDF, DOC, DOCX, XLS, XLSX, PNG, JPG, JPEG (Max:
                            5MB)</small>
                    </div>

                    <div class="flex justify-end space-x-2">
                        <button type="button" onclick="hideKumpulModal()"
                            class="px-4 py-2 bg-gray-500 text-white rounded text-sm hover:bg-gray-600">Batal</button>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded text-sm hover:bg-blue-700">Kumpulkan</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script>
        function showKumpulModal(tugasId, mataPelajaran, pertemuan) {
            document.getElementById('tugas_id').value = tugasId;
            document.getElementById('mata_pelajaran_display').value = mataPelajaran;
            document.getElementById('pertemuan_display').value = pertemuan;
            document.getElementById('modalKumpul').style.display = 'flex';
        }

        function hideKumpulModal() {
            document.getElementById('modalKumpul').style.display = 'none';
        }
    </script>
</body>

</html>

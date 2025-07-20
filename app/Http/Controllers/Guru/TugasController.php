<?php

namespace App\Http\Controllers\Guru;

use App\Models\Tugas;
use App\Models\Materi; // Tambahkan import untuk model Materi
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TugasController extends Controller
{
    public function index($kelas)
    {
        $guruId = Auth::id();
        $tugasList = Tugas::with('guru')
            ->where('kelas', $kelas)
            ->where('guru_id', $guruId)
            ->get();

        return view('guru.tugas', compact('tugasList', 'kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'guru_id' => 'required|exists:users,id',
            'kelas' => 'required|string',
            'file' => 'required|file|mimes:pdf,docx,jpg,jpeg,png|max:2048',
        ]);

        $filePath = $request->file('file')->store('tugas', 'public');

        // Simpan data ke tabel tugas
        Tugas::create([
            'guru_id' => $request->guru_id,
            'kelas' => $request->kelas,
            'file' => $filePath,
        ]);

        return redirect()->route('guru.tugas.index', $request->kelas)->with('success', 'Tugas berhasil ditambahkan.');
    }
}
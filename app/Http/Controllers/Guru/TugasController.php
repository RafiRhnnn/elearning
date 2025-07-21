<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tugas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TugasController extends Controller
{
    public function index($kelas)
    {
        $tugasList = Tugas::where('kelas', $kelas)
            ->where('guru_id', Auth::id())
            ->get();

        return view('guru.tugas', compact('kelas', 'tugasList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'guru_id'   => 'required|exists:users,id',
            'kelas'     => 'required|string',
            'pertemuan' => 'required|string|max:255',
            'file'      => 'required|file|mimes:pdf,doc,docx,png,jpg,jpeg|max:2048',
        ]);

        $path = $request->file('file')->store('tugas', 'public');

        Tugas::create([
            'guru_id'   => $request->guru_id,
            'kelas'     => $request->kelas,
            'pertemuan' => $request->pertemuan,
            'file'      => $path,
        ]);

        return redirect()->back()->with('success', 'Tugas berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $tugas = Tugas::findOrFail($id);

        // Hapus file dari storage
        if ($tugas->file && Storage::exists($tugas->file)) {
            Storage::delete($tugas->file);
        }

        // Hapus dari database
        $tugas->delete();

        return redirect()->back()->with('success', 'Tugas berhasil dihapus.');
    }
}

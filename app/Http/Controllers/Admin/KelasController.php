<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all(); // Ambil semua kelas
        return view('admin.tambah_kelas', compact('kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:kelas,nama',
        ]);

        Kelas::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('admin.kelas.index')->with('success', 'Kelas berhasil ditambahkan.');
    }

    public function kelolaKelas()
    {
        $kelas = \App\Models\Kelas::withCount(['users' => function ($q) {
            $q->where('role', 'siswa');
        }])->get();
        return view('admin.kelolakelas', compact('kelas'));
    }

    public function detailKelas($kelas_id)
    {
        $kelas = \App\Models\Kelas::where('id', $kelas_id)->firstOrFail();
        $siswa = \App\Models\User::where('role', 'siswa')->where('kelas_id', $kelas->nama)->get();
        return view('admin.detail_kelas', compact('kelas', 'siswa'));
    }
}

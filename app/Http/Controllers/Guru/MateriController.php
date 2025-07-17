<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Materi;
use Illuminate\Support\Facades\Auth;

class MateriController extends Controller
{
    public function index($kelas)
    {
        $materiList = Materi::where('kelas', $kelas)->where('guru_id', Auth::id())->get();

        return view('guru.materi', compact('kelas', 'materiList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'guru_id' => 'required|exists:users,id',
            'kelas' => 'required|string',
            'file' => 'required|file|mimes:pdf,doc,docx,png,jpg,jpeg|max:2048',
        ]);

        $path = $request->file('file')->store('materi', 'public');

        \App\Models\Materi::create([
            'guru_id' => $request->guru_id,
            'kelas' => $request->kelas,
            'file' => $path,
        ]);

        return redirect()->back()->with('success', 'Materi berhasil ditambahkan!');
    }
}

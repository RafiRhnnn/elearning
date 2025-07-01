<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Models\Pelajaran; // pastikan model Pelajaran sudah ada


class PelajaranController extends Controller
{
    public function index()
    {
        $pelajaran = Pelajaran::all();
        return view('admin.pelajaran', compact('pelajaran'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kelas' => 'required|string|max:255',
            'pelajaran1' => 'nullable|string|max:255',
            'pelajaran2' => 'nullable|string|max:255',
            'pelajaran3' => 'nullable|string|max:255',
            'pelajaran4' => 'nullable|string|max:255',
            'pelajaran5' => 'nullable|string|max:255',
            'pelajaran6' => 'nullable|string|max:255',
            'pelajaran7' => 'nullable|string|max:255',
            'pelajaran8' => 'nullable|string|max:255',
            'pelajaran9' => 'nullable|string|max:255',
            'pelajaran10' => 'nullable|string|max:255',
            // ... sampai pelajaran10
        ]);

        Pelajaran::create($request->only([
            'kelas',
            'pelajaran1',
            'pelajaran2',
            'pelajaran3',
            'pelajaran4',
            'pelajaran5',
            'pelajaran6',
            'pelajaran7',
            'pelajaran8',
            'pelajaran9',
            'pelajaran10',
        ]));

        return redirect()->back()->with('success', 'Data pelajaran berhasil disimpan.');
    }

    public function create()
    {
        $kelas = Kelas::select('id', 'nama')->distinct()->get();
        return view('admin.pelajaran', compact('kelas'));
    }
}
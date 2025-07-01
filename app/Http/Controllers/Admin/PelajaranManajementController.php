<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pelajaran;
use Illuminate\Http\Request;

class PelajaranManajementController extends Controller
{
    public function index()
    {
        $dataPelajaran = Pelajaran::all();
        return view('admin.kelola_pelajaran', compact('dataPelajaran'));
    }

    public function edit($id)
    {
        $pelajaran = Pelajaran::findOrFail($id);
        return view('admin.edit_pelajaran', compact('pelajaran'));
    }

    public function update(Request $request, $id)
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
        ]);

        $pelajaran = Pelajaran::findOrFail($id);
        $pelajaran->update($request->all());

        return redirect()->route('admin.kelola_pelajaran')->with('success', 'Data pelajaran berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pelajaran = Pelajaran::findOrFail($id);
        $pelajaran->delete();

        return redirect()->route('admin.kelola_pelajaran')->with('success', 'Data pelajaran berhasil dihapus.');
    }
}

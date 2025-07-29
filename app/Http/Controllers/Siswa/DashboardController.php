<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Pelajaran;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Cek apakah ada kelas dengan nama yang sama dengan kelas_id user
        $kelasDitemukan = Kelas::where('nama', $user->kelas_id)->first();

        // Jika tidak ada, langsung gunakan kelas_id sebagai nama kelas
        if (!$kelasDitemukan && $user->kelas_id) {
            $kelas = (object) ['nama' => $user->kelas_id];
        } else {
            $kelas = $kelasDitemukan;
        }

        // Ambil jadwal pelajaran sesuai kelas siswa
        $jadwal = [];
        if ($user->kelas_id) {
            $jadwal = Pelajaran::where('kelas', $user->kelas_id)
                ->orderByRaw("FIELD(hari, 'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu')")
                ->orderBy('jam')
                ->get();
        }

        return view('siswa.dashboard', compact('user', 'kelas', 'jadwal'));
    }
}
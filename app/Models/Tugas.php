<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tugas extends Model
{
    use HasFactory;

    protected $table = 'tugas';

    protected $fillable = ['guru_id', 'kelas', 'pertemuan', 'file'];

    public function guru()
    {
        return $this->belongsTo(User::class, 'guru_id');
    }
}

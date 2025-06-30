<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelajaran extends Model
{
    protected $table = 'pelajaran';

    protected $fillable = [
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
    ];
}

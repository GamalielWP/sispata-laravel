<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RealDosen extends Model
{
    protected $fillable = [
        'nik', 'nidn', 'kode_dosen', 'nama', 'email', 'role', 'prodi', 'tlp'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $fillable = [
        'user_id', 'nik', 'nidn', 'lecturer_code', 'signature', 'address'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

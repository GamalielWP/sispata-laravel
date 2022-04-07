<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = [
        'user_id', 'nim', 'regis_form', 'ksm', 'temp_transcript', 'validity_sheet', 'thesis_proposal'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

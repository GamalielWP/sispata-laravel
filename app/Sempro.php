<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sempro extends Model
{
    protected $fillable = [
        'mhs_user_id', 'title', 'adviser1_user_id', 'adviser2_user_id', 'examiner_user_id', 'schedule', 'adviser1_score', 'adviser2_score', 'examiner_score', 'news_doc', 'status'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo('App\Mahasiswa');
    }

    public function dosen()
    {
        return $this->belongsTo('App\Dosen');
    }
}

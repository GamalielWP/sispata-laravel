<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Sempro extends Model
{
    protected $fillable = [
        'mhs_user_id', 'title', 'scope_id', 'adviser1_code', 'adviser2_code', 'examiner_code', 'schedule', 'adviser1_score', 'adviser2_score', 'examiner_score', 'news_doc', 'track'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo('App\Mahasiswa');
    }

    public function dosen()
    {
        return $this->belongsTo('App\Dosen');
    }

    public function keahlian()
    {
        return $this->belongsTo('App\BidangKeahlian');
    }

}

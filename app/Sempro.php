<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Sempro extends Model
{
    protected $fillable = [
        'mhs_user_id', 'title', 'adviser1_code', 'adviser2_code', 'examiner_code', 'schedule', 'adviser1_score', 'adviser2_score', 'examiner_score', 'news_doc', 'track'
    ];

    public function getScheduleAttribute()
    {
        return Carbon::parse($this->attributes['schedule'])
            ->translatedFormat('l, d F Y');
    }

    public function mahasiswa()
    {
        return $this->belongsTo('App\Mahasiswa');
    }

    public function dosen()
    {
        return $this->belongsTo('App\Dosen');
    }

}
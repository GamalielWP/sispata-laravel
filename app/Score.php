<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable = [
        'mhs_user_id', 'dsn_user_id', 'ide', 'solusi', 'analisa', 'penulisan', 'kemandirian_presentasi'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

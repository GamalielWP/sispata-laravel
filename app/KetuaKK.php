<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KetuaKK extends Model
{
    protected $fillable = [
        'user_id', 'dosen_id', 'scope_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
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

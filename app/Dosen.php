<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $fillable = [
        'user_id', 'nidn', 'lecturer_code', 'address'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

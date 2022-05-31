<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BatalSempro extends Model
{
    protected $fillable = [
        'user_id', 'date', 'time'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

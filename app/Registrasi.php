<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registrasi extends Model
{
    protected $fillable = [
        'nim', 'name', 'email', 'phone_number', 'prodi', 'pfp', 'role', 'status', 'password'
    ];
}

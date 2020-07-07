<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function user()
    {
        // Makes Laravel know that a profile belongs to one single user
        return $this->belongsTo(User::class);
    }
}
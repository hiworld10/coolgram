<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function imageSrc()
    {
        return isset($this->image) ? '/storage/' . $this->image : '/img/nophoto.png';
    }

    public function user()
    {
        // Makes Laravel know that a profile belongs to one single user
        return $this->belongsTo(User::class);
    }
}

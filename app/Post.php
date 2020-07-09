<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // When this property is asigned an empty array, it allows an instance to be created and stored in db.
    // It works as a means to protect the program from storing unwanted data.
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

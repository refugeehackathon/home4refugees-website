<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refugee extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }
}

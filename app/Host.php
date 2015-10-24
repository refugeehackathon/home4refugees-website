<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Host extends Model
{

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function offers() {
        return $this->hasMany(Offer::class);
    }

}

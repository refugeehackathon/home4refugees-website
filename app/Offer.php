<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{


    public function host() {
        return $this->belongsTo(Host::class);
    }
}

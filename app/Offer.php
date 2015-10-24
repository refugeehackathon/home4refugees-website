<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{

    protected $fillable = [
        'type',
        'rooms',
        'location',
        'available',
        'rent'
    ];

    public function host() {
        return $this->belongsTo(Host::class);
    }

}

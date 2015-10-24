<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable = [
        'extension'
    ];

    public function offer() {
        return $this->belongsTo(Offer::class);
    }
}

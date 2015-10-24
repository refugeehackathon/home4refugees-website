<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Host extends Model
{

    protected $fillable = [
        'name',
        'email',
        'mobile'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function offers() {
        return $this->hasMany(Offer::class);
    }

}

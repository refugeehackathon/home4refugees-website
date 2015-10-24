<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refugee extends Model
{
    protected $fillable = [
        'name',
        'sex',
        'birthday'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}

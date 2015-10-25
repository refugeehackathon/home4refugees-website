<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refugee extends Model
{
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'sex',
        'birthday'
    ];

    public function getBirthdayAttribute($value) {
        $e = explode('-', $value);
        return $e[2].'.'.$e[1].'.'.$e[0];
    }

    public function setBirthdayAttribute($value) {
        $e = explode('.', $value);
        $this->attributes['birthday'] = $e[0].'-'.$e[1].'-'.$e[2];
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}

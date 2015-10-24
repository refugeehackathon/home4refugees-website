<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Offer extends Model
{

    protected $fillable = [
        'type',
        'rooms',
        'location',
        'available',
        'rent',
        'size'
    ];

    public function getRentAttribute($value)
    {
        return str_replace('.', ',', $value);
    }

    public function setRentAttribute($value)
    {
        $this->attributes['rent'] = str_replace(',', '.', $value);
    }

    public function getSizeAttribute($value)
    {
        return str_replace('.', ',', $value);
    }

    public function setSizeAttribute($value)
    {
        $this->attributes['size'] = str_replace(',', '.', $value);
    }

    public function host() {
        return $this->belongsTo(Host::class);
    }

    public function pictures() {
        return $this->hasMany(Picture::class);
    }

    public function isOwnedOrFail() {
        if(Auth::user()->host->offers->contains($this)) {
            return $this;
        }
        throw (new ModelNotFoundException)->setModel(get_class($this->model));
    }

}

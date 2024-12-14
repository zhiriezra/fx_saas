<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    public function farmers()
    {
        return $this->hasMany(Farmer::class);
    }

    public function Farms()
    {
        return $this->hasMany(Farm::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function lgas()
    {
        return $this->hasMany(Lga::class);
    }

    public function vendors()
    {
        return $this->hasMany(Vendor::class, 'state_id');
    }

    public function agents()
    {
        return $this->hasMany(Agent::class, 'state_id');
    }
}

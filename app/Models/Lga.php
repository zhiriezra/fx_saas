<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lga extends Model
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

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function vendors()
    {
        return $this->hasMany(Vendor::class, 'lga_id');
    }

    public function agents()
    {
        return $this->hasMany(Agent::class, 'lga_id');
    }
}

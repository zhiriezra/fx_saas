<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function lga()
    {
        return $this->belongsTo(Lga::class, 'lga_id');
    }

    public function farmers()
    {
        return $this->hasMany(Farmer::class);
    }

    // public function farmVisitations()
    // {
    //     return $this->hasMany(FarmVisitation::class);
    // }

    // public function orders(){
    //     return $this->hasMany(Order::class);
    // }
}

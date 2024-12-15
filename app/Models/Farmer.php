<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    use HasFactory;

    protected $fillable = ['uuid'];

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function lga()
    {
        return $this->belongsTo(Lga::class);
    }

    public function farm()
    {
        return $this->hasMany(Farmer::class);
    }

    public function farms()
    {
        return $this->hasMany(Farm::class);
    }
}

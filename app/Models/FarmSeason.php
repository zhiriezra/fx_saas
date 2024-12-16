<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FarmSeason extends Model
{
    use HasFactory;

    protected $fillable = ['uuid'];

    public function farm(){
        return $this->belongsTo(Farm::class);
    }

    public function farm_visitations(){
        return $this->hasMany(FarmVisitation::class);
    }
    
}

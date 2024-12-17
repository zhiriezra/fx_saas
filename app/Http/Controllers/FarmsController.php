<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use App\Models\FarmFarmingSeason;
use App\Models\FarmSeason;
use App\Models\FarmVisitation;
use Illuminate\Http\Request;

class FarmsController extends Controller
{
    public function index(){
        $farm_seasons = FarmSeason::get();
        return view('farms.index', compact('farm_seasons'));
    }

    public function show($uuid){
        $farm_season = FarmSeason::where('uuid', $uuid)->first();
        return view('farms.show', compact('farm_season'));
    }

    public function farmVisitations($uuid){
        $farm_season = FarmSeason::where('uuid', $uuid)->first();
        $visitations = FarmVisitation::where('farm_season_id', $farm_season->id)->get();

        return view('farms.visitations', compact('farm_season','visitations'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use Illuminate\Http\Request;

class FarmsController extends Controller
{
    public function index(){
        $farms = Farm::with('farmer')->get();
        return view('farms.index', compact('farms'));
    }

    public function show(){

    }
}

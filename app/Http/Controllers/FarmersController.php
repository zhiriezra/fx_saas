<?php

namespace App\Http\Controllers;

use App\Models\Farmer;
use Illuminate\Http\Request;

class FarmersController extends Controller
{
    public function index(){

        $farmers = Farmer::get();
        return view('farmers.index', compact('farmers'));
    }

    public function show($uuid)
    {

        $farmer = Farmer::where('uuid', $uuid)->first();

        if (!$farmer) {
            return abort(404, 'Farmer not found');
        }

        return view('farmers.show', compact('farmer'));

    }
}

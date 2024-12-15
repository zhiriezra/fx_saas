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
}

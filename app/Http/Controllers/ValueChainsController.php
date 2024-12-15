<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValueChainsController extends Controller
{
    public function index(){
        return view('value-chain.index');
    }
}

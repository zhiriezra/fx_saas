<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;

class AgentsController extends Controller
{
    public function index(){
        $agents = Agent::all();
        return view('agents.index', compact('agents'));
    }

    public function show($uuid){
        $agent = Agent::where('uuid', $uuid)->first();
        return view('agents.show', compact('agent'));
    }
}

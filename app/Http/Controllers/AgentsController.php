<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\User;
use Illuminate\Http\Request;

class AgentsController extends Controller
{
    public function index(){
        $agents = Agent::all();
        return view('agents.index', compact('agents'));
    }

    public function show($uuid){
        $agent = User::where('uuid', $uuid)->firstOrFail()->agent;
        return view('agents.show', compact('agent'));
    }
}

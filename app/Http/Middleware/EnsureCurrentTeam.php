<?php

namespace App\Http\Middleware;

use App\Models\Agent;
use App\Models\Farm;
use App\Models\Farmer;
use Closure;
use Illuminate\Http\Request;

class EnsureCurrentTeam
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->user()){
            $id = $request->user()->currentTeam->id;
            Agent::addGlobalScope(function($builder) use ($id) {
                $builder->where('team_id', $id);
            });

            Farmer::addGlobalScope(function($builder) use ($id){
                $builder->where('team_id', $id);
            });

        }

        return $next($request);
    }
}

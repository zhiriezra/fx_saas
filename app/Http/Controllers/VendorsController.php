<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorsController extends Controller
{
    public function index(){
        
        return view('vendors.index');
    }

    public function show($uuid){
        $vendor = Vendor::where('uuid', $uuid)->firstOrFail();
        return view('vendors.show', compact('vendor'));
    }
}

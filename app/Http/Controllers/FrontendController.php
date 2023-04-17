<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Address;
Use App\Models\Patient;
Use App\Models\Island;

class FrontendController extends Controller
{
    //
    public function index(){
        $patients = Patient::with('address.island')->get();
        $addresses = Address::with('island')->get();
       // dd($patients);
        return view('welcome', compact('patients','addresses'));
    }
}

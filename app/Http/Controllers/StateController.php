<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function getStates(){
        $states= State::where('status','active')->get();
        return $states;
    }
}

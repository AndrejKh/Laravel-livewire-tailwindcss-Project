<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function getCities(){
        $cities= City::where('status','active')->get();
        return $cities;
    }

    public function getCitiesByStateId($id){
        $cities= City::where('status','active')->where('state_id',$id)->get();
        return $cities;
    }
}

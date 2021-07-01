<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\City;
use App\Models\Delivery;
use App\Models\Item;
use App\Models\Product;
use App\Models\State;
use Illuminate\Http\Request;

class CompareController extends Controller
{
    public function index()
    {
        $states = State::where('status','active')->get();
        $cities = City::where('state_id', 1)->where('status', 'active')->get();
        return view('comparar.compare', compact('states','cities'));
    }

}

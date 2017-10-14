<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Distress;
use App\Volunteer;
use App\Resource;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function distresses(){
        return Distress::with('volunteers','location')->get();
    }
    public function volunteers(){
        return Volunteer::with('distresses')->get();
    }
    public function resources(){
        return Resource::with('location')->get();
    }

    public function index(){
        $resources = Resource::with('location')->get()->groupBy('type');
        $zombie_location = $resources['zombie'];
        $water_location = $resources['water'];
        $power_location = $resources['power'];
        $shelter_location = $resources['shelter'];

        $current_location = [
            'lat' => 33.891992,
            'lng' => -118.373088
        ];

        return view('pages.landing', compact('current_location', 'zombie_location', 'water_location', 'power_location', 'shelter_location'));
    }

    public function form(){
        $resources = Resource::with('location')->get()->groupBy('type');
        $zombie_location = $resources['zombie'];
        $water_location = $resources['water'];
        $power_location = $resources['power'];
        $shelter_location = $resources['shelter'];

        $current_location = [
            'lat' => 33.891992,
            'lng' => -118.373088
        ];
        return view('pages.emergency_form', compact('current_location', 'zombie_location', 'water_location', 'power_location', 'shelter_location'));
    }
}

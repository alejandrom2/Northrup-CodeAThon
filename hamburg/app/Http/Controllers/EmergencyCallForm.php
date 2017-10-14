<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Volunteer;
use App\Location;

class EmergencyCallForm extends Controller
{
    public function postForm(Request $request)
    {
    	// $request = new Request(['name'=>'dummy','phone_number'=>'3235293159','experience'=>'doctor','lat'=>'123','lng'=>'345']);
    	
    	$request->validate([
	        'name' => 'required',
	        'phone_number' => 'required',
	        'experience' => 'required',
    	]);
    	$volunteer = Volunteer::create([
    		'name' => $request->name,
    		'phone_number' => $request->phone_number,
    		'experience' => $request->experience
    	]);
    	$location = Location::create([
    		'lat' => $request->lat,
    		'lng' => $request->lng,
    		'source_type' => 'distress',
    		'source_id' => $volunteer['id']
    	]);
    }
}

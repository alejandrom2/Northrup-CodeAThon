<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Volunteer;

class EmergencyCallForm extends Controller
{
    public function postForm(Request $request)
    {
    	// $request = new Request(['name'=>'dummy','phone_number'=>'3235293159','experience'=>'doctor','lat'=>'123','long'=>'345']);
    	

    	// $request->validate([
	    //     'name' => 'required',
	    //     'phone_number' => 'required',
	    //     'experience' => 'required',
    	// ]);




    	$volunteer = Volunteer::create([
    		'name' => $request->name,
    		'phone_number' => $request->phone_number,
    		'experience' => $request->experience
    	]);

    	Location::create([
    		'lat' => $request->lat,
    		'long' => $request->long,
    		'source_type' => 'distress',
    		'source_id' => $volunteer['id']
    	]);
    }
}

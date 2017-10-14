<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Distress;
use App\Volunteer;
use App\Resource;

class VolunteerController extends Controller
{
    public function submit(Request $request) 
    {
    	Volunteer::create([
    		'name' => $request->name,
    		'phone_number' => $request->phone,
    		'experience' => $request->experience
    	]);

    	return redirect('/');
    }

    public function getVolunteers()
    {
    	$volunteers = Volunteer::all();

    	$distresses = Distress::with('locate')->get();

	    $current_location = [
	        'lat' => 33.891992,
	        'lng' => -118.373088
	    ];

	    // dd($distresses->first()->relations);
	    return view('pages.volunteer', compact('volunteers','distresses','current_location'));
    }
}

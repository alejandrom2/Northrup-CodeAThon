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
}

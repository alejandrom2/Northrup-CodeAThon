<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Location;
use App\Distress;
use App\Resource;

class EmergencyCallForm extends Controller
{
    public function postForm(Request $request)
    {
        $request->validate([
                 'name' => 'required',
                 'phone_number' => 'required',
                 'lat' => 'required',
                 'lng' => 'required'
         ]);

        if($request->has('safe')){
            $safe = true;
        }else $safe = false;

        $distress = Distress::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'safe' => $safe,
            'details' => $request->description
        ]);
        $location = Location::create([
            'lat' => $request->lat,
            'lng' => $request->lng,
            'source_type' => 'distress',
            'source_id' => $distress->id
        ]);
        if($request->has('resource')) {
            foreach($request->resource as $type => $resource) {
                Resource::create([
                    'type' => $type,
                    'reporter' => $distress->id,
                    'location_id' => $location->id
                ]);
            }
        }

        $current_location = [
            'lat' => 33.891992,
            'lng' => -118.373088
        ];

        return redirect()->back()->withInput([$current_location, $request->session()->flash('success','Emergency Form Received! Help is on its way ASAP!')]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\Distress;
use App\Resource;

class EmergencyCallForm extends Controller
{
    public function postForm(Request $request)
    {
        $distress = Distress::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'safe' => isset($request->safe) ? true : false,
            'details' => $request->description
        ]);
        $location = Location::create([
            // 'lat' => $request->lat,
            // 'long' => $request->long,
            'lat' => 100,
            'long' => 100,
            'source_type' => 'distress',
            'source_id' => $distress->id
        ]);
        foreach($request->resource as $key => $resource) {
            Resource::create([
                'type' => $key,
                'reporter' => $distress->id,
                'location_id' => $location->id
            ]);
        }

        return redirect('/form');
    }
}

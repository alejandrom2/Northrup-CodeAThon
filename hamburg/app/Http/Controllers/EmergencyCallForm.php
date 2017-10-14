<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\Distress;
use App\Resource;
use App\Http\Requests\UpdateLocation;

class EmergencyCallForm extends Controller
{
    public function postForm(UpdateLocation $request)
    {
        // dd($request->all());
        $distress = Distress::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'safe' => isset($request->safe) ? true : false,
            'details' => $request->description
        ]);
        $location = Location::create([
            'lat' => $request->lat,
            'lng' => $request->lng,
            'source_type' => 'distress',
            'source_id' => $distress->id
        ]);
        if(isset($request->resource)) {
            foreach($request->resource as $key => $resource) {
                Resource::create([
                    'type' => $key,
                    'reporter' => $distress->id,
                    'location_id' => $location->id
                ]);
            }
        }

        return redirect('/form');
    }
}

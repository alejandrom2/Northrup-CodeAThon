<?php

use Illuminate\Database\Seeder;
use App\Resource;
use App\Location;
use App\Distress;

class ResourcesLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$type = ['water','power','shelter','zombie'];
        for ($i=0; $i < 20; $i++) { 
        	$distress = Distress::create([
        		'name' => 'Fake',
        		'phone_number'=> '123456789',
        		'safe' => rand(0,1)
        	]);
        	$location = Location::create([
        		'lat' => rand(33.85*1000000, 33.9*1000000) / 1000000,
            'lng' => rand((-118.36)*1000000, (-118.39)*1000000) / 1000000,
        		'source_type' => 'resources'
        	]);
        	$resource = Resource::create([
        		'type' => array_random($type),
        		'reporter' => $distress->id,
        		'location_id' => $location->id
        	]);
        }
    }
}
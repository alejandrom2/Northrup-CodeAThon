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
        for ($i=0; $i < 10; $i++) { 
        	$distress = Distress::create([
        		'name' => 'Fake',
        		'phone_number'=> '123456789',
        		'safe' => rand(0,1)
        	]);
        	$location = Location::create([
        		'lat' => rand(0,100),
        		'long' => rand(0,100),
        		'source_type' => 'resource'
        	]);
        	$resource = Resource::create([
        		'type' => array_random($type),
        		'reporter' => $distress->id,
        		'location_id' => $location->id
        	]);
        }
    }
}
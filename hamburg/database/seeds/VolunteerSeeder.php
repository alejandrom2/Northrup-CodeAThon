<?php

use Illuminate\Database\Seeder;
use App\Volunteer;

class VolunteerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$values = [
    		'Alex Backhand' => 'My name is Alex, but some people call me Rick Grimes. I\'ve been killing zombies for years now.',
    		'Alejandro Martinez' => 'I have a tractor',
    		'Joshua' => 'I just wanna help',
    		'John Doe' => 'I lost my wife, Jane Doe in hurricane once. Never forget. Never again.',
    		'David Beckham' => 'Years of experience. Full arsenal, and bats at the ready.'
    	];
    	foreach($values as $key => $value) {
    		Volunteer::create([
    			'name' => $key,
    			'phone_number' => '1800hotbody',
    			'experience' => $value
    		]);
    	}
    }
}

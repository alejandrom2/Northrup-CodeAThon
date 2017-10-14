<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
	protected $table = 'volunteers';

	public function distresses()
	{
		return $this->belongsToMany('App\distress')->withPivot('distress_id','volunteer_id');
	}
}

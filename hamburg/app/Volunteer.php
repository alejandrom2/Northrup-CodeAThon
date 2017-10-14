<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
	protected $table = 'volunteers';
	protected $guarded = [];

	public function distresses()
	{
		return $this->belongsToMany('App\Distress')->withPivot('distress_id','volunteer_id');
	}
}

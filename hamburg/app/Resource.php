<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Volunteer;

class Resource extends Model
{
    protected $table = 'resources';
    protected $guarded = [];

    public function locate(){
		return $this->hasOne('App\Location','source_id','location_id');
	}
   
   public function location() {
	  return $this->locate()->where('source_type', '=', 'resources');
	}
}

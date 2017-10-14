<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Volunteer;
use App\Distress_volunteers;

class Distress extends Model
{
   protected $table = 'distresses';
   protected $guarded = [];

   public function volunteers()
   {
   		return $this->belongsToMany('App\Volunteer')->withPivot('distress_id','volunteer_id');
   }
   public function locate()
   {
 		return $this->hasOne('App\Location','id','location_id');
   }
   
   public function location() {
	  return $this->locate()->where('source_type', '=', 'distress');
	}
}

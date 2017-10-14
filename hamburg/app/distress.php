<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Volunteer;
use App\Distress_volunteers;

class Distress extends Model
{
   protected $table = 'distresses';

   public function volunteers()
   {
   		return $this->belongsToMany('App\Volunteer')->withPivot('distress_id','volunteer_id');
   }
}

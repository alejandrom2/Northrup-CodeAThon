<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cornford\Googlmapper\Mapper;

class TestController extends Controller
{
	// use Mapper;

	public function index()
	{
	    Mapper::map(53.381128999999990000, -1.470085000000040000);

	    return view('map');
	}
}

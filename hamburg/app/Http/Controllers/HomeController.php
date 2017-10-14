<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Distress;
use App\Volunteer;
use App\Resource;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function distresses()
    {
        return Distress::with('volunteers','location')->get();
    }
    public function volunteers()
    {
        return Volunteer::with('distresses')->get();
    }
    public function resources()
    {
        return Resource::with('location')->get();
    }
}

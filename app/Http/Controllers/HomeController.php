<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use App\Clickdumy;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cds = Clickdumy::all();
       //$role = \Auth::user()->role;

        return view('home',compact('cds'));
    }
}

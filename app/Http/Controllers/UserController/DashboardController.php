<?php

namespace App\Http\Controllers\UserController;
use App\Http\Controllers\Controller;
use App\Models\Station;


class DashboardController extends Controller
{
    public function index(){
        $stations = Station::orderBy('name','ASC')->get();
        return view('dashboard',compact('stations'));
    }
}

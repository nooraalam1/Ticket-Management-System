<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FareController extends Controller
{
    public function index(){
        return view('admin.fares.index');
    }
}

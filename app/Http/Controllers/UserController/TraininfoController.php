<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use App\Models\Train;
use Illuminate\Http\Request;

class TraininfoController extends Controller
{

    public function index(){
        $trains = Train::all();
        return view('user.traininfo.index',compact('trains'));
    }
}

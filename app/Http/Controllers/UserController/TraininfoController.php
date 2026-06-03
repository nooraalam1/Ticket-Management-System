<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TraininfoController extends Controller
{
    public function index(){
        return view('user.traininfo.index');
    }
}

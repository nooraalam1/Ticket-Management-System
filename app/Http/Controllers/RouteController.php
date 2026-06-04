<?php

namespace App\Http\Controllers;

use App\Models\Route;
use App\Models\RouteStop;
use App\Models\Station;
use App\Models\Train;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RouteController extends Controller
{
    public function index(){
        $trains = Train::all();
        $stations = Station::all();
        return view('admin.routes.index',compact('trains','stations'));
    }

    public function store(Request $request){

        $data = $request->validate([
            'train_id'=>['required'],
            'station_id'=>['required'],
            'stop_order'=>['required'],
            'arrival_time'=>['required'],
            'departure_time'=>['required'],
        ]);

        DB::beginTransaction();

        try{
            $route = Route::create([
                'train_id' => $request->train_id,
            ]);

            RouteStop::create([
                'route_id' => $route->id,
                'station_id' => $request->station_id,
                'stop_order' => $request->stop_order,
                'arrival_time' => $request->arrival_time,
                'departure_time' => $request->departure_time,
            ]);

            DB::commit();

            return redirect()->route('route.view')->with('success','Route Added Successfully');
        }

        catch(\Exception $e){
            DB::rollBack();

            return back()->with('error', $e->getMessage());
        }

    }

    public function view(){
        $trains = Train::all();
        $stations = Station::all();

        return view('admin.routes.view',compact('trains','stations'));
    }

}

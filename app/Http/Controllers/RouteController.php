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

            'station_id'=>['required','array'],
            'station_id.*'=>['required'],

            'stop_order'=>['required','array'],
            'stop_order.*'=>['required'],

            'arrival_time'=>['required','array'],
            'arrival_time.*'=>['required'],

            'departure_time'=>['required','array'],
            'departure_time.*'=>['required'],
        ]);

        DB::beginTransaction();

        try{
            $route = Route::create([
                'train_id' => $request->train_id,
            ]);
            foreach($request->station_id as $key=> $stationId){

                RouteStop::create([
                    'route_id' => $route->id,
                    'station_id' => $stationId,
                    'stop_order' => $request->stop_order[$key],
                    'arrival_time' => $request->arrival_time[$key],
                    'departure_time' => $request->departure_time[$key],
                ]);
            }

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

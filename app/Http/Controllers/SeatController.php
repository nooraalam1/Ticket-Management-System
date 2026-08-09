<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use App\Models\CoachName;
use App\Models\Seat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeatController extends Controller
{
    public function index(){
        $coaches = CoachName::all();
        return view('admin.seats.index',compact('coaches'));
    }

    public function store(Request $request){
        $data = $request->validate([
            'coach_name_id'=>['required'],
            'seat_number'=>['required'],
            'seat_type'=>['required']
        ]);
    $duplicate = DB::table('seats')
                ->where('coach_name_id',$request->coach_name_id)
                ->where('seat_number',$request->seat_number)
                ->exists();
    if($duplicate){
        return back()->with('error','This coach and seat already added');
    }
        else{
        Seat::create($data);

        return redirect()->route('seat.view')->with('success','Seat Added Successfully');
    }
    }

    public function view(){
        $seats = Seat::orderBy('seat_number','asc')->get();
        $coaches = CoachName::orderBy('name','asc')->get();
        return view('admin.seats.view',compact('seats','coaches'));
    }

    public function edit($id){
        $data = Seat::findOrFail($id);
        $coaches = Coach::all();
        return view('admin.seats.edit',compact('data','coaches'));
    }

    public function update(Request $request, $id){
        $seat = Seat::findOrFail($id);

        $data = $request->validate([
            'coach_id'=>['required',],
            'seat_number'=>['required'],
            'seat_type'=>['required']
        ]);

        $duplicate = DB::table('seats')
                    ->where('coach_id',$request->coach_id)
                    ->where('seat_number',$request->seat_number)
                    ->exists();
        if($duplicate){
        return back()->with('error','This coach and seat already added');
    }
        $seat->update($data);

        return redirect()->route('seat.view')->with('success','Updated Successfully');

    }

    public function delete($id){
        $data = Seat::findOrFail($id);
        $data->delete();

        return redirect()->route('seat.view')->with('success','Deleted Successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use App\Models\Train;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CoachController extends Controller
{
    public function index(){
        $trains = Train::all();
        return view('admin.coaches.index',compact('trains'));
    }
    public function store(Request $request){
        $data = $request->validate([
            'train_id'=>['required'],
            'name'=>['required'],
            'type'=>['required'],
        ]);

        $duplicate = DB::table('coaches')
                    ->where('train_id',$request->train_id)
                    ->where('name',$request->name)
                    ->exists();

        if($duplicate){
            return back()->withInput()->with('error','Train and Coach name is already added');
        }
        DB::beginTransaction();
        try{
            Coach::create($data);
            DB::commit();
            return redirect()->route('coach.view')->with('success','Coach Added Successfully');
        }
        catch(\Exception $e ){
            DB::rollBack();
            return back()->with('error',$e->getMessage());
        }
    }

    public function view()
    {
        $coaches = Coach::latest()->get();
        return view('admin.coaches.view', compact('coaches'));
    }

    public function edit($id)
    {
        $trains = Train::all();
        $coach = Coach::findOrFail($id);
        return view('admin.coaches.edit', compact('coach','trains'));
    }
    public function update(Request $request, $id)
    {
        $coach = Coach::findOrFail($id);
        $data = $request->validate([
            'train_id'=>['required'],
            'name'=>['required'],
            'type'=>['required'],
        ]);

        $duplicate = DB::table('coaches')
                    ->where('train_id',$request->train_id)
                    ->where('name',$request->name)
                    ->where('type',$request->type)
                    ->exists();

        DB::beginTransaction();
        try {
            
            $coach->update($data);

            DB::commit();

            return redirect()->route('coach.view')->with('success', 'Coach Updated Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }
    public function delete($id){
        $coach = Coach::findOrFail($id);
        $coach->delete();

        return redirect()->route('coach.view')->with('success','Deleted Successfully');
    }
}

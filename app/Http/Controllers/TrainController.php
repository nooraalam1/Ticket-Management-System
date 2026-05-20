<?php

namespace App\Http\Controllers;

use App\Models\Train;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrainController extends Controller
{
     public function index()
    {
        return view('admin.trains.index');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string','unique:trains,name'],
            'train_number' => ['required', 'string','unique:trains,train_number'],
        ]);
        DB::beginTransaction();
        try {
            Train::create($data);
            DB::commit();
            return redirect()->route('train.view')->with('success', 'Train Added Successfully');
        }
        catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    public function view()
    {
        $trains = Train::latest()->get();
        return view('admin.trains.view', compact('trains'));
    }

    public function edit($id)
    {
        $train = Train::findOrFail($id);
        return view('admin.trains.edit', compact('train'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => ['required', 'string','unique:trains,name'],
            'train_number' => ['required', 'string','unique:trains,train_number'],
        ]);
        DB::beginTransaction();
        try {
            $train = Train::findOrFail($id);
            $train->update($data);

            DB::commit();

            return redirect()->route('train.view')->with('success', 'Train Updated Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }
    public function delete($id){
        $train = Train::findOrFail($id);
        $train->delete();

        return redirect()->route('train.view')->with('success','Deleted Successfully');
    }
}

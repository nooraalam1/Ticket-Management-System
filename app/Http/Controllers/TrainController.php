<?php

namespace App\Http\Controllers;

use App\Models\Train;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class TrainController extends Controller
{
    public function index()
    {
        return view('admin.trains.index');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'unique:trains,name'],
            'train_number' => ['required', 'string', 'unique:trains,train_number'],
        ]);
        DB::beginTransaction();
        try {
            $train = Train::create($data);
            DB::commit();
            if ($request->ajax()) {
                return response()->json([
                    'success' => 'Train Added Successfully',
                    'train' => $train,
                ]);
            }
            return redirect()->route('train.view')->with('success', 'Train Added Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    public function view()
    {
        $trains = Train::orderBy('name', 'asc')->get();
        return view('admin.trains.view', compact('trains'));
    }

    public function edit($id)
    {
        $train = Train::findOrFail($id);
        return view('admin.trains.edit', compact('train'));
    }
    public function update(Request $request, $id)
    {
        $train = Train::findOrFail($id);

        $data = $request->validate([
            'name' => ['required', 'string', Rule::unique('trains', 'name')->ignore($train->id)],
            'train_number' => ['required', 'string', Rule::unique('trains', 'train_number')->ignore($train->id)],
        ]);
        DB::beginTransaction();
        try {

            $train->update($data);

            DB::commit();

            return redirect()->route('train.view')->with('success', 'Train Updated Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }
    public function delete($id)
    {
        $train = Train::findOrFail($id);
        $train->delete();

        return redirect()->route('train.view')->with('success', 'Deleted Successfully');
    }


    public function checkDuplicate(Request $request)
    {
        $name = Train::where('name',$request->name)->exists();
        $train_number = Train::where('train_number',$request->train_number)->exists();

        return response()->json([
            'name'=>$name,
            'train_number'=>$train_number,
        ]);
    }
}

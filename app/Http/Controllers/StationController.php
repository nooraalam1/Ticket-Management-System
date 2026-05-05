<?php

namespace App\Http\Controllers;

use App\Models\Station;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\alert;

class StationController extends Controller
{
    public function index()
    {
        return view('admin.stations.index');
    }
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->validate([
                'name' => ['required', 'string'],
                'code' => ['required', 'string'],
            ]);
            Station::create($data);
            DB::commit();
            return redirect()->route('station.view')->with('success', 'Station Added Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    public function view()
    {
        $stations = Station::latest()->get();
        return view('admin.stations.view', compact('stations'));
    }

    public function edit($id)
    {
        $station = Station::findOrFail($id);
        return view('admin.stations.edit', compact('station'));
    }
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $data = $request->validate([
                'name' => ['required', 'string'],
                'code' => ['required', 'string'],
            ]);
            $station = Station::findOrFail($id);
            $station->update($data);

            DB::commit();

            return redirect()->route('station.view')->with('success', 'Station Updated Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }
    public function delete($id){
        $station = Station::findOrFail($id);
        $station->delete();

        return redirect()->route('station.view')->with('success','Deleted Successfully');
    }
}

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
            return redirect()->route('stations.view')->with('success', 'Station Added Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    public function view()
    {
        return view('admin.stations.view');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coachname;
use Illuminate\Validation\Rule;

class CoachnameController extends Controller
{
    public function index(){
        return view('admin.coachname.index');
    }
    public function store(Request $request){
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255','unique:coach_names,name'],
        ]);
        Coachname::create($data);
        return redirect()->route('coachname.view')->with('success', 'Coach name created successfully');
    }
    public function view(){
        $coachnames = Coachname::latest()->get();
        return view('admin.coachname.view', compact('coachnames'));
    }
    public function edit($id){
        $data = Coachname::findOrFail($id);
        return view('admin.coachname.edit',compact('data'));
    }
    public function update(Request $request,$id){
        $coachname = Coachname::findOrFail($id);
        $data= $request->validate([
            'name' => ['required', 'string', 'max:255',Rule::unique('coach_names','name')->ignore($coachname->id)],
        ]);
        $coachname->update($data);
        return redirect()->route('coachname.view')->with('success','Updated Successfully');
    }
    public function delete($id){
        $data = Coachname::findOrFail($id);
        $data->delete($id);
        return redirect()->route('coachname.view')->with('success','Deleted Successfully');
    }
}

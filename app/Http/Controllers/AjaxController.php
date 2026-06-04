<?php

namespace App\Http\Controllers;

use App\Models\Train;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function trainName($id)
    {
        $data = Train::findOrFail($id);
        return response()->json([
            'id' => $data->id,
            'name' => $data->name,
        ]);
    }
}

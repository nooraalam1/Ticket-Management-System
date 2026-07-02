<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use App\Models\Train;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function trainName($id)
    {
        $train = Train::with('route.routeStops.station')->findOrFail($id);
        return response()->json([
            'train'=>$train,
        ]);
    }

    public function coachName($id){

        $coach = Coach::with('seats')->findOrFail($id);
        return response()->json([
            'coach'=>$coach,
        ]);
    }
}

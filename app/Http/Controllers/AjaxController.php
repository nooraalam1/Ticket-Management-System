<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use App\Models\Train;
use Illuminate\Http\Request;
use App\Models\CoachName;

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
        $data = CoachName::with('seatNo')->findOrFail($id);
        return response()->json([
            'coach'=>$data,
        ]);
    }
}

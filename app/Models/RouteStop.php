<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RouteStop extends Model
{
    protected $fillable = ['route_id','station_id','stop_order','arrival_time','departure_time'];

    protected $casts = [
        'arrival_time'=>'datetime:h:i A',
        'departure_time'=>'datetime:h:i A'
    ];
    public function route(){
        return $this->belongsTo(Route::class);
    }
    public function station()
    {
        return $this->belongsTo(Station::class);
    }
}

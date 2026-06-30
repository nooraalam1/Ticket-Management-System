<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $fillable = ['train_id'];

    public function train(){
        return $this->belongsTo(Train::class);
    }    public function routeStops(){
        return $this->hasMany(RouteStop::class);
    }
}

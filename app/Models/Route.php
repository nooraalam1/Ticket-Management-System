<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $fillable = ['train_id'];

    public function routeStops(){
        return $this->belongsTo(Route::class);
    }
}

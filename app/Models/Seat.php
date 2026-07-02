<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    protected $fillable = ['coach_id','seat_number','seat_type'];
    public function coach(){
        return $this->belongsTo(Coach::class);
    }

}

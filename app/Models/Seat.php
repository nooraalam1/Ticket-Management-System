<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    protected $fillable = ['coach_name_id','seat_number','seat_type'];
    public function coach(){
        return $this->belongsTo(Coach::class);
    }
    public function coachName(){
        return $this->belongsTo(CoachName::class,'coach_name_id');
    }
}

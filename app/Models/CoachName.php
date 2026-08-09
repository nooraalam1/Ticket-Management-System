<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoachName extends Model
{
    protected $fillable =[
        'name'
    ];

    public function seatNo(){
        return $this->hasMany(Seat::class);
    }
}

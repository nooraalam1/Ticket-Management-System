<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    protected $fillable = ['train_id','name','type'];

    public function train(){
        return $this->belongsTo(Train::class);
    }

}

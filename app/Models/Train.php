<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Train extends Model
{
    protected $fillable = ['name', 'train_number'];

    public function route(){
        return $this->hasOne(Route::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outdatedday extends Model
{
    use HasFactory;
    public function reservation(){
        return $this->hasOne(Reservation::class,'day_id','reservationID');

    }
}

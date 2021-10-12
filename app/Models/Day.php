<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Day extends Model
{
    use HasFactory;
    public function reservationID(){
        return $this->hasOne(User::class,'reservationID','id');
    }
}

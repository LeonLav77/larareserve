<?php
namespace App\Models;

use App\Models\User;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Day extends Model
{
    use HasFactory;

    // for more change
    public function reservation() : object
    {
        return $this->hasOne(Reservation::class, 'day_id', 'reservationID');
    }
}

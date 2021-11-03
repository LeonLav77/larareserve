<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    public function user() : object
    {
        return $this->belongsTo(User::class);
    }

    public function day() : object
    {
        return $this->belongsTo(Day::class);
    }
}

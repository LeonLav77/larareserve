<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\User;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class APIHandler extends Controller
{
    public function AllDates(){
        $dates = Cache::remember('users', 5, function () {
            return Day::all();
        });
        return json_encode($dates);
    }
    public function specificDate(Request $request){
        $date = $request->date;
        $dates = Day::where('date', $date)->get();
        return json_encode($dates);
    }
    public function specificDateAndTime(Request $request){
        $date = $request->date;
        $time = $request->time;
        $dates = Day::where('date', $date)->where('vrijeme', $time)->get();
        return json_encode($dates);
    }
    public function reserveDate(Request $request){
        $date = $request->date;
        $time = $request->time;
        $day_id = 6;
        $thatDate = Day::where('date', $date)->where('vrijeme', $time);
        $reservation = Reservation::insert([
            'user_id' => Auth::user()->id,
            'day_id' => $thatDate->select('id')->get()[0]['id'],
            'date' => $date,
            'time' => $time,
            'created_at' => now(),
        ]);
        $dates = $thatDate->update(['status' => 'occupied','reservationID'=> 1]);
        return json_encode('success');
    }
    public function checkIfLoggedIn(){
        if(Auth::check()){
            return json_encode("LOGGED IN");
        }
        return json_encode("NOT LOGGED IN");
    }
    public function myReservations(){
        $reservations = Auth::user()->reservations;
        return json_encode($reservations);
    }
    public function specificReservation(request $request){
        $date = $request->date;
        $time = $request->time;
        $reservation = Reservation::where('date', $date)->where('time', $time)->get();
        return json_encode($reservation);
    }
    public function userInfo(request $request){
        $id = $request->id;
        $user = User::where('id', $id)->get();
        return json_encode($user);
    }
}

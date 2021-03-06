<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Day;
use App\Models\User;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class APIHandler extends Controller
{
    //C:/Users/Leon/Desktop/calender/larareserve/app/Http/Controllers/APIHandler.php
    public function AllDates() : string
    {
        // $dates = Cache::remember('allDates', 50, function () {
        $dates = Cache::rememberForever('allDates', function () {
            return Day::all();
        });
        return json_encode($dates) ?: '';
    }

    public function specificDate(Request $request) : string
    {
        $date = $request->date;
        $dates = Cache::rememberForever($date, function () use ($date) {
            return Day::where('date', $date)->get();
        });
        return json_encode($dates) ?: '';
    }

    public function specificDateAndTime(Request $request) : string
    {
        $date = $request->date;
        $time = $request->time;
        $dates = Day::where('date', $date)->where('time', $time)->get();
        return json_encode($dates) ?: '';
    }

    public function reserveDate(Request $request) : string
    {
        $date = $request->date;
        $time = $request->time;
        if (Cache::has('allDates')) {
            Cache::forget('allDates');
        }
        if (Cache::has($date)) {
            Cache::forget($date);
        }
        $thatDate = Day::where('date', $date)->where('time', $time);
        if ($thatDate->select('status')->get()[0]['status'] == 'occupied') {
            return json_encode('OCCUPIED') ?: '';
        }
        $reservation = Reservation::insertGetId([
            'user_id' => Auth::user()->id,
            'day_id' => $thatDate->select('id')->get()[0]['id'],
            'date' => $date,
            'time' => $time,
            'created_at' => now(),
        ]);
        $dates = $thatDate->update(['status' => 'occupied', 'reservationID' => $reservation]);
        return json_encode('success') ?: '';
    }

    public function checkIfLoggedIn() : string
    {
        if (Auth::check()) {
            return json_encode('LOGGED IN') ?: '';
        }
        return json_encode('NOT LOGGED IN') ?: '';
    }

    public function myReservations() : string
    {
        return json_encode(Auth::user()->reservations) ?: '';
    }

    public function specificReservation(request $request) : string
    {
        $date = $request->date;
        $time = $request->time;
        $reservation = Reservation::where('date', $date)->where('time', $time)->get();
        return json_encode($reservation) ?: '';
    }

    public function userInfo(request $request) : string
    {
        $user = Auth::user();
        return json_encode($user) ?: '';
    }
}

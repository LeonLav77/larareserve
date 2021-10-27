<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Day;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 1; $i <= 10; $i++) {
                DB::table('reservations')->insert([
                    'date' => Carbon::now()->addDays($i)->format('Y-m-d'),
                    'time' => '8',
                    'expiryDate' =>Carbon::now()->addMonths(2)->format('Y-m-d'),
                    'user_id' => 1,
                    'day_id' => $i,
                    'created_at' => now()
                ]);
        }
    }
}

<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Day;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function entry(){
            $this->lastRecord = Day::latest('created_at')->first();

            $this->newTime = $this->lastRecord->vrijeme + 2;

            $this->newDate = Carbon::parse($this->lastRecord->date)->addDay();
            $this->newDate = $this->newDate->format('Y-m-d');

            $this->today = $this->lastRecord->date;

            if($this->newTime == 24) {
                $this->newTime = 8;
                $this->today = $this->newDate;
            }

            DB::table('days')->insert([
                'date' => $this->today,
                'vrijeme' => $this->newTime,
                'status' => 'free',
                'created_at' => now()
            ]);
            
    }
    public function run()
    {
        for($i = 1; $i <= 960; $i++) {
            sleep(1);
            if(Day::latest('created_at')->first() == null){
                DB::table('days')->insert([
                    'date' => Carbon::now()->format('Y-m-d'),
                    'vrijeme' => 8,
                    'status' => 'free',
                    'created_at' => now()
                ]);
            }else{
                $this->entry();
            }
        }
    }

}
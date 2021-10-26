<?php

namespace App\Console;

use Carbon\Carbon;
use App\Models\Day;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function () {
            DB::table('test')->delete();
            // Day::where('date',Carbon::now()->format('Y-m-d'))->delete();
            $this->todaysDate = Carbon::now()->format('Y-m-d');
            // PROMJENIT U EXPIRYDATE
            Day::where('date',$this->todaysDate)
                ->each(function ($oldRecord) {
                $newRecord = $oldRecord->replicate();
                $newRecord->setTable('outdateddays');
                $newRecord->expiryDate = Carbon::parse($this->todaysDate)->addMonths(2);
                $newRecord->save();
            
                $oldRecord->delete();
              });
            // PROMJENIT U EXPIRYDATE
            DB::table('outdatedDays')->where('date',$this->todaysDate)->delete();
            if(Day::latest('created_at')->first() == null){
                DB::table('days')->insert([
                    'date' => $this->todaysDate,
                    'expirydate' => Carbon::now()->addMonths(4)->format('Y-m-d'),
                    'vrijeme' => 8,
                    'status' => 'free',
                    'created_at' => now()
                ]);
            }
            for ($i = 0; $i < 8; $i++) {
                $this->lastRecord = Day::latest()->first();
                $this->newTime = $this->lastRecord->vrijeme + 2;
                $this->today = $this->lastRecord->date;
                $this->expiryDate = Carbon::parse($this->lastRecord->date)->addMonths(4);
                $this->newDate = Carbon::parse($this->lastRecord->date)->addDay();
                $this->newDate = $this->newDate->format('Y-m-d');
                if($this->newTime == 24) {
                    $this->newTime = 8;
                    $this->today = $this->newDate;
                }
                DB::table('days')->insert([
                    'date' => $this->today,
                    'expiryDate' => $this->expiryDate,
                    'vrijeme' => $this->newTime,
                    'status' => 'free',
                    'created_at' => now()
                ]);
                sleep(1);
                
            }

        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

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
            for ($i = 0; $i < 8; $i++) {
                sleep(1);
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

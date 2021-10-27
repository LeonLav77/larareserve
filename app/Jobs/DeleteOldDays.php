<?php

namespace App\Jobs;

use Carbon\Carbon;
use App\Models\Day;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class DeleteOldDays implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        DB::table('test')->delete();
            $this->todaysDate = Carbon::now()->format('Y-m-d');
            // IF THIS DAY HAS PASSED MOVE TO OUTDATED TABLE
            Day::where('date', '<',$this->todaysDate)
                ->each(function ($oldRecord) {
                $newRecord = $oldRecord->replicate();
                $newRecord->setTable('outdateddays');
                $newRecord->expiryDate = Carbon::parse($this->todaysDate)->addMonths(2);
                $newRecord->save();
            
                $oldRecord->delete();
              });
            // IF TODAY IS THE EXPIRY DATE DELETE IT
            DB::table('outdatedDays')->where('expiryDate',$this->todaysDate)->delete();

            DB::table('reservations')->where('expiryDate', '<',$this->todaysDate)->delete();

            // IF ITS THE FIRST DAY ADD IT AS TODAY
            if(Day::latest('created_at')->first() == null){
                DB::table('days')->insert([
                    'date' => $this->todaysDate,
                    'time' => 8,
                    'status' => 'free',
                    'created_at' => now()
                ]);
            }
            // ADDS A NEW DAY
            for ($i = 0; $i < 8; $i++) {
                $this->lastRecord = Day::latest()->first();
                $this->newTime = $this->lastRecord->time + 2;
                $this->today = $this->lastRecord->date;
                $this->newDate = Carbon::parse($this->lastRecord->date)->addDay();
                $this->newDate = $this->newDate->format('Y-m-d');
                if($this->newTime == 24) {
                    $this->newTime = 8;
                    $this->today = $this->newDate;
                }
                DB::table('days')->insert([
                    'date' => $this->today,
                    'time' => $this->newTime,
                    'status' => 'free',
                    'created_at' => now()
                ]);
                sleep(1);
            }
    }
}

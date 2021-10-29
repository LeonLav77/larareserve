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
    public function entry()
    {
        $this->lastRecord = Day::latest()->first();

        $this->newTime = $this->lastRecord->time + 2;

        $this->newDate = Carbon::parse($this->lastRecord->date)->addDay();
        $this->newDate = $this->newDate->format('Y-m-d');
        $this->expiryDate = Carbon::parse($this->lastRecord->date)->addMonths(4);

        $this->today = $this->lastRecord->date;

        if ($this->newTime == 24) {
            $this->newTime = 8;
            $this->today = $this->newDate;
        }

        DB::table('days')->insert([
            'date' => $this->today,
            'time' => $this->newTime,
            'status' => 'free',
            'created_at' => now()
        ]);
    }

    public function run()
    {
        for ($i = 1; $i <= 960; $i++) {
            sleep(1);
            if (Day::latest()->first() == null) {
                DB::table('days')->insert([
                    'date' => Carbon::now()->format('Y-m-d'),
                    'time' => 8,
                    'status' => 'free',
                    'created_at' => now()
                ]);
            } else {
                $this->entry();
            }
        }
    }
}

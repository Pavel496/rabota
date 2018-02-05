<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Vacancy;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \Spatie\ModelCleanup\CleanUpModelsCommand::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        $schedule->command('clean:models')->daily();
	
        $schedule->call(function () {
            include('zadanie.php');
            foreach ($collection as $item) {
                $haverecord = Vacancy::where('phone_temp', $item['phone_temp'])->where('text', $item['text'])->first();
                 if (! $haverecord) {
                   //$item = array_add($item, 'created_by_id', 1);     
                   Vacancy::create($item);
                }
            }
        })->everyFiveMinutes();
        
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

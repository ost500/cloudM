<?php

namespace App\Console;

use App\Jobs\ApplyEndEmail;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Log;


class Kernel extends ConsoleKernel
{
    use DispatchesJobs;
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        $schedule->call(function () {
            Log::info('applyEnd task worked!');
            $this->dispatch(new ApplyEndEmail());

        })->daily()->at('09:00');
    }
}

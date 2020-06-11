<?php

namespace App\Console;

use App\CustomClass\StoreAllNbaPlayers;
use App\CustomClass\storeAllNbaTeams;
use App\CustomClass\StoreNbaPlayerData;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\CustomClass\StoreAllNbaTeams::class,
        \App\CustomClass\StoreNbaPlayerData::class,
        \App\CustomClass\StoreAllNbaPlayers::class,
        \App\CustomClass\StoreAllNbaPlayerInjuryData::class,
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


        $schedule->command('StoreAllNbaTeams')->everyMinute();


        $schedule->command('StoreNbaPlayerData')->everyMinute();


        $schedule->command('StoreAllNbaPlayers')->weeklyOn(1, '8:00');
        $schedule->command('StoreNbaPlayerInjuryData')->weeklyOn(1, '8:00');


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

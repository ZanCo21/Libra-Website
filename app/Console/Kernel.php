<?php

namespace App\Console;

use App\Http\Controllers\PeminjamanController;
use App\Jobs\HitungDenda;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            $controller = new PeminjamanController();
            $controller ->HitungDenda();
        })->dailyAt('00:01')
        ->timezone('Asia/Jakarta'); 

        $schedule->call(function () {
        $controller = new PeminjamanController();
            $controller ->RejectBatasPeminjaman();
        })->dailyAt('00:01')
        ->timezone('Asia/Jakarta'); 
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}

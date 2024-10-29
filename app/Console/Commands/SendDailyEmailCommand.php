<?php

namespace App\Console\Commands;

use App\Jobs\SendDailyEmail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SendDailyEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-daily-email-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        SendDailyEmail::dispatch();
        Log::info("Daily Pending tasks job dispatched!");
       
    }
}

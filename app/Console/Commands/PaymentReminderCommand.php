<?php

namespace App\Console\Commands;
use App\Models\User;

use Illuminate\Console\Command;
use App\Jobs\PaymentReminderJob;

class PaymentReminderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:payment-reminder-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command for payment reminder per user subscription';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $user = User::find(1);
        // Dispatch the job
        PaymentReminderJob::dispatch($user);
    }
}

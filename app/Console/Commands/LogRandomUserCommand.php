<?php

namespace App\Console\Commands;

use App\Jobs\LogRandomUserJob;
use Illuminate\Console\Command;

class LogRandomUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'log:random-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'It disptaches a job that logs a random user to laravel log';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        dispatch(new LogRandomUserJob);

        $this->info('Job dispatched to log random user');

        return Command::SUCCESS;
    }
}

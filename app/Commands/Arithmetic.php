<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;
use NXP\MathExecutor;

class Arithmetic extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'size';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Calculator for arithmetic expressions';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $input = $this->ask('Please input expressions?');

        $executor = new MathExecutor();
        $result = $executor->execute($input);
        $this->info($input . " = " . $result);

//        echo $executor->execute('1 + 2 * (2 - (4+10))^2 + sin(10)').PHP_EOL;
//        echo $executor->execute('1 + 2 * (2 - (4+10))').PHP_EOL;
    }

    /**
     * Define the command's schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}

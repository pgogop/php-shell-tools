<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class Temp extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'temp';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $arr = [
            "k" => "v",
            "k1" => "v1-超",
        ];

        dump(json_decode(json_encode($arr)));
        $this->info(json_encode($arr,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE));
    }

    /**
     * Define the command's schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}

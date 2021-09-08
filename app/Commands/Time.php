<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class Time extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'time';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'time operation';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $action = $this->choice('What do u want?', ['time2date', 'date2time'], "0");
        $timezone = $this->anticipate('Please input timezone', [], 'Asia/Shanghai');
        try {
            if (!date_default_timezone_set($timezone)) {
                $this->error("invalid timezone:" . $timezone);
                return;
            }
        } catch (\Exception $e) {
            $this->error("invalid timezone:" . $timezone);
            return;
        }

        switch ($action) {
            case "time2date":
                $input = $this->ask('Please input time?');
                $this->info("output: " . date("Y-m-d H:i:s", $input));
                break;
            case "date2time":
                $input = $this->ask('Please input date?');
                $this->info("output: " . strtotime($input));
                break;
        }
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

<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class Json extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'json';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'json format';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $input = $this->ask('input your json string');

        $decode = json_decode($input);
        if (!$decode) {
            $this->error(json_last_error_msg());
            return;
        }

        dump($decode);

        if ($this->confirm("是否需要导出结果?")) {
            $filepath = $this->anticipate('请输入导出文件路径', [], sys_get_temp_dir() . uniqid() . '.json');
            file_put_contents($filepath, json_encode($decode, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
            $this->info("导出到文件：" . $filepath);
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

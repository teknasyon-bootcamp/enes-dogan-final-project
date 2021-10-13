<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MaintenanceModeOffCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'maintenance:off';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Turn off maintenance mode';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {

            unlink(storage_path('framework/maintenance.php'));
            $this->comment('Application is now turned off maintenance mode.');
            return 0;
        } catch (Exception $e) {
            $this->error('Failed to turn off maintenance mode.');

            $this->error($e->getMessage());

            return 1;
        }
    }
}

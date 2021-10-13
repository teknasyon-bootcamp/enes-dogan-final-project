<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MaintenanceModeOnCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'maintenance:on';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Turn on maintenance mode';

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
            file_put_contents(storage_path('framework/maintenance.php'), '
            <?php
            echo "We are in maintanance mode";
            die();
            ');

            $this->comment('Application is now in maintenance mode.');
            return 0;
        } catch (Exception $e) {
            $this->error('Failed to enter maintenance mode.');

            $this->error($e->getMessage());

            return 1;
        }
    }
}

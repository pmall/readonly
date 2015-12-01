<?php

namespace Pmall\Readonly;

use Illuminate\Console\Command;

class StartReadOnlyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'readonly:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start readonly mode';

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
     * @return mixed
     */
    public function handle()
    {
        touch($this->laravel->storagePath().'/framework/readonly');

        $this->info('Application is now in readonly mode.');
    }
}

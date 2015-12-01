<?php

namespace Pmall\Readonly;

use Illuminate\Console\Command;

class StopReadOnlyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'readonly:stop';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Stop readonly mode';

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
        @unlink($this->laravel->storagePath().'/framework/readonly');

        $this->info('Application now allow write.');
    }
}

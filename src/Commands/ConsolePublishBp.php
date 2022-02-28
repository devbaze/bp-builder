<?php

namespace Devbaze\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;

class ConsolePublishBp extends Command
{
    protected $name = 'publish:bp';
    protected $description = 'Setup a new site the BP way';
    protected $type = 'Console command';

    protected function getOptions()
    {
        return [
            [ 'force', 'F', InputOption::VALUE_NONE, 'Force Filer Overwrite' ],
        ];
    }

    public function handle()
    {
        $force = $this->option('force') ? ['--force' => true ]: [];
        $this->call('publish:builder', $force);
        $this->call('publish:base-files', $force);
        $this->call('publish:acf', $force);
        return $this->info("Setup finished!");
    }
}

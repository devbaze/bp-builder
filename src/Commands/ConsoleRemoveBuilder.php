<?php

namespace Devbaze\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class ConsoleRemoveBuilder extends Command
{
    protected $name = 'remove:builder';
    protected $description = 'Remove a Flexible Component Blade Template';
    protected $type = 'Console command';

    protected function getArguments()
    {
        return [
            [ 'name', InputArgument::REQUIRED, 'The name of the class' ],
        ];
    }

    protected function getOptions()
    {
        return [
            [ 'scripts', 'Y', InputOption::VALUE_NONE, 'Also Remove Scripts' ],
        ];
    }

    public function handle()
    {
        $name = $this->argument('name');
        $this->info($name . " yolo!");
        $this->call('remove:builder-controller', [ 'name' => $name ]);
        $this->call('remove:builder-style', [ 'name' => $name ]);
        $this->call('remove:builder-template', [ 'name' => $name ]);
        if ($this->option('scripts')) {
            $this->call('remove:builder-script', [ 'name' => $name ]);
        }

        return $this->info($name . " finished!");
    }
}

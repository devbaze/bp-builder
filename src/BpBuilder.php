<?php

namespace Devbaze;

use Illuminate\Console\Application as Console;

class BpBuilder
{
    public function __construct()
    {
        if (!function_exists('get_template_directory')) {
            return;
        }
        $commands = [
            'Devbaze\Commands\ConsoleMakeBuilderController',
            'Devbaze\Commands\ConsoleMakeBuilderStyle',
            'Devbaze\Commands\ConsoleMakeBuilderTemplate',
            'Devbaze\Commands\ConsoleMakeBuilderScript',
            'Devbaze\Commands\ConsoleMakeBuilder',
            'Devbaze\Commands\ConsoleRemoveBuilderController',
            'Devbaze\Commands\ConsoleRemoveBuilderStyle',
            'Devbaze\Commands\ConsoleRemoveBuilderTemplate',
            'Devbaze\Commands\ConsoleRemoveBuilderScript',
            'Devbaze\Commands\ConsoleRemoveBuilder',
            'Devbaze\Commands\ConsolePublishBuilder',
            'Devbaze\Commands\ConsolePublishBaseFiles',
            'Devbaze\Commands\ConsolePublishAcf',
            'Devbaze\Commands\ConsolePublishBp',
            'Devbaze\Commands\ConsoleAddBuilder',
        ];

        Console::starting(function ($console) use ($commands) {
            foreach ($commands as $command) {
                $console->resolve($command);
            }
        });

        Builder::getInstance();
        new BuilderComposer();
    }
}

new BpBuilder();

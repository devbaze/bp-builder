<?php

namespace Devbaze\Commands;

class ConsoleRemoveBuilderController extends CommandRemove
{
    protected $name = 'remove:builder-controller';
    protected $description = 'Make a Flexible Component Controller';
    protected $type = 'Console command';

    protected function getFileName($name)
    {
        return $name . ".php";
    }

    protected function getPath()
    {
        return \get_theme_file_path() . '/app/View';
    }

    protected function getSubfolder()
    {
        return '/Builder';
    }
}

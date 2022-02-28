<?php

namespace Devbaze\Commands;

use Symfony\Component\Console\Input\InputOption;

class ConsolePublishBuilder extends CommandPublish
{
    protected $name = 'publish:builder';
    protected function getOptions()
    {
        return [
            [ 'force', 'F', InputOption::VALUE_NONE, 'Force Filer Overwrite' ],
        ];
    }
    protected $description = 'Add in the default files for builder';
    protected $type = 'Console command';
    protected $publish_files = [
        '/stubs/builder/publish/BuilderComposer.php' => [ 'dir' => '/app/View/Composers', 'file' => 'Builder.php' ],
        '/stubs/builder/publish/AppJS.js'         => [ 'dir' => '/resources/assets/scripts', 'file' => 'app.js' ],
        '/stubs/builder/publish/AppScss.scss'     => [ 'dir' => '/resources/assets/styles', 'file' => 'app.scss' ],
        '/stubs/builder/publish/IndexJs.js'       => [ 'dir' => '/resources/assets/scripts/builder', 'file' => 'index.js' ],
        '/stubs/builder/publish/IndexScss.scss'   => [ 'dir' => '/resources/assets/styles/builder', 'file' => 'index.scss' ],
        '/stubs/builder/publish/Filters.php'   => [ 'dir' => '/app', 'file' => 'filters.php' ],
    ];
}

<?php

namespace Devbaze\Commands;

use Symfony\Component\Console\Input\InputOption;

class ConsolePublishBaseFiles extends CommandPublish
{
    protected $name = 'publish:base-files';
    protected function getOptions()
    {
        return [
            [ 'force', 'F', InputOption::VALUE_NONE, 'Force Filer Overwrite' ],
        ];
    }
    protected $description = 'Add in the default files for Benjamin Pelto';
    protected $type = 'Console command';
    protected $publish_files = [
        '/stubs/bp/publish/scripts/common/index.js'          => [ 'dir' => '/resources/assets/scripts/common', 'file' => 'index.js' ],
        '/stubs/bp/publish/scripts/common/responsive-bgs.js' => [ 'dir' => '/resources/assets/scripts/common', 'file' => 'responsive-bgs.js' ],

        '/stubs/bp/publish/styles/common/fonts.scss'             => [ 'dir' => '/resources/assets/styles/common', 'file' => 'fonts.scss' ],
        '/stubs/bp/publish/styles/common/global.scss'            => [ 'dir' => '/resources/assets/styles/common', 'file' => 'global.scss' ],
        '/stubs/bp/publish/styles/common/grid.scss'              => [ 'dir' => '/resources/assets/styles/common', 'file' => 'grid.scss' ],
        '/stubs/bp/publish/styles/common/index.scss'             => [ 'dir' => '/resources/assets/styles/common', 'file' => 'index.scss' ],
        '/stubs/bp/publish/styles/common/mixins.scss'            => [ 'dir' => '/resources/assets/styles/common', 'file' => 'mixins.scss' ],
        '/stubs/bp/publish/styles/common/spacing-modifiers.scss' => [ 'dir' => '/resources/assets/styles/common', 'file' => 'spacing-modifiers.scss' ],
        '/stubs/bp/publish/styles/common/variables.scss'         => [ 'dir' => '/resources/assets/styles/common', 'file' => 'variables.scss' ],

        '/stubs/bp/publish/views/partials/bg.blade.php'           => [ 'dir' => '/resources/views/partials', 'file' => 'bg.blade.php' ],
        '/stubs/bp/publish/views/partials/content-page.blade.php' => [ 'dir' => '/resources/views/partials', 'file' => 'content-page.blade.php' ],
    ];
}

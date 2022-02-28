<?php

namespace Devbaze\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;

class ConsoleAddBuilder extends Command
{
    protected $name = 'add:builder';
    protected $description = 'Add Builder to a post';
    protected $type = 'Console command';

    protected function getArguments()
    {
        return [
            [ 'builder', InputArgument::REQUIRED, 'The name of the builder class' ],
            [ 'post_id', InputArgument::REQUIRED, 'The post_id of the post' ],
        ];
    }

    public function handle()
    {
        $builder = $this->argument('builder');
        $builder_under = $this->from_camel_case($builder);
        $post_id = $this->argument('post_id');
        $field_name = 'flexible_sections';
        $current_builder = get_field($field_name, $post_id);
        $current_builder[] = [ 'acf_fc_layout' => $builder_under ];
        update_field($field_name, $current_builder, $post_id);
    }

    public function from_camel_case($input, $glue = '_')
    {
        preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $input, $matches);
        $ret = $matches[ 0 ];
        foreach ($ret as &$match) {
            $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
        }
        return implode($glue, $ret);
    }
}

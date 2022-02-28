<?php

namespace Devbaze;

use StoutLogic\AcfBuilder\FieldsBuilder;

class Builder
{
    private static $instance = null;
    public $name = 'flexible_sections';
    public $sections = [];
    public $builder;

    public function __construct()
    {
        $this->load_flexible_component_classes();
        $this->build_flexible_components();
        add_action('acf/init', [ $this, 'build' ]);
    }

    public function load_flexible_component_classes()
    {
        $files = glob(\get_template_directory() . '/app/View/Builder/*.php');
        foreach ($files as $file) {
            require_once $file;
            $section_name = basename($file, '.php');
            $class = 'App\View\Builder\\' . $section_name;
            if (class_exists($class)) {
                $this->sections[ $section_name ] = new $class;
            }
        }
    }

    public function build_flexible_components()
    {
        $this->builder = new FieldsBuilder($this->name);
        $this->builder->addFlexibleContent($this->name, [
            'button_label' => 'Add Section',
        ]);

        foreach ($this->sections as $section) {
            $this->builder->getField($this->name)->addLayout($section->fields());
        }
    }

    public function build()
    {
        $this->builder = apply_filters('bp_flexible_component_before_build', $this->builder);
        \acf_add_local_field_group($this->builder->build());
    }

    public function from_camel_case($input)
    {
        preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $input, $matches);
        $ret = $matches[ 0 ];
        foreach ($ret as &$match) {
            $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
        }
        return implode('_', $ret);
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Builder();
        }

        return self::$instance;
    }
}

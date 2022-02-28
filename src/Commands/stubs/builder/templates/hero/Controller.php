<?php

namespace App\View\Builder;

use Devbaze\BuilderComponent;

class BuilderNameCap extends BuilderComponent
{
    public $name = 'BuilderNameUnderscores';

    public function content_fields()
    {
        $fields = $this->builder($this->name);
        $fields
            ->addWysiwyg('hero_content');

        return $fields;
    }

    public function settings_fields()
    {
        $fields = $this->builder($this->name);
        $fields
            ->addTrueFalse('hide_section', [
                'ui'          => 1,
            ])
            ->addSelect('hero_type', [ 'choices' => [
                'type1'   => 'Hero 1',
                'type2'    => 'Hero 2',
            ] ]);
        return $fields;
    }

    public function with()
    {
        return [
            'hero_content',
            'hero_type'
        ];
    }
}

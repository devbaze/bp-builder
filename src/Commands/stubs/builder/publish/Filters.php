<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
});

add_filter('bp_flexible_component_before_build', function ($builder) {
    $builder->setLocation('post_type', '==', 'page');
    $builder->setGroupConfig('hide_on_screen', [ 'the_content' ]);
    $builder->setGroupConfig('position', 'acf_after_title');
    return $builder;
});

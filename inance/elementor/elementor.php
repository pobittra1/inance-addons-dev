<?php

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

function register_oembed_widget($widgets_manager)
{

    require_once(__DIR__ . '/widgets/heroSection.php');

    $widgets_manager->register(new \heroSection_Widget());
}
add_action('elementor/widgets/register', 'register_oembed_widget');

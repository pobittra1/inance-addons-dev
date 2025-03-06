<?php

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

function register_oembed_widget($widgets_manager)
{

    require_once(__DIR__ . '/widgets/heroSection.php');
    require_once(__DIR__ . '/widgets/aboutSection.php');
    require_once(__DIR__ . '/widgets/professionalSection.php');
    require_once(__DIR__ . '/widgets/serviceSection.php');
    require_once(__DIR__ . '/widgets/footerSection.php');
    require_once(__DIR__ . '/widgets/infoSection.php');

    $widgets_manager->register(new \heroSection_Widget());
    $widgets_manager->register(new \aboutSection_Widget());
    $widgets_manager->register(new \professionalSection_Widget());
    $widgets_manager->register(new \serviceSection_Widget());
    $widgets_manager->register(new \footerSection_Widget());
    $widgets_manager->register(new \infoSection_Widget());
}
add_action('elementor/widgets/register', 'register_oembed_widget');

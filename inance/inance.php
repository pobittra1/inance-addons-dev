<?php

/**
 * Plugin Name: Inance
 * Plugin URI: http://example.com/inance
 * Description: A custom plugin for managing finances.
 * Version: 1.0.0
 * Author: Your Name
 * Author URI: http://example.com
 * License: GPL2
 */

// Your plugin code starts here


include_once('elementor/elementor.php');

function inance_enqueue_assets()
{
    // Enqueue all CSS files in the assets/css directory
    foreach (glob(plugin_dir_path(__FILE__) . 'assets/css/*.css') as $file) {
        wp_enqueue_style('inance-' . basename($file, '.css'), plugin_dir_url(__FILE__) . 'assets/css/' . basename($file));
    }

    // Enqueue all JavaScript files in the assets/js directory
    foreach (glob(plugin_dir_path(__FILE__) . 'assets/js/*.js') as $file) {
        wp_enqueue_script('inance-' . basename($file, '.js'), plugin_dir_url(__FILE__) . 'assets/js/' . basename($file), array('jquery'), null, true);
    }
}
add_action('wp_enqueue_scripts', 'inance_enqueue_assets');

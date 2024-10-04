<?php
function easy_map_scripts(): void
{
    wp_enqueue_style('easy-map-leaflet-css', plugin_url . '/assets/css/leaflet.css', array(), version);
    wp_enqueue_script('easy-map-leaflet-js', plugin_url . '/assets/js/leaflet.js', array('jquery'), version, true);
    wp_enqueue_script('easy-map-custom-js', plugin_url . '/assets/js/custom.js', array('jquery'), version, true);
}
add_action('wp_enqueue_scripts', 'easy_map_scripts');


function easy_map_custom_admin_icon_css(): void
{
    wp_enqueue_style('easy-map-custom-admin', plugin_url . '/assets/css/admin.css', array(), version);
}

add_action('elementor/editor/after_enqueue_scripts', 'easy_map_custom_admin_icon_css');
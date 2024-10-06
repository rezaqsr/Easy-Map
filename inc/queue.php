<?php
function emfe_scripts(): void
{
    wp_enqueue_style('emfe-map-css', emfe_plugin_url . '/assets/css/leaflet.css', array(), emfe_version);
    wp_enqueue_script('emfe-map-js', emfe_plugin_url . '/assets/js/leaflet.js', array('jquery'), emfe_version, true);
    wp_enqueue_script('emfe-custom-js', emfe_plugin_url . '/assets/js/custom.js', array('jquery'), emfe_version, true);
}
add_action('wp_enqueue_scripts', 'emfe_scripts');


function emfe_admin_scripts(): void
{
    wp_enqueue_style('emfe-admin', emfe_plugin_url . '/assets/css/admin.css', array(), emfe_version);
}

add_action('elementor/editor/after_enqueue_scripts', 'emfe_admin_scripts');
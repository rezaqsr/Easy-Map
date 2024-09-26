<?php
/**
 * Easy Map
 *
 * Plugin Name: Easy map
 * Plugin URI:  https://github.com/rezaqsr/easy-map
 * Description: Map For Elementor Page Builder
 * Version:     1.0.0
 * Author:      @reza_qsr
 * Author URI:  https://github.com/rezaqsr
 * License:     GPLv2 or later
 * License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Text Domain: hasht.net
 * Domain Path: /languages
 * Requires at least: 6.0
 * Requires PHP: 8.1
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License version 2, as published by the Free Software Foundation. You may NOT assume
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */
const version = '1.0.0';
define( "plugin_url", plugin_dir_url( __FILE__ ) );

include_once plugin_dir_path( __FILE__ ) . 'inc/queue.php';

function register_easy_map_widget( $widgets_manager ): void
{
    require_once( plugin_dir_path( __FILE__ ) . 'class/widget.php' );
    $widgets_manager->register( new \Elementor_Easy_Map_Widget() );
}
add_action( 'elementor/widgets/register', 'register_easy_map_widget' );
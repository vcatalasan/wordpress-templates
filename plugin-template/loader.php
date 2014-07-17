<?php
/*
Plugin Name: Plugin Template
Plugin URI: http://www.bscmanage.com/my-plugin/
Description: A template for creating WP plugin
Version: 0.0.1
Requires at least: WordPress 2.9.1 / Formidable Pro
Tested up to: WordPress 2.9.1 / BuddyPress 1.2
License: GNU/GPL 2
Author: Val Catalasan
Author URI: http://www.bscmanage.com/staff-profiles/
*/

require( plugin_dir_path( __FILE__) . 'plugin-name.php' );

// initialize plugin
add_action( 'init', array( 'PluginName', 'get_instance') );
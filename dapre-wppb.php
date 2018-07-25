<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://giuliodaprela.com
 * @since             1.0.0
 * @package           Dapre_Wppb
 *
 * @wordpress-plugin
 * Plugin Name:       Dapre WPPB
 * Plugin URI:        https://giuliodaprela.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Giulio Daprela
 * Author URI:        https://giuliodaprela.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       dapre-wppb
 * Domain Path:       /languages
 */


namespace dapre_wppb;

use dapre_wppb\includes;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

setup_constants();

/**
 * Setup all constants
 */
function setup_constants() {
	
	// get_file_data should always be available. We leave this check just in case
	if ( ! function_exists( 'get_file_data' ) ) {
		require_once ABSPATH . 'wp-includes/functions.php';
	}
	
	$default_headers = [
		'TextDomain' => 'Text Domain',
		'Version'	 => 'Version'
	];
	
	$plugin_data = get_file_data( __FILE__ , $default_headers);
	
	define( __NAMESPACE__ . '\PLUGIN_VERSION', $plugin_data['Version'] );
	define( __NAMESPACE__ . '\PLUGIN_NAME', $plugin_data['TextDomain'] );
	define( __NAMESPACE__ . '\PLUGIN_URLPATH', plugins_url( '/' , __FILE__ ) );
	define( __NAMESPACE__ . '\PLUGIN_PATH', WP_PLUGIN_DIR.'/'.plugin_basename( dirname(__FILE__) ).'/' );
	define( __NAMESPACE__ . '\PLUGIN_SLUG', plugin_basename( dirname(__FILE__) ) );
}

register_activation_hook( __FILE__, __NAMESPACE__ . '\activate_plugin' );
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-activator.php
 */
function activate_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-activator.php';
	includes\Activator::activate();
}

register_deactivation_hook( __FILE__, __NAMESPACE__ . '\deactivate_plugin' );
/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-deactivator.php
 */
function deactivate_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-deactivator.php';
	includes\Deactivator::deactivate();
}

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-dapre-wppb.php';

/**
 * If we are in production mode returns the plugin version.
 * If we are in debug mode returns the timestamp of the file.
 * Every time that we save the file the timestamp is updated 
 * and therefore the asset version changes, making the debug easier.
 * 
 * @param string $asset_file complete path to the asset file (not to confuse with the URL)
 * @return string the asset timestamp or the plugin version
 */
function get_asset_version( $asset_file ) {
	
	if ( plugin_is_in_debug_mode() ) {
		$version = filemtime($asset_file);
		
		// detect the case where a Windows server returns the wrong encoding and convert
		if ( $version === false ) {
			$version = filemtime(utf8_decode($asset_file));
		}
		
		return $version;
	}
	
	return PLUGIN_VERSION;
}

/**
 * Checks if the site is in development/debug mode
 * 
 * @return boolean true if the site is in debug mode
 */
function plugin_is_in_debug_mode() {
	return ( (bool) WP_DEBUG === true );
}

new includes\Dapre_Wppb();
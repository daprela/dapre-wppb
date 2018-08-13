<?php

namespace dapre_wppb\plugin_admin;

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://giuliodaprela.com
 * @since      1.0.0
 *
 * @package    Dapre_Wppb
 * @subpackage Dapre_Wppb/plugin_admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Dapre_Wppb
 * @subpackage Dapre_Wppb/plugin_admin
 * @author     Giulio Daprela <giulio.daprela@gmail.com>
 */
class Plugin_Admin {

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 */
		$version = \dapre_wppb\get_asset_version( \dapre_wppb\PLUGIN_PATH . 'plugin-admin/css/dapre-wppb-admin.css');
		wp_enqueue_style( \dapre_wppb\PLUGIN_NAME, \dapre_wppb\PLUGIN_URLPATH . 'plugin-admin/css/dapre-wppb-admin.css', array(), $version, 'all' );


	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 */
		
		$version = \dapre_wppb\get_asset_version( \dapre_wppb\PLUGIN_PATH . 'plugin-admin/js/dapre-wppb-admin.js');
		wp_enqueue_script( \dapre_wppb\PLUGIN_NAME, \dapre_wppb\PLUGIN_URLPATH . 'plugin-admin/js/dapre-wppb-admin.js', array( 'jquery' ), $version, false );

	}

}

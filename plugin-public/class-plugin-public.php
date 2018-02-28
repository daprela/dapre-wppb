<?php

namespace dapre_wppb\plugin_public;

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://giuliodaprela.com
 * @since      1.0.0
 *
 * @package    Dapre_Wppb
 * @subpackage Dapre_Wppb/plugin_public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Dapre_Wppb
 * @subpackage Dapre_Wppb/plugin_public
 * @author     Giulio Daprela <giulio.daprela@gmail.com>
 */
class Plugin_Public {

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 */
		
		$version = \dapre_wppb\get_asset_version( \dapre_wppb\PLUGIN_PATH . 'plugin-public/css/dapre-wppb-public.css');
		wp_enqueue_style( \dapre_wppb\PLUGIN_NAME, plugin_dir_url( __FILE__ ) . 'css/dapre-wppb-public.css', array(), $version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 */
		
		$version = \dapre_wppb\get_asset_version( \dapre_wppb\PLUGIN_PATH . 'plugin-public/js/dapre-wppb-public.js');
		wp_enqueue_script( \dapre_wppb\PLUGIN_NAME, plugin_dir_url( __FILE__ ) . 'js/dapre-wppb-public.js', array( 'jquery' ), $version, false );

	}

}

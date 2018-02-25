<?php

namespace dapre_wppb\includes;

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://giuliodaprela.com
 * @since      1.0.0
 *
 * @package    Dapre_Wppb
 * @subpackage Dapre_Wppb/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Dapre_Wppb
 * @subpackage Dapre_Wppb/includes
 * @author     Giulio Daprela <giulio.daprela@gmail.com>
 */
class i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'dapre-wppb',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}

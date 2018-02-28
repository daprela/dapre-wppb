<?php

namespace dapre_wppb\includes;

use dapre_wppb\plugin_admin;
use dapre_wppb\plugin_public;

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://giuliodaprela.com
 * @since      1.0.0
 *
 * @package    Dapre_Wppb
 * @subpackage Dapre_Wppb/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Dapre_Wppb
 * @subpackage Dapre_Wppb/includes
 * @author     Giulio Daprela <giulio.daprela@gmail.com>
 */
class Dapre_Wppb {

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		
		spl_autoload_register( array($this,'autoload') );

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin. Classes files are loaded by the autoloader
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The file containing utility functions that don't logically belong to any class or we want to keep out
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/functions.php';

	}
	
	/**
	 * Class autoloader method
	 * 
	 * @param string $class class name which also includes the namespace
	 * @return void
	 */
	private function autoload($class) {
		
		$class_path = strtolower( str_replace("_","-",$class) );
		
		$paths = explode('\\', $class_path);
		
		if ( count($paths) != 3 ) {
			return;
		}
		
		$class_file = plugin_dir_path( dirname( __FILE__ ) ) . "/$paths[1]/class-{$paths[2]}.php";
		
		if ( file_exists($class_file) ) {
           	include_once($class_file);
       	}
	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new i18n();

		add_action( 'plugins_loaded', array($plugin_i18n, 'load_plugin_textdomain') );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new plugin_admin\Plugin_Admin();

		add_action( 'admin_enqueue_scripts', array($plugin_admin, 'enqueue_styles') );
		add_action( 'admin_enqueue_scripts', array($plugin_admin, 'enqueue_scripts') );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new plugin_public\Plugin_Public();

		add_action( 'wp_enqueue_scripts', array($plugin_public, 'enqueue_styles') );
		add_action( 'wp_enqueue_scripts', array($plugin_public, 'enqueue_scripts') );

	}
}

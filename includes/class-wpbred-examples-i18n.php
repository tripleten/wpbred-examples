<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.bpbred.com/
 * @since      1.0.0
 *
 * @package    Wpbred_Examples
 * @subpackage Wpbred_Examples/includes
 * @author     WPbred.com Team <support@wpbred.com>
 */

class Wpbred_Examples_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wpbred-examples',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}

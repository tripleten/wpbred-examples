<?php

/**
 * The plugin bootstrap file
 *
 * @link              https://www.wpbred.com/
 * @since             1.0.0
 * @package           Wpbred_Examples
 *
 * @wordpress-plugin
 * Plugin Name:       WPbred Examples
 * Plugin URI:        https://www.wpbred.com/plugins/wpbred-examples
 * Description:       This plugin contains examples of the custom functions that can be added in a WordPress Plugin.
 * Version:           1.0.0
 * Author:            WPbred.com Team
 * Author URI:        https://www.wpbred.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wpbred-examples
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 */
define( 'WPBRED_EXAMPLES_VERSION', '1.0.0' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wpbred-examples.php';

/**
 * Begins execution of the plugin.
 *
 * @since    1.0.0
 */
function run_wpbred_examples() {

	$plugin = new Wpbred_Examples();
	$plugin->run();

}
run_wpbred_examples();

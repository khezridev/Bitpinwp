<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://khezri.ir
 * @since             1.0.0
 * @package           Bitpinwp
 *
 * @wordpress-plugin
 * Plugin Name:       BitpinWP
 * Plugin URI:        https://bitpin.ir
 * Description:       پلاگین نمایش بازار های بیت پین در وردپرس
 * Version:           1.0.0
 * Author:            Mohammad A Khezri
 * Author URI:        https://khezri.ir
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bitpinwp
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Set define constants
 */

if ( ! defined( 'BITPINWP_VERSION' ) ) {
	define( 'BITPINWP_VERSION', '1.0.0' );
}

if ( ! defined( 'BITPINWP_DIR' ) ) {
	define( 'BITPINWP_DIR', __DIR__ . DIRECTORY_SEPARATOR );
}

if ( ! defined( 'BITPINWP_FILE' ) ) {
	define( 'BITPINWP_FILE', __FILE__ );
}

if ( ! defined( 'BITPINWP_URL' ) ) {
	define( 'BITPINWP_URL', plugin_dir_url( __FILE__ ) );
}

if ( ! defined( 'BITPINWP_API_ADDRESS' ) ) {
	define( 'BITPINWP_API_ADDRESS', 'https://api.bitpin.ir/' );
}

/**
 * Load Autoload file for auto loading classes
 */
require_once BITPINWP_DIR . 'bitpinwp-autoload.php';


/**
 * Begins execution of the plugin.
 */
function run_bitpinwp() {

	Bitpinwp::init();

}

run_bitpinwp();

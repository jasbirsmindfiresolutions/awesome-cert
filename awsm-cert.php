<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://awesome.one/
 * @since             1.0.0
 * @package           Awsm_Cert
 *
 * @wordpress-plugin
 * Plugin Name:       Awesome Certificate
 * Plugin URI:        https://awesome.one/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Awesome Company
 * Author URI:        https://awesome.one/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       awsm-cert
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-awsm-cert-activator.php
 */
function activate_awsm_cert() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-awsm-cert-activator.php';
	Awsm_Cert_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-awsm-cert-deactivator.php
 */
function deactivate_awsm_cert() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-awsm-cert-deactivator.php';
	Awsm_Cert_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_awsm_cert' );
register_deactivation_hook( __FILE__, 'deactivate_awsm_cert' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-awsm-cert.php';

/**
 * The file responsible for defining & loading all the constants.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/constants.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_awsm_cert() {

	$plugin = new Awsm_Cert();
	$plugin->run();

}
run_awsm_cert();

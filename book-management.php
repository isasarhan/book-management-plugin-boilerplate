<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://wppb.me/
 * @since             1.0.0
 * @package           Book_Management
 *
 * @wordpress-plugin
 * Plugin Name:       Book Management
 * Plugin URI:        https://wppb.me/
 * Description:       This is a description of the plugin.
 * Version:           1.0.0
 * Author:            issa sarhan
 * Author URI:        https://wppb.me//
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       book-management
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('BOOK_MANAGEMENT_VERSION', '1.0.0');
define('BOOK_MANAGEMENT_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('BOOK_MANAGEMENT_PLUGIN_URL', plugin_dir_url(__FILE__));

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-book-management-activator.php
 */
function activate_book_management()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-book-management-activator.php';
	$activator = new Book_Management_Activator();
	$activator->activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-book-management-deactivator.php
 */
function deactivate_book_management()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-book-management-deactivator.php';
	Book_Management_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_book_management');
register_deactivation_hook(__FILE__, 'deactivate_book_management');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-book-management.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_book_management()
{

	$plugin = new Book_Management();
	$plugin->run();

}
run_book_management();

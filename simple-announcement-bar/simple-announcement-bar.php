<?php
/**
 * Plugin Name:       Simple Announcement Bar
 * Plugin URI:        https://github.com/End-E94/WordPress-plugins
 * Description:       Shows a dismissible announcement bar at the top of your site.
 * Version:           0.1.0
 * Requires at least: 6.5
 * Requires PHP:      7.4
 * Author:            End-E94
 * Author URI:        https://github.com/End-E94
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       simple-announcement-bar
 * Domain Path:       /languages
 *
 * @package Announce_Bar
 */

defined( 'ABSPATH' ) || exit;

define( 'ANNOUNCE_BAR_VERSION', '0.1.0' );
define( 'ANNOUNCE_BAR_FILE', __FILE__ );
define( 'ANNOUNCE_BAR_PATH', plugin_dir_path( __FILE__ ) );
define( 'ANNOUNCE_BAR_URL', plugin_dir_url( __FILE__ ) );

require_once ANNOUNCE_BAR_PATH . 'includes/class-announce-bar-plugin.php';

add_action( 'plugins_loaded', array( 'Announce_Bar_Plugin', 'init' ) );


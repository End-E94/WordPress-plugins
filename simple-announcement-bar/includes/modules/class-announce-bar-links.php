<?php
/**
 * Plugin action links.
 *
 * @package Announce_Bar
 */

defined( 'ABSPATH' ) || exit;

/**
 * Adds a Settings link to the plugins list.
 */
class Announce_Bar_Links {

	/**
	 * Hooks the filter.
	 *
	 * @return void
	 */
	public static function init() {
		add_filter( 'plugin_action_links_' . plugin_basename( ANNOUNCE_BAR_FILE ), array( __CLASS__, 'add_settings_link' ) );
	}

	/**
	 * Prepends a Settings link.
	 *
	 * @param array $links Existing action links.
	 * @return array
	 */
	public static function add_settings_link( $links ) {
		$url = admin_url( 'options-general.php?page=simple-announcement-bar' );
		array_unshift( $links, '<a href="' . esc_url( $url ) . '">' . esc_html__( 'Settings', 'simple-announcement-bar' ) . '</a>' );
		return $links;
	}
}


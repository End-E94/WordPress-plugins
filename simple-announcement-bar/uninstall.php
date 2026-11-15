<?php
/**
 * Removes plugin data on uninstall.
 *
 * @package Announce_Bar
 */

defined( 'WP_UNINSTALL_PLUGIN' ) || exit;

delete_option( 'announce_bar_settings' );


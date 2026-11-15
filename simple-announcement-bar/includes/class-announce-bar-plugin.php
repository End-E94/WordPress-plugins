<?php
/**
 * Plugin bootstrap.
 *
 * @package Announce_Bar
 */

defined( 'ABSPATH' ) || exit;

/**
 * Loads every module found in includes/modules.
 */
class Announce_Bar_Plugin {

	/**
	 * Loads each module file and calls its init() method when it has one.
	 * A file named class-announce-bar-foo.php must define the class Announce_Bar_Foo.
	 *
	 * @return void
	 */
	public static function init() {
		$files = glob( ANNOUNCE_BAR_PATH . 'includes/modules/class-announce-bar-*.php' );

		foreach ( (array) $files as $file ) {
			require_once $file;
			$slug  = substr( basename( $file, '.php' ), 6 );
			$class = implode( '_', array_map( 'ucfirst', explode( '-', $slug ) ) );
			if ( method_exists( $class, 'init' ) ) {
				$class::init();
			}
		}
	}
}


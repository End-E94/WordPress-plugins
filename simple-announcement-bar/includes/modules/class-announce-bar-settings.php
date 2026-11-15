<?php
/**
 * Settings page.
 *
 * @package Announce_Bar
 */

defined( 'ABSPATH' ) || exit;

/**
 * Registers a settings page under the Settings menu.
 */
class Announce_Bar_Settings {

	const OPTION = 'announce_bar_settings';

	/**
	 * Hooks the settings page.
	 *
	 * @return void
	 */
	public static function init() {
		add_action( 'admin_menu', array( __CLASS__, 'add_menu' ) );
		add_action( 'admin_init', array( __CLASS__, 'register' ) );
	}

	/**
	 * Returns the saved settings merged with the defaults.
	 *
	 * @return array
	 */
	public static function get() {
		$saved = get_option( self::OPTION, array() );
		return wp_parse_args( is_array( $saved ) ? $saved : array(), array( 'enabled' => 1 ) );
	}

	/**
	 * Adds the page to the Settings menu.
	 *
	 * @return void
	 */
	public static function add_menu() {
		add_options_page(
			__( 'Simple Announcement Bar', 'simple-announcement-bar' ),
			__( 'Simple Announcement Bar', 'simple-announcement-bar' ),
			'manage_options',
			'simple-announcement-bar',
			array( __CLASS__, 'render_page' )
		);
	}

	/**
	 * Registers the option, section and field with the Settings API.
	 *
	 * @return void
	 */
	public static function register() {
		register_setting(
			'announce_bar_group',
			self::OPTION,
			array(
				'type'              => 'array',
				'sanitize_callback' => array( __CLASS__, 'sanitize' ),
				'default'           => array( 'enabled' => 1 ),
			)
		);
		add_settings_section( 'announce_bar_main', '', '__return_false', 'simple-announcement-bar' );
		add_settings_field(
			'announce_bar_enabled',
			__( 'Enable plugin features', 'simple-announcement-bar' ),
			array( __CLASS__, 'render_enabled' ),
			'simple-announcement-bar',
			'announce_bar_main'
		);
	}

	/**
	 * Sanitizes the submitted settings.
	 *
	 * @param mixed $input Raw submitted value.
	 * @return array Clean settings.
	 */
	public static function sanitize( $input ) {
		$input = is_array( $input ) ? $input : array();
		return array( 'enabled' => empty( $input['enabled'] ) ? 0 : 1 );
	}

	/**
	 * Prints the enabled checkbox.
	 *
	 * @return void
	 */
	public static function render_enabled() {
		$opts = self::get();
		?>
		<label>
			<input type="checkbox" name="<?php echo esc_attr( self::OPTION ); ?>[enabled]" value="1" <?php checked( 1, (int) $opts['enabled'] ); ?> />
			<?php esc_html_e( 'Enabled', 'simple-announcement-bar' ); ?>
		</label>
		<?php
	}

	/**
	 * Renders the settings page.
	 *
	 * @return void
	 */
	public static function render_page() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}
		?>
		<div class="wrap">
			<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
			<form action="options.php" method="post">
				<?php
				settings_fields( 'announce_bar_group' );
				do_settings_sections( 'simple-announcement-bar' );
				submit_button();
				?>
			</form>
		</div>
		<?php
	}
}


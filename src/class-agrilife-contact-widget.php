<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://github.com/AgriLife/agrilife-contact-widget/blob/master/src/class-agrilife-contact-widget.php
 * @since      0.1.0
 * @package    agrilife-contact-widget
 * @subpackage agrilife-contact-widget/src
 */

/**
 * The core plugin class
 *
 * @since 0.1.0
 * @return void
 */
class agrilife_contact_Widget {

	/**
	 * File name
	 *
	 * @var file
	 */
	private static $file = __FILE__;

	/**
	 * Instance
	 *
	 * @var instance
	 */
	private static $instance;

	/**
	 * Initialize the class
	 *
	 * @since 0.1.0
	 * @return void
	 */
	private function __construct() {

		// Add Widgets.
		add_action( 'widgets_init', array( $this, 'register_widgets' ) );

	}

	/**
	 * Register widgets
	 *
	 * @since 0.1.0
	 * @return void
	 */
	public function register_widgets() {

		require_once AGRICW_DIR_PATH . 'src/class-widget.php';
		$widget = new \AgriLife_Contact_Widget\Widget();
		register_widget( $widget );

	}

	/**
	 * Autoloads any classes called within the theme
	 *
	 * @since 0.1.0
	 * @param string $classname The name of the class.
	 * @return void.
	 */
	public static function autoload( $classname ) {

		$filename = dirname( __FILE__ ) .
			DIRECTORY_SEPARATOR .
			str_replace( '_', DIRECTORY_SEPARATOR, $classname ) .
			'.php';

		if ( file_exists( $filename ) ) {
			require $filename;
		}

	}

	/**
	 * Return instance of class
	 *
	 * @since 0.1.0
	 * @return object.
	 */
	public static function get_instance() {

		return null === self::$instance ? new self() : self::$instance;

	}

}

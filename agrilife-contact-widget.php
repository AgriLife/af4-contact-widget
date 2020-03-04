<?php
/**
 * AgriLife Contact Widget - AgriFlex4
 *
 * @package      agrilife-contact-widget
 * @author       Zachary Watkins
 * @copyright    2020 Texas A&M AgriLife Communications
 * @license      GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name:  AgriLife Contact Widget - AgriFlex4
 * Plugin URI:   https://github.com/AgriLife/agrilife-contact-widget
 * Description:  A plugin providing the AgriLife Contact Widget for WordPress websites using the Genesis theme and AgriFlex4 child theme.
 * Version:      0.1.0
 * Author:       Zachary Watkins
 * Author URI:   https://github.com/ZachWatkins
 * Author Email: zachary.watkins@ag.tamu.edu
 * Text Domain:  agrilife-contact-widget
 * License:      GPL-2.0+
 * License URI:  http://www.gnu.org/licenses/gpl-2.0.txt
 */

/* Define some useful constants */
define( 'AGRICW_DIRNAME', 'agrilife-contact-widget' );
define( 'AGRICW_DIR_PATH', plugin_dir_path( __FILE__ ) );
define( 'AGRICW_DIR_FILE', __FILE__ );
define( 'AGRICW_DIR_URL', plugin_dir_url( __FILE__ ) );
define( 'AGRICW_TEXTDOMAIN', 'agrilife-contact-widget' );
define( 'AGRICW_TEMPLATE_PATH', AGRICW_DIR_PATH . 'templates' );

/**
 * The core plugin class that is used to initialize the plugin
 */
require AGRICW_DIR_PATH . 'src/class-agrilife-contact-widget.php';
spl_autoload_register( 'agrilife_contact_Widget::autoload' );
agrilife_contact_Widget::get_instance();

/* Activation hooks */
register_activation_hook( __FILE__, 'agrilife_contact_widget_activation' );

/**
 * Helper option flag to indicate rewrite rules need flushing
 *
 * @since 0.1.0
 * @return void
 */
function agrilife_contact_widget_activation() {

	// Check for missing dependencies.
	$theme = wp_get_theme();
	if ( 'AgriFlex4' !== $theme->name ) {
		$error = sprintf(
			/* translators: %s: URL for plugins dashboard page */
			__(
				'Plugin NOT activated: The <strong>AgriLife Contact Widget - AgriFlex4</strong> plugin needs the <strong>AgriFlex4</strong> theme to be installed and activated first. <a href="%s">Back to plugins page</a>',
				'agrilife-contact-widget'
			),
			get_admin_url( null, '/plugins.php' )
		);
		wp_die( wp_kses_post( $error ) );
	}

}

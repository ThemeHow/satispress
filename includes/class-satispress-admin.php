<?php
/**
 * Admininistration class.
 *
 * @package SatisPress
 * @author Brady Vercher <brady@blazersix.com>
 * @since 0.2.0
 */
class SatisPress_Admin {
	/**
	 * Load the admin.
	 *
	 * @since 0.2.0
	 */
	public function load() {
		$base_path = SatisPress::instance()->cache_path();

		$manage_screen = new SatisPress_Admin_Screen_ManagePlugins();
		$manage_screen->load();

		$settings_screen = new SatisPress_Admin_Screen_Settings();
		$settings_screen->set_base_path( $base_path );
		$settings_screen->load();

		add_action( 'admin_init', array( $this, 'register_assets' ) );
	}

	/**
	 * Register admin scripts and styles.
	 *
	 * @since 0.2.0
	 */
	public function register_assets() {
		wp_register_script( 'satispress-admin', SATISPRESS_URL . 'assets/js/admin.js', array( 'jquery', 'wp-util' ) );
		wp_register_style( 'satispress-admin', SATISPRESS_URL . 'assets/css/admin.css' );
	}
}

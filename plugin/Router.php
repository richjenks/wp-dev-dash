<?php

/**
 * Router
 *
 * Front Controller
 * Registers menu page & sends the request to the appropriate Controller
 */

namespace RichJenks\WPServerDashboard;

class Router {

	/**
	 * __construct
	 *
	 * Add submenu page for plugin
	 */

	public function __construct() {

		// Add submenu page
		add_action( 'admin_menu', function() {
			add_submenu_page( 'tools.php', 'Server', 'Server', 'manage_options', 'server-dashboard', array( $this, 'route' ) );
		} );

		// Enqueue admin stylesheet
		if ( isset( $_GET['page'] ) && $_GET['page'] === 'server-dashboard' ) {
			add_action( 'admin_enqueue_scripts', function() {
				wp_enqueue_style( 'devdash-styles', plugins_url( 'wp-server-dashboard/plugin/assets/style.css' ) );
			} );
		}

	}

	/**
	 * route
	 *
	 * Front Controller function
	 * Starts everything off and routes to correct Controller
	 */

	public function route() {

		// Maps tabs to Controllers
		$GLOBALS['routes'] = array(
			'General'   => 'Dashboard',
			'WordPress' => 'Dashboard',
			'Apache'    => 'Dashboard',
			'MySQL'     => 'Dashboard',
			'PHP'       => 'Dashboard',
			'Report'    => 'Report',
		);

		// Current tab
		$GLOBALS['route'] = ( isset( $_GET['tab'] ) && array_key_exists( $_GET['tab'], $GLOBALS['routes'] ) ) ? $_GET['tab'] : current( array_keys( $GLOBALS['routes'] ) );

		// Route to correct Controller
		$controller = $GLOBALS['routes'][ $GLOBALS['route'] ];
		$class = '\RichJenks\WPServerDashboard\Controllers\\' . $controller;
		new $class;

	}

}

<?php

/**
 * Router
 *
 * Front Controller
 * Registers menu page & sends the request to the appropriate Controller
 */

namespace  RichJenks\WPServerInfo;

class Router {

	/**
	 * __construct
	 *
	 * Add submenu page for plugin
	 */

	public function __construct() {

		// Add submenu page
		add_action( 'admin_menu', function() {
			add_submenu_page( 'tools.php', 'Server Info', 'Server Info', 'manage_options', 'server-info', array( $this, 'route' ) );
		} );

		// Enqueue admin stylesheet
		if ( isset( $_GET['page'] ) && $_GET['page'] === 'server-info' ) {
			add_action( 'admin_enqueue_scripts', function() {
				wp_enqueue_style( 'devdash-styles', plugins_url( 'wp-server-info/mvc/assets/style.css' ) );
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

		// All tabs
		$GLOBALS['tabs'] = array(
			'General',
			'WordPress',
			'Apache',
			'MySQL',
			'PHP',
			'Report',
		);

		// Current tab
		$GLOBALS['tab'] = ( isset( $_GET['tab'] ) && in_array( $_GET['tab'], $GLOBALS['tabs'] ) ) ? $_GET['tab'] : $GLOBALS['tabs'][0];

		// Route to correct Tab Controller
		$class = '\RichJenks\WPServerInfo\Controllers\\' . $GLOBALS['tab'];
		new $class;

	}

}
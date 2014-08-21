<?php

/**
 * Router
 *
 * Front Controller
 * Registers menu page & sends the request to the appropriate Controller
 */

namespace  RichJenks\WPServerDashboard;

class Router {

	/**
	 * @var string Current tab/view
	 */

	private $current_tab;

	/**
	 * __construct
	 *
	 * Add submenu page for plugin
	 */

	public function __construct() {

		// Add submenu page
		add_action( 'admin_menu', function() {
			add_submenu_page( 'tools.php', 'Server Dashboard', 'Server', 'manage_options', 'developer-dashboard', array( $this, 'route' ) );
		} );

		// Enqueue admin stylesheet
		if ( isset( $_GET['page'] ) && $_GET['page'] === 'developer-dashboard' ) {
			add_action( 'admin_enqueue_scripts', function() {
				wp_enqueue_style( 'devdash-styles', plugins_url( 'wp-server-dashboard/mvc/assets/style.css' ) );
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

		// Show title - hardcoded here for simplicity
		echo '<h1>Server Dashboard</h1>';

		// Instantiate Menu Controller & show menu
		$menu = new \RichJenks\WPServerDashboard\Controllers\Menu;

		// Get the current tab
		$this->current_tab = $menu->get_current_tab();

		// Route to correct Tab Controller
		$class = '\RichJenks\WPServerDashboard\Controllers\\' . $this->current_tab;
		new $class;

	}

}
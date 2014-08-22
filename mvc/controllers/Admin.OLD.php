<?php

namespace  RichJenks\WPServerInfo\Controllers;

class Admin {

	/**
	 * @var array All tabs within the plugin admin page
	 */

	private $tabs;

	/**
	 * @var string Current tab
	 */

	private $current;

	public function __construct() {

		// Set tabs to use throughout
		$this->tabs = array(
			'dashboard' => 'Dashboard',
			'wordpress' => 'WordPress',
			'apache'    => 'Apache',
			'mysql'     => 'MySQL',
			'php'       => 'PHP',
			// 'report'    => 'Report',
		);

		// Get current tab or use first tab
		$this->current = ( isset( $_GET['tab'] ) ) ? $_GET['tab'] : key( $this->tabs );

		// Add menu item under Tools
		add_action( 'admin_menu', function() {
			add_submenu_page( 'tools.php', 'Developer Dashboard', 'Dev Dash', 'manage_options', 'developer-dashboard', array( $this, 'menu' ) );
		} );

		// Enqueue stylesheet
		if ( isset( $_GET['page'] ) && $_GET['page'] === 'developer-dashboard' ) {
			add_action( 'admin_enqueue_scripts', function() {
				wp_enqueue_style( 'devdash-styles', plugins_url( '../assets/style.css', __FILE__ ) );
			} );
		}

	}

	/**
	 * menu
	 *
	 * Generates and echoes HTML for page content
	 */

	public function menu() {
		$tabs = $this->tabs;
		echo '<div class="wrap"><h1>Developer Dashboard</h1>';
		echo '<h2 class="nav-tab-wrapper">';
		foreach ( $tabs as $tab => $label ) {
			$active = ( $this->current === $tab ) ? ' nav-tab-active' : '';
			echo '<a class="nav-tab' . $active . '" href="' . add_query_arg( 'tab', $tab ) . '">' . $label . '</a>';
		}
		echo '</h2>';
		require __DIR__ . '/../views/' . $this->current . '.php';
		echo '</div>';
	}

}

new Admin;
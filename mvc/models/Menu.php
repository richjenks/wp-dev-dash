<?php

/**
 * Menu Model
 *
 * Constructs the menu tabs
 */

namespace  RichJenks\WPServerDashboard\Models;

class Menu {

	/**
	 * @var array All data for menu
	 */

	private $menu_data;

	/**
	 * get
	 *
	 * Constructs menu HTML
	 *
	 * @param  string $current Slug for current page
	 * @return string HTML for menu
	 */

	public function __construct() {

		// Set hard-coded tabs (values must match Views)
		$this->menu_data['tabs'] = array(
			'Dashboard',
			'WordPress',
			'Apache',
			'MySQL',
			'PHP',
			'Report',
		);

		// Set current tab
		$this->menu_data['current'] = $this->get_current_tab();

	}

	/**
	 * get_current_tab
	 *
	 * Ensures the slug for the current page is valid
	 *
	 * @param string $current Slug for current page, from query string
	 * @return string Valid slug for current page
	 */

	public function get_current_tab() {
		return ( isset( $_GET['tab'] ) && in_array( $_GET['tab'], $this->menu_data['tabs'] ) ) ? $_GET['tab'] : $this->menu_data['tabs'][0];
	}

	/**
	 * get_menu_data
	 *
	 * @return array All data for menu
	 */

	public function get_menu_data() { return $this->menu_data; }

}
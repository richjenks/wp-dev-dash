<?php

/**
 * Menu Controller
 */

namespace  RichJenks\WPServerDashboard\Controllers;

class Menu extends Controller {

	/**
	 * @var object Menu Model object
	 */

	private $menu;

	/**
	 * __construct
	 *
	 * Gets menu data and renders menu
	 *
	 * @param string $current Slug for current tab
	 */

	public function __construct() {
		$this->menu = new \RichJenks\WPServerDashboard\Models\Menu;
		$this->render( 'Menu', $this->menu->get_menu_data() );
	}

	/**
	 * get_current_tab
	 *
	 * Gets the current tab
	 *
	 * @return string Slug for current tab
	 */

	public function get_current_tab() { return $this->menu->get_current_tab(); }

}
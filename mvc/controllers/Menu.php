<?php

/**
 * Menu Controller
 */

namespace  RichJenks\WPServerInfo\Controllers;

class Menu extends Controller {

	/**
	 * __construct
	 *
	 * Gets menu data and renders menu
	 *
	 * @param string $current Slug for current tab
	 */

	public function __construct() {
		$menu = new \RichJenks\WPServerInfo\Models\Menu;
		$this->render( 'Menu', $menu->get_menu_data() );
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
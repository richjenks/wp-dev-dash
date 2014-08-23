<?php

/**
 * Dashboard Controller
 */

namespace RichJenks\WPServerInfo\Controllers;

class Dashboard extends Controller {

	public function __construct() {
		$route = $GLOBALS['route'];
		$class = '\RichJenks\WPServerInfo\Models\\' . $route;
		$model = new $class;
		$this->render( 'Dashboard', $model->get_data() );
	}
}
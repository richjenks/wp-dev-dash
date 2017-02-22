<?php

/**
 * Dashboard Controller
 */

namespace RichJenks\WPServerDashboard\Controllers;

class Dashboard extends Controller {

	public function __construct() {
		$route = $GLOBALS['route'];
		$class = '\RichJenks\WPServerDashboard\Models\\' . $route;
		$model = new $class;
		$this->render( 'Dashboard', $model->get_data() );
	}
}

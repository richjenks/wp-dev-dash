<?php

/**
 * Report Controller
 */

namespace  RichJenks\WPServerDashboard\Controllers;

class Report extends Controller {

	public function __construct() {
		$dashboard = new \RichJenks\WPServerDashboard\Models\Dashboard;
		$data[] = $dashboard->get_dashboard_data();
		$this->render( 'Report', $data );
	}

}
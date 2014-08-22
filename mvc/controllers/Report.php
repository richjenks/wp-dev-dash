<?php

/**
 * Report Controller
 */

namespace  RichJenks\WPServerInfo\Controllers;

class Report extends Controller {

	public function __construct() {
		$dashboard = new \RichJenks\WPServerInfo\Models\Dashboard;
		$data['General'] = $dashboard->get_dashboard_data();
		$this->render( 'Report', $data );
	}

}
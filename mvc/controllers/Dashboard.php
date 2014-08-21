<?php

/**
 * Dashboard Controller
 */

namespace  RichJenks\WPServerDashboard\Controllers;

class Dashboard extends Controller {

	/**
	 * @var object Dashboard Model object
	 */

	private $dashboard;

	public function __construct() {
		$this->dashboard = new \RichJenks\WPServerDashboard\Models\Dashboard;
		$this->render( 'Dashboard', $this->dashboard->get_dashboard_data() );
	}
}
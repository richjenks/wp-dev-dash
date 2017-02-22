<?php

/**
 * Report Controller
 */

namespace RichJenks\WPServerDashboard\Controllers;

class Report extends Controller {

	public function __construct() {

		$general = new \RichJenks\WPServerDashboard\Models\General;
		$data['General'] = $general->get_data();

		$wordpress = new \RichJenks\WPServerDashboard\Models\WordPress;
		$data['WordPress'] = $wordpress->get_data();

		$apache = new \RichJenks\WPServerDashboard\Models\Apache;
		$data['Apache'] = $apache->get_data();

		$mysql = new \RichJenks\WPServerDashboard\Models\MySQL;
		$data['MySQL'] = $mysql->get_data();

		$php = new \RichJenks\WPServerDashboard\Models\PHP;
		$data['PHP'] = $php->get_data();

		$this->render( 'Report', $data );

	}

}

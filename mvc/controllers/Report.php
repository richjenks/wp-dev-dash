<?php

/**
 * Report Controller
 */

namespace RichJenks\WPServerInfo\Controllers;

class Report extends Controller {

	public function __construct() {

		$general = new \RichJenks\WPServerInfo\Models\General;
		$data['General'] = $general->get_data();

		$wordpress = new \RichJenks\WPServerInfo\Models\WordPress;
		$data['WordPress'] = $wordpress->get_data();

		$apache = new \RichJenks\WPServerInfo\Models\Apache;
		$data['Apache'] = $apache->get_data();

		$this->render( 'Report', $data );

	}

}
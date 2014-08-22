<?php

/**
 * Report Controller
 */

namespace  RichJenks\WPServerInfo\Controllers;

class Report extends Controller {

	public function __construct() {

		$general = new \RichJenks\WPServerInfo\Models\General;
		$data['General'] = $general->get_data();

		$general = new \RichJenks\WPServerInfo\Models\WordPress;
		$data['WordPress'] = $general->get_data();

		$this->render( 'Report', $data );

	}

}
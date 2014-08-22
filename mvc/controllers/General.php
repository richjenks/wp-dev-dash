<?php

/**
 * General Controller
 */

namespace  RichJenks\WPServerInfo\Controllers;

class General extends Controller {

	public function __construct() {
		$general = new \RichJenks\WPServerInfo\Models\General;
		$this->render( 'Tab', $general->get_data() );
	}
}
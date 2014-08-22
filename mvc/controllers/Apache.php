<?php

/**
 * Apache Controller
 */

namespace  RichJenks\WPServerInfo\Controllers;

class Apache extends Controller {

	public function __construct() {
		$apache = new \RichJenks\WPServerInfo\Models\Apache;
		$this->render( 'Tab', $apache->get_data() );
	}

}
<?php

/**
 * WordPress Controller
 */

namespace  RichJenks\WPServerInfo\Controllers;

class WordPress extends Controller {

	public function __construct() {
		$wordpress = new \RichJenks\WPServerInfo\Models\WordPress;
		$this->render( 'Tab', $wordpress->get_data() );
	}

}
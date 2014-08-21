<?php

/**
 * WordPress Controller
 */

namespace  RichJenks\WPServerDashboard\Controllers;

class WordPress extends Controller {

	public function __construct() {
		$this->render( 'WordPress' );
	}

}
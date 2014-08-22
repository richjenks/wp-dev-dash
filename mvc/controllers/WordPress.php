<?php

/**
 * WordPress Controller
 */

namespace  RichJenks\WPServerDashboard\Controllers;

class WordPress extends Controller {

	public function __construct() {
		$this->wordpress = new \RichJenks\WPServerDashboard\Models\WordPress;
		$this->render( 'WordPress', $this->wordpress->get_wordpress_data() );
	}

}
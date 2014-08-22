<?php

/**
 * WordPress Controller
 */

namespace  RichJenks\WPServerInfo\Controllers;

class WordPress extends Controller {

	public function __construct() {
		$this->wordpress = new \RichJenks\WPServerInfo\Models\WordPress;
		$this->render( 'WordPress', $this->wordpress->get_wordpress_data() );
	}

}
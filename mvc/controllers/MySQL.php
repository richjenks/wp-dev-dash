<?php

/**
 * MySQL Controller
 */

namespace RichJenks\WPServerInfo\Controllers;

class MySQL extends Controller {

	public function __construct() {
		$mysql = new \RichJenks\WPServerInfo\Models\MySQL;
		$this->render( 'Tab', $mysql->get_data() );
	}

}
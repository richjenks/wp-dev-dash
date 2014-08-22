<?php

/**
 * General Controller
 */

namespace  RichJenks\WPServerInfo\Controllers;

class General extends Controller {

	/**
	 * @var object General Model object
	 */

	private $general;

	public function __construct() {
		$this->general = new \RichJenks\WPServerInfo\Models\General;
		$this->render( 'General', $this->general->get_general_data() );
	}
}
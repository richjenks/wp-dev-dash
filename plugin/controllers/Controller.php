<?php

/**
 * Controller Class
 *
 * Parent controller class
 * Extended by other Controllers
 */

namespace RichJenks\WPServerDashboard\Controllers;

class Controller {
	protected function render( $view, $data = false ) {
		require __DIR__ . DS . '..' . DS . 'views' . DS . $view . '.php';
	}
}

<?php

/**
 * PHP Model
 *
 * Constructs PHP data
 */

namespace RichJenks\WPServerDashboard\Models;

class PHP {

	/**
	 * get_data
	 *
	 * @return array Data for PHP tab
	 */

	public function get_data() {
		return array(

			array(
				'data'    => array(
					'Extensions' => $this->get_loaded_extensions(),
				),
			),

			array(
				'data'    => array(
					'php.ini' => ini_get_all(),
				),
			),

		);
	}

	/**
	 * get_loaded_extensions
	 *
	 * @return array PHP extensions in alphabetical order
	 */

	private function get_loaded_extensions() {
		$ext = get_loaded_extensions();
		natcasesort( $ext );
		return $ext;
	}

}

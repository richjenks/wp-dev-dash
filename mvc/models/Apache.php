<?php

/**
 * Apache Model
 *
 * Constructs Apache data
 */

namespace RichJenks\WPServerDashboard\Models;

class Apache {

	/**
	 * get_data
	 *
	 * @return array Data for Apache tab
	 */

	public function get_data() {
		return array(

			array(
				'data'  => array(
					'Modules' => apache_get_modules(),
				),
			),

			array(
				'data'  => array(
					'Request' => apache_request_headers(),
				),
			),

			array(
				'data'  => array(
					'Response' => apache_response_headers(),
				),
			),

		);
	}

}

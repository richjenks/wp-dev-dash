<?php

/**
 * Apache Model
 *
 * Constructs Apache data
 */

namespace  RichJenks\WPServerInfo\Models;

class Apache {

	/**
	 * get_data
	 *
	 * @return array Data for Apache tab
	 */

	public function get_data() {
		return array(

			array(
				'caption' => 'Versions',
				'data'  => array(
					'WordPress' => $GLOBALS['wp_version'],
				),
			),

		);
	}

}
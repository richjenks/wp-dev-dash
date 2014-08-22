<?php

/**
 * WordPress Model
 *
 * Constructs WordPress data
 */

namespace  RichJenks\WPServerInfo\Models;

class WordPress {

	public function __construct() {
	}

	/**
	 * get_wordpress_data
	 *
	 * @return array Data for WordPress tab
	 */

	public function get_wordpress_data() {
		return array(

			array(
				'caption' => 'Versions',
				'data'  => array(
					'WordPress' => $GLOBALS['wp_version'],
					'WP DB'     => $GLOBALS['wp_db_version'],
					'Apache'    => '$this->get_apache_version()',
					'MySQL'     => '$this->get_mysql_version()',
					'PHP'       => phpversion(),
				),
			),

		);
	}

}
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
					'WP DB'     => $GLOBALS['wp_db_version'],
					'Apache'    => $this->get_apache_version(),
					'MySQL'     => $this->get_mysql_version(),
					'PHP'       => phpversion(),
					'Memcache'  => ( class_exists('Memcache') ) ? Memcache::getVersion() : 'N/A',
				),
			),

}
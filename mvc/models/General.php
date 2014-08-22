<?php

/**
 * General Model
 *
 * Constructs General data
 */

namespace RichJenks\WPServerInfo\Models;

class General {

	/**
	 * @var string Path to root of server disk drive
	 */

	private $drive_root;

	/**
	 * @var array Disk usage stats
	 */

	private $disk_stats;

	public function __construct() {
		$this->drive_root = $this->get_drive_root();
		$this->disk_stats['total'] = disk_total_space( $this->drive_root );
		$this->disk_stats['free'] = disk_free_space( $this->drive_root );
		$this->disk_stats['used'] = $this->disk_stats['total'] - $this->disk_stats['free'];
		$this->disk_stats['free_percent'] = round( ( 100 / $this->disk_stats['total'] ) * $this->disk_stats['free'], 1 );
		$this->disk_stats['used_percent'] = round( 100 - $this->disk_stats['free_percent'], 1 );
	}

	/**
	 * get_data
	 *
	 * @return array Data for General tab
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
					'Memcache'  => ( class_exists('Memcache') ) ? Memcache::getVersion() : false,
				),
			),

			array(
				'caption' => 'Server',
				'data'  => array(
					'OS'         => $this->get_operating_system(),
					'Hostname'   => $_SERVER['HTTP_HOST'],
					'IP Address' => $_SERVER['SERVER_ADDR'],
					'Port'       => $_SERVER['SERVER_PORT'],
					'Path'       => $_SERVER['DOCUMENT_ROOT'],
				),
			),

			array(
				'caption' => 'Disk',
				'data'  => array(
					'Total' => $this->filesize( $this->disk_stats['total'], 1 ),
					'Used'  => $this->filesize( $this->disk_stats['free'], 1 ) . ' (' . $this->disk_stats['free_percent'] . '%)',
					'Free'  => $this->filesize( $this->disk_stats['used'], 1 ) . ' (' . $this->disk_stats['used_percent'] . '%)',
				),
			),

		);
	}

	/**
	 * get_operating_system
	 *
	 * Attempts to find a friendly OS name
	 *
	 * @return string Operating System
	 */

	private function get_operating_system() {
		switch ( PHP_OS ) {

			case 'Darwin':
				return 'Mac OSX';
				break;

			case 'WIN32':
			case 'WINNT':
				return 'Windows';
				break;

			default:
				return PHP_OS;
				break;

		}
	}

	/**
	 * get_apache_version
	 *
	 * @return string Version of Apache on server
	 */

	private function get_apache_version() {
		$version = apache_get_version();
		$version = str_replace( 'Apache/', '', $version );
		$version = explode( ' ', $version );
		return $version[0];
	}

	/**
	 * get_mysql_version
	 *
	 * @return string Version of MySQL on server
	 */

	private function get_mysql_version() {
		$version = mysqli_get_server_info( new \mysqli( DB_HOST, DB_USER, DB_PASSWORD ) );
		return str_replace( '-log', '', $version );
	}

	/**
	 * get_drive_root
	 *
	 * @return string Root of server drive
	 */

	private function get_drive_root() {
		if ( substr( $_SERVER['DOCUMENT_ROOT'], 0, 1 ) === '/' ) {
			return '/';
		} else {
			return substr( $_SERVER['DOCUMENT_ROOT'], 0, 3);
		}
	}

	/**
	 * filesize
	 *
	 * Formats a filesize into a human-readable format
	 *
	 * @param int $bytes Filesize in bytes
	 * @param int $precision Number of decimal places
	 */

	public static function filesize( $bytes, $precision = 0 ) {
		$units = array( 'B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB' );
		$bytes = max( $bytes, 0 );
		$pow = floor( ( $bytes ? log( $bytes ) : 0 ) / log( 1024 ) );
		$pow = min( $pow, count( $units ) - 1 );
		$bytes /= pow( 1024, $pow );
		return round( $bytes, $precision ) . ' ' . $units[ $pow ];
	}

}
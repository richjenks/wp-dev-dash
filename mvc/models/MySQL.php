<?php

/**
 * MySQL Model
 *
 * Constructs MySQL data
 */

namespace RichJenks\WPServerInfo\Models;

class MySQL {

	/**
	 * @var object MySQLi connection
	 */

	private $mysqli;

	/**
	 * __construct
	 *
	 * Instantiate a MySQLI object
	 */

	public function __construct() { $this->mysqli = new \mysqli( DB_HOST, DB_USER, DB_PASSWORD ); }

	/**
	 * get_data
	 *
	 * @return array Data for MySQL tab
	 */

	public function get_data() {
		return array(

			array(
				'caption' => 'Database',
				'data'    => array(
					'Tables' => $this->count_rows( $this->get_tables() ),
				),
			),

			array(
				'caption' => 'Info',
				'data'    => array(
					'Client Version' => mysqli_get_client_version( $this->mysqli ),
					'Host Info' => $this->mysqli->host_info,
					'Client Info' => mysqli_get_client_info( $this->mysqli ),
					'Status' => explode( '  ', mysqli_stat( $this->mysqli ) ),
					'Client Stats' => mysqli_get_client_stats(),
				),
			),

		);
	}

	/**
	 * get_tables
	 *
	 * Gets all tables in database with WordPress default tables in bold
	 *
	 * @return array All database tables
	 */

	private function get_tables() {

		global $wpdb;

		// Hardcode default tables
		$defaults = array(
			$wpdb->prefix . 'posts',
			$wpdb->prefix . 'postmeta',
			$wpdb->prefix . 'comments',
			$wpdb->prefix . 'commentmeta',
			$wpdb->prefix . 'terms',
			$wpdb->prefix . 'term_taxonomy',
			$wpdb->prefix . 'term_relationships',
			$wpdb->prefix . 'users',
			$wpdb->prefix . 'usermeta',
			$wpdb->prefix . 'links',
			$wpdb->prefix . 'options',
		);

		// List all tables in database
		$tables = $wpdb->get_col( 'SELECT TABLE_NAME FROM information_schema.tables WHERE TABLE_SCHEMA = "' . $wpdb->dbname . '" ORDER BY TABLE_NAME;' );

		// Highlight default tables
		foreach ( $tables as $key => $table ) {
			if ( in_array( $table, $defaults ) ) {
				$tables[ $key ] = '<b>' . $table . '</b>';
			}
		}

		return $tables;

	}

	/**
	 * count_rows
	 *
	 * Foreach table specified, appends row count in parentheses
	 *
	 * @param array $tables Tables to be counted
	 * @return array $tables with row count appended
	 */

	private function count_rows( $tables ) {
		global $wpdb;
		foreach ( $tables as $key => $table ) {
			$count = $wpdb->query( 'SELECT * FROM ' . strip_tags( $table ) . ';' );
			$tables[ $key ] = $table . ' (' . $count . ')';
		}
		return $tables;
	}

}
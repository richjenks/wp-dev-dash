<?php

/**
 * WordPress Model
 *
 * Constructs WordPress data
 */

namespace RichJenks\WPServerInfo\Models;

class WordPress {

	/**
	 * @var array Constants & variables defined in `wp-config.php`
	 */

	private $wp_config;

	/**
	 * get_data
	 *
	 * @return array Data for WordPress tab
	 */

	public function get_data() {

		// Get `wp-config.php` contents
		$config = file_get_contents( ABSPATH . 'wp-config.php' );

		// Get constants & variables
		$constants = $this->get_constants_from_config( $config );
		$variables = $this->get_variables_from_config( $config );
		$this->wp_config = array_merge( $constants, $variables );

		return array(

			array(
				'caption' => 'Plugins',
				'data'    => array(
					'Active' => $this->get_active_plugins(),
				),
			),

			array(
				'caption' => 'wp-config.php',
				'data'    => $this->wp_config,
			),

			array(
				'caption' => 'Options',
				'data'    => array(
					'Site URL'    => get_option( 'siteurl', '' ),
					'Home'        => get_option( 'home', '' ),
					'Admin Email' => get_option( 'admin_email', '' ),
					'Theme'       => get_option( 'current_theme', '' ),
					'Mail URL'    => get_option( 'mailserver_url', '' ),
					'Mail Login'  => get_option( 'mailserver_login', '' ),
					'Mail Pass'   => get_option( 'mailserver_pass', '' ),
					'Mail Port'   => get_option( 'mailserver_port', '' ),
					'Permalinks'  => get_option( 'permalink_structure', '' ),
					'GZip'        => get_option( 'gzipcompression', '' ),
					'Charset'     => get_option( 'blog_charset', '' ),
				),
			),

		);
	}

	/**
	 * get_constants_from_config
	 *
	 * When passed the contents of a `wp-config.php` file
	 * returns an array of Constants and their values
	 *
	 * @param string $config wp-config.php contents
	 * @return array Constants and their values
	 */

	private function get_constants_from_config( $config ) {

		// Get lines
		$lines = explode( "\n", $config );

		// Reset $config
		$config = array();

		// Constants to ignore
		$keys_salts = array(
			'AUTH_KEY',
			'SECURE_AUTH_KEY',
			'LOGGED_IN_KEY',
			'NONCE_KEY',
			'AUTH_SALT',
			'SECURE_AUTH_SALT',
			'LOGGED_IN_SALT',
			'NONCE_SALT',
		);

		// Iterate through lines & get constant definitions
		foreach ( $lines as $line ) {
			if ( substr( trim( $line ), 0, 7 ) === 'define(' ) {

				$parts = explode( '\'', $line );

				// Ignore keys & salts
				if ( !in_array( $parts[1], $keys_salts ) ) {
					$config[ $parts[1] ] = constant( $parts[1] );
				}

			}
		}

		return $config;

	}

	/**
	 * get_variables_from_config
	 *
	 * When passed the contents of a `wp-config.php` file
	 * returns an array of variables and their values
	 *
	 * @param string $config wp-config.php contents
	 * @return array Variables and their values
	 */

	private function get_variables_from_config( $config ) {

		// Get lines
		$lines = explode( "\n", $config );

		// Reset $config
		$config = array();

		// Iterate through lines
		foreach ( $lines as $line ) {
			if ( substr( $line, 0, 1 ) === '$' ) {
				$parts = explode( '=', $line );
				$var = str_replace( '$', '', trim( $parts[0] ) );
				$config[ $var ] = $GLOBALS[ $var ];
			}
		}

		return $config;

	}

	/**
	 * get_active_plugins
	 *
	 * @return array Sorted list of active plugins
	 */

	private function get_active_plugins() {
		$plugins = get_option( 'active_plugins', '' );
		natcasesort( $plugins );
		return $plugins;
	}

}
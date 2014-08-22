<?php

/**
 * View Helper
 */

namespace RichJenks\WPServerInfo\Helpers;

class View {

	/**
	 * prettify
	 *
	 * Makes a value display nicely
	 *
	 * @param mixed $var Variable to be prettified
	 * @return string Prettified variable
	 */

	public static function prettify( $var ) {

		// Empty string
		if ( $var === '' ) return '<pre>[EMPTY STRING]</pre>';

		// String
		if ( is_string( $var ) ) return $var;

		// Boolean
		if ( is_bool( $var ) ) {
			$var = ( $var ) ? 'true' : 'false';
			return '<i>' . $var . '</i>';
		}

		// Number
		if ( is_numeric( $var ) ) return '<pre>' . $var . '</pre>';

		// Array
		if ( is_array( $var ) ) {
			$string = '<ul>';
			foreach ( $var as $key => $value ) {
				$string .= '<li>';
				if ( !is_int( $key ) ) $string .= $key . ': ';
				$string .= self::prettify( $value ) . '</li>';
			}
			$string .= '</ul>';
			return $string;
		}

	}

}
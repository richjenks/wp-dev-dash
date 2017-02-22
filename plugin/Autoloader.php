<?php

/**
 * Autoloader
 */

namespace RichJenks\WPServerDashboard;

spl_autoload_register( function( $class ) {

	// Namespace base
	$namespace = 'RichJenks\WPServerDashboard\\';

	// Only run if calling a class in this plugin
	if ( substr( $class, 0, strlen( $namespace ) ) === $namespace ) {

		// Remove Dev\Project from namespace
		$class = str_replace( $namespace, '', $class );

		// Fix directory separator
		$class = str_replace( '\\', DS, $class );

		// Construct full path
		$file = __DIR__ . DS . $class . '.php';

		// If file exists, require it
		if ( file_exists( $file ) ) require_once $file;

	}

} );

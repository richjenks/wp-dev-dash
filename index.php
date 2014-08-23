<?php

/**
 * Plugin Name: Server Info
 * Plugin URI: https://richjenks.com/dev/wp/server-info/
 * Description: A page displaying server information for WordPress in Tools > Server
 * Version: 1.0
 * Author: Rich Jenks <rich@richjenks.com>
 * Author URI: https://richjenks.com
 * License: GPL2
 */

namespace RichJenks\WPServerInfo;
if ( !defined( 'DS' ) ) define ( 'DS', DIRECTORY_SEPARATOR );
require __DIR__ . DS . 'mvc' . DS . 'Helper.php';
require __DIR__ . DS . 'mvc' . DS . 'Autoloader.php';
require __DIR__ . DS . 'mvc' . DS . 'Router.php';
new Router;
<?php

/**
 * Plugin Name: Server Dashboard
 * Plugin URI: https://github.com/richjenks/wp-server-dashboard/
 * Description: A page displaying server information for WordPress in Tools > Server
 * Version: 1.0
 * Author: Rich Jenks <rich@richjenks.com>
 * Author URI: https://richjenks.com
 * License: GPL2
 */

namespace RichJenks\WPServerDashboard;
if ( !defined( 'DS' ) ) define ( 'DS', DIRECTORY_SEPARATOR );
require __DIR__ . DS . 'mvc' . DS . 'Helper.php';
require __DIR__ . DS . 'mvc' . DS . 'Autoloader.php';
require __DIR__ . DS . 'mvc' . DS . 'Router.php';
new Router;

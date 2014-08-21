<?php

/**
 * Plugin Name: Server Dashboard
 * Plugin URI: https://richjenks.com/dev/wp/server-dashboard/
 * Description: A server dashboard for WordPress in Tools > Server
 * Version: 1.0
 * Author: Rich Jenks <rich@richjenks.com>
 * Author URI: https://richjenks.com
 * License: GPL2
 */

namespace  RichJenks\WPServerDashboard;
if ( !defined( 'DS' ) ) define ( 'DS', DIRECTORY_SEPARATOR );
require __DIR__ . DS . 'autoloader.php';
require __DIR__ . DS . 'mvc' . DS . 'Router.php';
new Router;
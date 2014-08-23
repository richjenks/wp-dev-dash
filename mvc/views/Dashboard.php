<?php

require __DIR__ . DS . 'partials' . DS . 'Header.php';
require __DIR__ . DS . 'partials' . DS . 'Menu.php';
if ( isset( $data ) && $data ) {
	foreach ( $data as $table ) {
		require __DIR__ . DS . 'partials' . DS . 'Table.php';
	}
}
require __DIR__ . DS . 'partials' . DS . 'Footer.php';
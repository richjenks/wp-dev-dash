<?php

require __DIR__ . DS . 'partials' . DS . 'Header.php';
require __DIR__ . DS . 'partials' . DS . 'Menu.php';
foreach ( $data as $table ) require __DIR__ . DS . 'partials' . DS . 'Table.php';
require __DIR__ . DS . 'partials' . DS . 'Footer.php';
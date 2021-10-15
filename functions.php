<?php

/**
 * Kickoff theme setup and build
 */

namespace davinci;

use davinci\codebase\Boot;

define( 'DAVINCI_VERSION', wp_get_theme()->version );
define( 'DAVINCI_DIR', __DIR__ );
define( 'DAVINCI_URL', get_template_directory_uri() );


$loader = require_once( DAVINCI_DIR . '/vendor/autoload.php' );
$loader->addPsr4( 'davinci\codebase\\', __DIR__ . '/classes' );

\A7\autoload( __DIR__ . '/src' );
\A7\autoload( __DIR__ . '/shortcodes' );

Boot::get_instance();
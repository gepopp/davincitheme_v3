<?php

namespace davinci\codebase;

class Boot {

	private array $bootClasses;

	private static $instance = false;

	public static function get_instance(){

		if(!self::$instance){
			self::$instance = new Boot();
		}

		return self::$instance;
	}

	private function __clone() {}

	private function __construct() {

		$this->boot_classes();
		add_action('after_setup_theme', [$this, 'theme_setup'] );

	}


	protected function boot_classes() {

		foreach ( glob( get_template_directory() . '/classes/Boot/*') as $file ){

			$classname = 'davinci\codebase\Boot\\' . pathinfo($file, PATHINFO_FILENAME);
			new $classname;

		}

	}

	public function theme_setup() {

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		// Let WordPress manage the document title.
		add_theme_support('title-tag');

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support('post-thumbnails');
		add_theme_support('wp-block-styles');

		// Switch default core markup for search form, comment form, and comments to output valid HTML5.
		add_theme_support('html5', [
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		]);


		register_nav_menus([
			'header-menu' => __('Hauptmenü', 'davincigroup'),
		]);

		add_image_size('custom-thumbnail', 800, 600, true);
		add_image_size('custom-thumbnail-portrait', 300, 500, true);
		add_image_size( '16by9',   620, 348, true);
		add_image_size( 'half-height',   620, 250, true);
		add_image_size( 'team-image',   420, 315, true);
		add_image_size( 'quarter-box',   300, 300, true);


	}

}
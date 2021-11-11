<?php

namespace davinci\codebase\Boot;

class Widgets {

	public function __construct() {

		add_action('widgets_init', [$this, 'register_widgets']);

	}


	function register_widgets()
	{
		register_sidebar( array(
			'name'          => 'Footer Spalte 1',
			'id'            => 'footer_1',
			'before_widget' => '<div class="footer-widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="text-golden footer-widget-title">',
			'after_title'   => '</h2>',
		) );
		register_sidebar( array(
			'name'          => 'Footer Spalte 2',
			'id'            => 'footer_2',
			'before_widget' => '<div class="footer-widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="text-golden footer-widget-title">',
			'after_title'   => '</h2>',
		) );
		register_sidebar( array(
			'name'          => 'Footer Spalte 3',
			'id'            => 'footer_3',
			'before_widget' => '<div class="footer-widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="text-golden footer-widget-title">',
			'after_title'   => '</h2>',
		) );

		register_sidebar( array(
			'name'          => 'Artikel Sidebar',
			'id'            => 'article_sidebar',
			'before_widget' => '<div class="article-sidebar">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="text-golden sidebar-widget-title">',
			'after_title'   => '</h2>',
		) );
	}


}
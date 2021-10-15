<?php

namespace davinci\codebase\Boot;

class AdminColumns {


	public function __construct() {

		add_action( 'manage_edit-project_columns', [ $this, 'add_new_project_column' ] );
		add_action( 'manage_edit-frontpage_columns', [ $this, 'add_new_project_column' ] );

		add_action( 'manage_project_posts_custom_column', [ $this, 'show_order_column' ] );
		add_action( 'manage_frontpage_posts_custom_column', [ $this, 'show_order_column' ] );

		add_filter( 'manage_edit-project_sortable_columns', [ $this, 'order_column_register_sortable' ] );
		add_filter( 'manage_edit-frontpage_sortable_columns', [ $this, 'order_column_register_sortable' ] );


	}


	function add_new_project_column( $post_columns ) {
		$post_columns['menu_order'] = "Order";

		return $post_columns;
	}

	function order_column_register_sortable( $columns ) {
		$columns['menu_order'] = 'menu_order';

		return $columns;
	}


	function show_order_column( $name ) {
		global $post;

		switch ( $name ) {
			case 'menu_order':
				$order = $post->menu_order;
				echo $order;
				break;
			default:
				break;
		}
	}

}
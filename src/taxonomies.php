<?php

namespace davinci;

/*
|-----------------------------------------------------------
| Theme Custom Taxonomies
|-----------------------------------------------------------
|
| This file is for registering your theme custom taxonomies.
| Taxonomies help to classify posts and custom post types.
|
*/

function custom_taxonomy_team_category() {

	$labels = [
		'name'                       => _x( 'Team Mitglied Tags', 'Taxonomy General Name', 'davincigroup' ),
		'singular_name'              => _x( 'Team Mitglied Tag', 'Taxonomy Singular Name', 'davincigroup' ),
		'menu_name'                  => __( 'Team Tags', 'davincigroup' ),
		'all_items'                  => __( 'Alle Team Tags', 'davincigroup' ),
		'parent_item'                => __( 'Übergeordnet', 'davincigroup' ),
		'parent_item_colon'          => __( 'Übergeordnet:', 'davincigroup' ),
		'new_item_name'              => __( 'Neuer Tag', 'davincigroup' ),
		'add_new_item'               => __( 'Tag hinzufügen', 'davincigroup' ),
		'edit_item'                  => __( 'Tag bearbeiten', 'davincigroup' ),
		'update_item'                => __( 'Tag speichern', 'davincigroup' ),
		'view_item'                  => __( 'Tag ansehen', 'davincigroup' ),
		'separate_items_with_commas' => __( 'Durch Komma trennen', 'davincigroup' ),
		'add_or_remove_items'        => __( 'Hinzufügen oder Entfernen', 'davincigroup' ),
		'choose_from_most_used'      => __( 'Aus den meist Verwendeten wählen', 'davincigroup' ),
		'popular_items'              => __( 'Beliebte Tags', 'davincigroup' ),
		'search_items'               => __( 'Suchen', 'davincigroup' ),
		'not_found'                  => __( 'nichts gefunden', 'davincigroup' ),
		'no_terms'                   => __( 'keine Tags', 'davincigroup' ),
		'items_list'                 => __( 'Tag Liste', 'davincigroup' ),
		'items_list_navigation'      => __( 'Listennavigation', 'davincigroup' ),
	];
	$args   = [
		'labels'            => $labels,
		'hierarchical'      => false,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => true,
	];
	register_taxonomy( 'team_member_tag', [ 'team_member' ], $args );


	$labels = [
		'name'                       => _x( 'Projektart', 'Taxonomy General Name', 'davincigroup' ),
		'singular_name'              => _x( 'Projektart', 'Taxonomy Singular Name', 'davincigroup' ),
		'menu_name'                  => __( 'Projektart', 'davincigroup' ),
		'all_items'                  => __( 'Alle Projektarten', 'davincigroup' ),
		'parent_item'                => __( 'Übergeordnet', 'davincigroup' ),
		'parent_item_colon'          => __( 'Übergeordnet:', 'davincigroup' ),
		'new_item_name'              => __( 'Neue Projektart', 'davincigroup' ),
		'add_new_item'               => __( 'Projektart hinzufügen', 'davincigroup' ),
		'edit_item'                  => __( 'Projektart bearbeiten', 'davincigroup' ),
		'update_item'                => __( 'Projektart speichern', 'davincigroup' ),
		'view_item'                  => __( 'Projektart ansehen', 'davincigroup' ),
		'separate_items_with_commas' => __( 'Durch Komma trennen', 'davincigroup' ),
		'add_or_remove_items'        => __( 'Hinzufügen oder Entfernen', 'davincigroup' ),
		'choose_from_most_used'      => __( 'Aus den meist Verwendeten wählen', 'davincigroup' ),
		'popular_items'              => __( 'Beliebte Projektarten', 'davincigroup' ),
		'search_items'               => __( 'Suchen', 'davincigroup' ),
		'not_found'                  => __( 'nichts gefunden', 'davincigroup' ),
		'no_terms'                   => __( 'keine Tags', 'davincigroup' ),
		'items_list'                 => __( 'Projektarten Liste', 'davincigroup' ),
		'items_list_navigation'      => __( 'Listennavigation', 'davincigroup' ),
	];
	$args   = [
		'labels'            => $labels,
		'hierarchical'      => true,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => true,
	];
	register_taxonomy( 'project_type', [ 'project' ], $args );


	$labels = [
		'name'                       => _x( 'Projektort', 'Taxonomy General Name', 'davincigroup' ),
		'singular_name'              => _x( 'Projektort', 'Taxonomy Singular Name', 'davincigroup' ),
		'menu_name'                  => __( 'Projektort', 'davincigroup' ),
		'all_items'                  => __( 'Alle Projektorte', 'davincigroup' ),
		'parent_item'                => __( 'Übergeordnet', 'davincigroup' ),
		'parent_item_colon'          => __( 'Übergeordnet:', 'davincigroup' ),
		'new_item_name'              => __( 'Neue Projektort', 'davincigroup' ),
		'add_new_item'               => __( 'Projektort hinzufügen', 'davincigroup' ),
		'edit_item'                  => __( 'Projektort bearbeiten', 'davincigroup' ),
		'update_item'                => __( 'Projektort speichern', 'davincigroup' ),
		'view_item'                  => __( 'Projektort ansehen', 'davincigroup' ),
		'separate_items_with_commas' => __( 'Durch Komma trennen', 'davincigroup' ),
		'add_or_remove_items'        => __( 'Hinzufügen oder Entfernen', 'davincigroup' ),
		'choose_from_most_used'      => __( 'Aus den meist Verwendeten wählen', 'davincigroup' ),
		'popular_items'              => __( 'Beliebte Projektorten', 'davincigroup' ),
		'search_items'               => __( 'Suchen', 'davincigroup' ),
		'not_found'                  => __( 'nichts gefunden', 'davincigroup' ),
		'no_terms'                   => __( 'keine Tags', 'davincigroup' ),
		'items_list'                 => __( 'Projektorte Liste', 'davincigroup' ),
		'items_list_navigation'      => __( 'Listennavigation', 'davincigroup' ),
	];
	$args   = [
		'labels'            => $labels,
		'hierarchical'      => true,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => true,
	];
	register_taxonomy( 'project_location', [ 'project' ], $args );


}

add_action( 'init', 'davinci\custom_taxonomy_team_category', 0 );

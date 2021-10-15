<?php

namespace davinci;

/*
|-----------------------------------------------------------
| Theme Custom Post Types
|-----------------------------------------------------------
|
| This file is for registering your theme post types.
| Custom post types allow users to easily create
| and manage various types of content.
|
*/
function custom_post_type_project() {

    $labels = array(
        'name'                  => _x( 'Immobilien Projekte', 'Post Type General Name', 'davincigroup' ),
        'singular_name'         => _x( 'Immobilien Projekt', 'Post Type Singular Name', 'davincigroup' ),
        'menu_name'             => __( 'Immobilien Projekte', 'davincigroup' ),
        'name_admin_bar'        => __( 'Immobilien Projekte', 'davincigroup' ),
        'archives'              => __( 'Immobilien Projekte', 'davincigroup' ),
        'attributes'            => __( 'Projekt Attribute', 'davincigroup' ),
        'parent_item_colon'     => __( 'Parent Item:', 'davincigroup' ),
        'all_items'             => __( 'Alle Projekte', 'davincigroup' ),
        'add_new_item'          => __( 'Neues Projekt', 'davincigroup' ),
        'add_new'               => __( 'Hinzufügen', 'davincigroup' ),
        'new_item'              => __( 'Neues Projekt', 'davincigroup' ),
        'edit_item'             => __( 'Projekt bearbeiten', 'davincigroup' ),
        'update_item'           => __( 'Aktualisieren', 'davincigroup' ),
        'view_item'             => __( 'Ansehen', 'davincigroup' ),
        'view_items'            => __( 'Ansehen', 'davincigroup' ),
        'search_items'          => __( 'Suchen', 'davincigroup' ),
        'not_found'             => __( 'Nicht gefunden', 'davincigroup' ),
        'not_found_in_trash'    => __( 'Nicht gefunden', 'davincigroup' ),
        'featured_image'        => __( 'Hauptbild', 'davincigroup' ),
        'set_featured_image'    => __( 'Hauptbild setzten', 'davincigroup' ),
        'remove_featured_image' => __( 'Hauptbild entfernen', 'davincigroup' ),
        'use_featured_image'    => __( 'Als Hauptbild verwenden', 'davincigroup' ),
        'insert_into_item'      => __( 'Einfügen', 'davincigroup' ),
        'uploaded_to_this_item' => __( 'Zu diesem Projekt hochgeladen', 'davincigroup' ),
        'items_list'            => __( 'Auflisten', 'davincigroup' ),
        'items_list_navigation' => __( 'Listennavigation', 'davincigroup' ),
        'filter_items_list'     => __( 'Filtern', 'davincigroup' ),
    );
    $args = array(
        'label'                 => __( 'Immobilien Projekt', 'davincigroup' ),
        'description'           => __( 'Immobilien Projekt', 'davincigroup' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'show_in_rest'          => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );
    register_post_type( 'project', $args );


    $labels = array(
        'name'                  => _x( 'Startseiten Inhlate', 'Post Type General Name', 'davincigroup' ),
        'singular_name'         => _x( 'Startseiten Inhlate', 'Post Type Singular Name', 'davincigroup' ),
        'menu_name'             => __( 'Startseiten Inhlate', 'davincigroup' ),
        'name_admin_bar'        => __( 'Startseiten Inhlate', 'davincigroup' ),
        'archives'              => __( 'Startseiten Inhlate', 'davincigroup' ),
        'attributes'            => __( 'Inhalt Attribute', 'davincigroup' ),
        'parent_item_colon'     => __( 'Parent Item:', 'davincigroup' ),
        'all_items'             => __( 'Alle Inhalte', 'davincigroup' ),
        'add_new_item'          => __( 'Neues Inhalte', 'davincigroup' ),
        'add_new'               => __( 'Hinzufügen', 'davincigroup' ),
        'new_item'              => __( 'Neuer Inhalt', 'davincigroup' ),
        'edit_item'             => __( 'Inhalt bearbeiten', 'davincigroup' ),
        'update_item'           => __( 'Aktualisieren', 'davincigroup' ),
        'view_item'             => __( 'Ansehen', 'davincigroup' ),
        'view_items'            => __( 'Ansehen', 'davincigroup' ),
        'search_items'          => __( 'Suchen', 'davincigroup' ),
        'not_found'             => __( 'Nicht gefunden', 'davincigroup' ),
        'not_found_in_trash'    => __( 'Nicht gefunden', 'davincigroup' ),
        'featured_image'        => __( 'Hauptbild', 'davincigroup' ),
        'set_featured_image'    => __( 'Hauptbild setzten', 'davincigroup' ),
        'remove_featured_image' => __( 'Hauptbild entfernen', 'davincigroup' ),
        'use_featured_image'    => __( 'Als Hauptbild verwenden', 'davincigroup' ),
        'insert_into_item'      => __( 'Einfügen', 'davincigroup' ),
        'uploaded_to_this_item' => __( 'Zu diesem Projekt hochgeladen', 'davincigroup' ),
        'items_list'            => __( 'Auflisten', 'davincigroup' ),
        'items_list_navigation' => __( 'Listennavigation', 'davincigroup' ),
        'filter_items_list'     => __( 'Filtern', 'davincigroup' ),
    );
    $args = array(
        'label'                 => __( 'Startseiten Inhalt', 'davincigroup' ),
        'description'           => __( 'Startseiten Inhlate', 'davincigroup' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'frontpage', $args );


    $labels = array(
        'name'                  => _x( 'Team Mitglied', 'Post Type General Name', 'davincigroup' ),
        'singular_name'         => _x( 'Team Mitglieder', 'Post Type Singular Name', 'davincigroup' ),
        'menu_name'             => __( 'Team Mitglieder', 'davincigroup' ),
        'name_admin_bar'        => __( 'Team Mitglieder', 'davincigroup' ),
        'archives'              => __( 'Team Mitglieder', 'davincigroup' ),
        'attributes'            => __( 'Team Attribute', 'davincigroup' ),
        'parent_item_colon'     => __( 'Parent Item:', 'davincigroup' ),
        'all_items'             => __( 'Alle Mitglieder', 'davincigroup' ),
        'add_new_item'          => __( 'Neues Team Mitglied', 'davincigroup' ),
        'add_new'               => __( 'Hinzufügen', 'davincigroup' ),
        'new_item'              => __( 'Neues Team Mitglied', 'davincigroup' ),
        'edit_item'             => __( 'Team Mitglied bearbeiten', 'davincigroup' ),
        'update_item'           => __( 'Aktualisieren', 'davincigroup' ),
        'view_item'             => __( 'Ansehen', 'davincigroup' ),
        'view_items'            => __( 'Ansehen', 'davincigroup' ),
        'search_items'          => __( 'Suchen', 'davincigroup' ),
        'not_found'             => __( 'Nicht gefunden', 'davincigroup' ),
        'not_found_in_trash'    => __( 'Nicht gefunden', 'davincigroup' ),
        'featured_image'        => __( 'Portrait', 'davincigroup' ),
        'set_featured_image'    => __( 'Portrait setzten', 'davincigroup' ),
        'remove_featured_image' => __( 'Portrait entfernen', 'davincigroup' ),
        'use_featured_image'    => __( 'Als Portrait verwenden', 'davincigroup' ),
        'insert_into_item'      => __( 'Einfügen', 'davincigroup' ),
        'uploaded_to_this_item' => __( 'Zu diesem Team Mitglied hochgeladen', 'davincigroup' ),
        'items_list'            => __( 'Auflisten', 'davincigroup' ),
        'items_list_navigation' => __( 'Listennavigation', 'davincigroup' ),
        'filter_items_list'     => __( 'Filtern', 'davincigroup' ),
    );
    $args = array(
        'label'                 => __( 'Team Mitglied', 'davincigroup' ),
        'description'           => __( 'Team Mitglied', 'davincigroup' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies'            => array(  ),
        'hierarchical'          => false,
        'public'                => true,
        'menu_icon'                  => 'dashicons-universal-access',
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'team_member', $args );


}
add_action( 'init', 'davinci\custom_post_type_project', 0 );

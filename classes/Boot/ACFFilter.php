<?php

namespace davinci\codebase\Boot;

class ACFFilter {

	public function __construct() {

		if( function_exists('acf_add_options_page') ) {

			acf_add_options_page(array(
				'page_title' 	=> __('Grundeinstelltungen', 'davincigroup'),
				'menu_title'	=> __('Theme Grundeinstelltungen', 'davincigroup'),
				'menu_slug' 	=> 'theme-general-settings',
				'capability'	=> 'edit_posts',
				'redirect'		=> false
			));

			acf_add_options_sub_page(array(
				'page_title' 	=> __('Einstellungen Kopfzeile', 'davincigroup'),
				'menu_title'	=> __('Kopfzeile', 'davincigroup'),
				'parent_slug'	=> 'theme-general-settings',
			));

			acf_add_options_sub_page(array(
				'page_title' 	=> __('Einstellungen Fusszeile', 'davincigroup'),
				'menu_title'	=> __('Fusszeile', 'davincigroup'),
				'parent_slug'	=> 'theme-general-settings',
			));

			acf_add_options_sub_page(array(
				'page_title' 	=> __('Projekt Single Seiten', 'davincigroup'),
				'menu_title'	=> __('Projekt Single', 'davincigroup'),
				'parent_slug'	=> 'theme-general-settings',
			));

			acf_add_options_sub_page(array(
				'page_title' 	=> __('Team Archiv', 'davincigroup'),
				'menu_title'	=> __('Team Archiv', 'davincigroup'),
				'parent_slug'	=> 'theme-general-settings',
			));

			acf_add_options_sub_page(array(
				'page_title' 	=> __('Immobilien Archiv', 'davincigroup'),
				'menu_title'	=> __('Immobilien    Archiv', 'davincigroup'),
				'parent_slug'	=> 'theme-general-settings',
			));

			acf_add_options_sub_page(array(
				'page_title' 	=> __('404 Seite', 'davincigroup'),
				'menu_title'	=> __('404 Seite', 'davincigroup'),
				'parent_slug'	=> 'theme-general-settings',
			));

		}
	}
}
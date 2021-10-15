<?php

namespace davinci\codebase\Boot;

class Enqueue {

	public function __construct() {

		add_action( 'wp_enqueue_scripts', [ $this, 'register_stylesheets' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'register_scripts' ] );
	}


	function register_stylesheets() {
		wp_enqueue_style( 'davinci_theme_style', get_stylesheet_directory_uri() . '/dist/main.css' );
	}


	function register_scripts() {

		wp_enqueue_script( 'davinci_theme_js', get_stylesheet_directory_uri() . '/dist/main.js', [], null, true );
		wp_localize_script( 'davinci_theme_js', 'translations',
			[
				'filtern'     => __( 'Jetzt Filtern', 'davincigroup' ),
				'preis'       => __( 'Preis', 'davincigroup' ),
				'miete'       => __( 'Miete', 'davincigroup' ),
				'wfl'         => __( 'Wohnfläche', 'davincigroup' ),
				'zimmer'      => __( 'Zimmer', 'davincigroup' ),
				'top'         => __( 'Top', 'davincigroup' ),
				'free'        => __( 'nur Freie', 'davincigroup' ),
				'reset'       => __( 'zurücksetzen', 'davincigroup' ),
				'etage'       => __( 'ETAGE', 'davincigroup' ),
				'garten'      => __('Garten', 'daincgroup'),
				'balkon'      => __( 'Balkon, Terrasse, Loggia', 'davincigroup' ),
				'kaufpreis'   => __( 'KAUFPREIS', 'davincigroup' ),
				'grundriss'   => __( 'GRUNDRISS Download', 'davincigroup' ),
				'frei'        => __( 'frei', 'davincigroup' ),
				'anfrage'     => __( 'Auf Anfrage', 'davincigroup' ),
				'eckdaten'    => __( 'Eckdaten' ),
				'plan'        => __( 'Grundriss' ),
				'virtualTour' => __( '360° Rundgang' ),
				'ausstattung' => __( 'Ausstattung' ),
				'details'     => __( 'Details' ),
			]
		);
	}

}
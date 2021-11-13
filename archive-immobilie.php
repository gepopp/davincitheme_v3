<?php

the_post();
get_header();

$immobilien = get_posts( [
	'post_type'      => 'immobilie',
	'posts_per_page' => 10,
	'meta_query'     => [ [ 'key' => '_thumbnail_id' ] ],
] );


if ( ! empty( $immobilien ) ):
	$urls     = [];
	$lightbox = [];

	foreach ( $immobilien as $img ) {

		$urls[] = [
			'url' => get_the_post_thumbnail_url( $img->ID, '16by9' ),
		];


		$lightbox[] = [
			'thumb'   => get_the_post_thumbnail_url( $img->ID, 'thumbnail' ),
			'src'     => get_the_post_thumbnail_url( $img->ID, 'full' ),
			'caption' => get_the_post_thumbnail_caption( $img->ID ),
		];

	}
endif;
?>
<div id="app">
	<?php get_template_part( 'headers', 'banderole' ); ?>
    <section class="container mx-auto px-5">
        <div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-10">
            <div class="lg:my-12 my-10">
                <h3 class="text-base font-bold mb-0 leading-none text-white">
					<?php the_field( 'field_618fb257cce7d', 'option' ) ?></h3>
                <h1 class="text-3xl text-golden leading-none mb-8 break-words"><?php the_field( 'field_618fb25fcce7e', 'option' ) ?></h1>
                <div class="text-white text-sm"><?php the_field( 'field_618fb268cce7f', 'option' ) ?></p>
                </div>
            </div>
            <div class="lg:my-12 my-10">
				<?php if ( ! empty( $urls ) ): ?>
                    <image-carousel :images="<?php echo htmlspecialchars( json_encode( $urls, ENT_QUOTES ) ) ?>"></image-carousel>
                    <image-light-box :media="<?php echo htmlspecialchars( json_encode( $lightbox, ENT_QUOTES ) ) ?>"></image-light-box>
				<?php else: ?>
                    <div class="relative pt-5625 bg-turquise">
                        <div class="absolute top-0 left-0 h-full w-full flex items-center justify-center text-white">
                            <span>Bilder folgen</span>
                        </div>
                    </div>
				<?php endif; ?>
            </div>
    </section>

	<?php get_template_part( 'headers', 'close' ) ?>

	<?php
	$tops = new WP_Query( [
		'post_type'      => 'immobilie',
		'post_status'    => 'publish',
		'posts_per_page' => - 1,
	] );

	if ( $tops->have_posts() ) {
		while ( $tops->have_posts() ) {
			$tops->the_post();

			$von  = ( new \Carbon\Carbon() )->parse( get_field( 'oii_vo_Dati_oii_vo_Abdatum' ) != '' ? get_field( 'oii_vo_Dati_oii_vo_Abdatum' ) : '01.01.1970' );
			$bis  = ( new \Carbon\Carbon() )->parse( get_field( 'oii_vo_Dati_oii_vo_Bisdatum' ) != '' ? get_field( 'oii_vo_Dati_oii_vo_Bisdatum' ) : '01.01.9999' );
			$frei = \Carbon\Carbon::now()->between( $von, $bis );

			$sold = false;

			if ( get_field( 'oii_vo_Dati_oii_vo_VerfuegbarAb' ) == 'verkauft' ) {
				$sold = true;
				$frei = false;
			}

			$top_data[] = [
				'id'            => get_the_ID(),
				'top'           => get_field( 'oii_wohnungsnummer' ),
				'etage'         => get_field( 'oii_etage' ),
				'zimmer'        => get_field( 'oii_fl_Zimmer' )['oii_fl_AnzahlZimmer'],
				'wfl'           => get_field( 'oii_fl_WohnflächenGroup' )['oii_fl_Wohnflaeche'],
				'ffl'           => get_field( 'oii_fl_WohnflächenGroup' )['oii_fl_BalkonTerrasseFlaeche'],
				'garten'        => get_field( 'oii_fl_WohnflächenGroup' )['oii_fl_Gartenflaeche'],
				'verkaufspreis' => get_field( 'oii_pr_verkaufspreise' )['oii_pr_kaufpreis'],
				'miete'         => get_field( 'oii_pr_Mietpreise' )['oii_pr_Pauschalmiete'],
				'status'        => $frei,
				'sold'          => $sold,
				'permalink'     => get_permalink(),
				'von'           => $von,
				'bis'           => $bis,
				'grundrisse'    => get_field( 'oii_anh_GRUNDRISS' ),
				'address'       => [
					'street' => get_field( 'oii_strasse' ),
					'number' => get_field( 'oii_hausnummer' ),
					'zip'    => get_field( 'oii_plz' ),
					'city'   => get_field( 'oii_ort' ),
				],
			];
		}
	}

    $sorted = [];
    $reserved = [];
    $sold = [];
	foreach ( $top_data as $top_datum ) {
        if($top_datum['sold']){
            $sold[] = $top_datum;
        }elseif(!$top_datum['status']){
            $reserved[] = $top_datum;
         }else{
            $sorted[] = $top_datum;
        }
    }

   $sorted = array_merge($sorted, $reserved, $sold);


	wp_reset_postdata();

	foreach ( $top_data as $top ) {

		$prices[] = (float) $top['verkaufspreis'];
		$rents[]  = (float) $top['miete'];
		$wfl[]    = (float) $top['wfl'];
		$rooms[]  = (float) $top['zimmer'];

	}
	?>


    <section class="container mx-auto px-5">
        <tops-table-archive :tops="<?php echo htmlentities( json_encode( $sorted ) ) ?>"
                            :min-price="<?php echo min( $prices ) ?>"
                            :max-price="<?php echo max( $prices ) ?>"
                            :min-rooms="<?php echo min( $rooms ) ?>"
                            :max-rooms="<?php echo max( $rooms ) ?>"
                            :min-wfl="<?php echo min( $wfl ) ?>"
                            :max-wfl="<?php echo max( $wfl ) ?>"
                            :min-rent="<?php echo max( $rents ) ?>"
                            :max-rent="<?php echo max( $rents ) ?>"
        ></tops-table-archive>
    </section>
</div>
<?php get_footer() ?>


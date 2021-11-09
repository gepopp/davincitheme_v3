<?php

$group = get_field( 'field_5f5c7c78415e9' );

if ( ! empty( $group ) ) {
	$tops = new WP_Query( [
		'post_type'      => 'immobilie',
		'post_status'    => 'publish',
		'posts_per_page' => - 1,
		'meta_query'     => [
			'relation' => 'AND',
			[
				'key'     => 'oii_vt_gruppe_oii_vt_gruppenkennung',
				'value'   => $group,
				'compare' => '=',
			],
		],
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
			];
		}
	}
	wp_reset_postdata();
}

foreach ( $top_data as $top ) {

	$prices[] = (float) $top['verkaufspreis'];
	$rents[]  = (float) $top['miete'];
	$wfl[]    = (float) $top['wfl'];
	$rooms[]  = (float) $top['zimmer'];

}
?>




<?php if ( ! empty( $top_data ) ): ?>

    <project-canvas-content id="<?php _e( 'Apartments', 'davincigroup' ) ?>" active-start="true">

        <tops-table :tops="<?php echo htmlentities( json_encode( $top_data ) ) ?>"
                    :min-price="<?php echo min( $prices ) ?>"
                    :max-price="<?php echo max( $prices ) ?>"
                    :min-rooms="<?php echo min( $rooms ) ?>"
                    :max-rooms="<?php echo max( $rooms ) ?>"
                    :min-wfl="<?php echo min( $wfl ) ?>"
                    :max-wfl="<?php echo max( $wfl ) ?>"
                    :min-rent="<?php echo max( $rents ) ?>"
                    :max-rent="<?php echo max( $rents ) ?>"
        ></tops-table>

    </project-canvas-content>

<?php elseif ( ! empty( get_field( 'field_5f22dde18baf4' ) ) ): ?>

    <project-canvas-content id="Apartments">
        <div class="container mx-auto">
            <div class="p-10" style="min-height: 640px">
				<?php ?>
				<?php echo get_field( 'field_5f22dde18baf4' ) ?>
            </div>
        </div>
    </project-canvas-content>

<?php endif; ?>

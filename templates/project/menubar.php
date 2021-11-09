<project-menu-bar>
	<?php
	$group = get_field( 'field_5f5c7c78415e9' );
	$tops  = new WP_Query( [
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
			[
				'key'     => 'oii_vt_gruppe_oii_vt_gruppenkennung',
				'compare' => 'EXISTS',
			],
		],
	] );

	$apparments = false;
	if ( ! empty( get_field( 'field_5f22dde18baf4' ) ) || ( $tops->post_count != 0 ) && ! empty( $group ) ):
		$apparments = true;
		?>
        <canvas-button id="<?php _e( 'Apartments', 'davincigroup' ) ?>" active-start="true">
            <div class="pb-2">
                <svg class="w-6 h-6 text-golden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                </svg>
            </div>
        </canvas-button>
		<?php
		wp_reset_postdata();
	endif;
	?>


	<?php if ( ! empty( get_the_content() ) ): ?>
        <canvas-button id="<?php _e( 'Beschreibung', 'davincigroup' ) ?>">
            <div class="pb-2">
                <svg class="w-6 h-6 text-golden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                </svg>
            </div>
        </canvas-button>
	<?php endif; ?>

	<?php if ( ! empty( get_field( 'field_5f22e62fee8ac' ) ) ): ?>
        <canvas-button id="<?php _e( '360° Rundgang', 'davincigroup' ) ?>">
            <div class="pb-2">
                <svg class="w-6 h-6 text-golden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                </svg>
            </div>
        </canvas-button>
	<?php endif; ?>

	<?php if ( ! empty( get_field( 'field_5f4f6e8c3d811' ) ) ): ?>
        <canvas-button id="<?php _e( '360° Panoramas', 'davincigroup' ) ?>">
            <div class="pb-2">
                <svg class="w-6 h-6 text-golden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                </svg>
            </div>
        </canvas-button>
	<?php endif; ?>


	<?php if ( ! empty( get_field( 'field_5f22e219caec9' ) ) ): ?>
        <canvas-button id="<?php _e( 'Gebäude', 'davincigroup' ) ?>">
            <div class="pb-2">
                <svg class="w-6 h-6 text-golden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
            </div>
        </canvas-button>
	<?php endif; ?>

	<?php if ( ! empty( get_field( 'field_5f22e2d2ee8aa' ) ) ): ?>
        <canvas-button id="<?php _e( 'Ausstattung', 'davincigroup' ) ?>">
            <div class="pb-2">
                <svg class="w-6 h-6 text-golden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                </svg>
            </div>
        </canvas-button>
	<?php endif; ?>

	<?php if ( ! empty( get_field( 'field_5f22da4592c42' ) ) ): ?>
        <canvas-button id="<?php _e( 'Downloads', 'davincigroup' ) ?>">
            <div class="pb-2">
                <svg class="w-6 h-6 text-golden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
        </canvas-button>
	<?php endif; ?>



	<?php if ( ! empty( get_field( 'field_5f22e291ee8a7' ) ) ): ?>
        <canvas-button id="<?php _e( 'Lage', 'davincigroup' ) ?>">
            <div class="pb-2">
                <svg class="w-6 h-6 text-golden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                </svg>
            </div>
        </canvas-button>
	<?php endif; ?>


</project-menu-bar>

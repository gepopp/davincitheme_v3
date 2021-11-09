<div id="canvas" class="wrapper">
    <project-canvas>
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
	        <?php get_template_part('canvases', 'appartments') ?>
	        <?php
	        wp_reset_postdata();
        endif;
        ?>

	    <?php if ( ! empty( get_the_content() ) ): ?>
		    <?php get_template_part( 'canvases','content' ); ?>
	    <?php endif; ?>

	    <?php if ( ! empty( get_field( 'field_5f22e62fee8ac' ) ) ): ?>
		    <?php get_template_part( 'canvases','tour' ); ?>
	    <?php endif; ?>


	    <?php if ( ! empty( get_field( 'field_5f22e219caec9' ) ) ): ?>
		    <?php get_template_part( 'canvases','building' ); ?>
	    <?php endif; ?>

	    <?php if ( ! empty( get_field( 'field_5f22e2d2ee8aa' ) ) ): ?>
		    <?php get_template_part( 'canvases','ausstattung' ); ?>
	    <?php endif; ?>

	    <?php if ( ! empty( get_field( 'field_5f22da4592c42' ) ) ): ?>
		    <?php get_template_part( 'canvases','downloads' ); ?>
	    <?php endif; ?>

	    <?php if ( ! empty( get_field( 'field_5f22e291ee8a7' ) ) ): ?>
		    <?php get_template_part( 'canvases','map' ); ?>
	    <?php endif; ?>
    </project-canvas>
</div>

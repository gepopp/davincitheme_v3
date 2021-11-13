<?php
add_shortcode( 'teammember', function ( $atts ) {

	$bg = 'bg-darkblue';

	if ( ! isset( $atts['ids'] ) ) {
		return;
	}

	$ids = explode( ',', $atts['ids'] );

	$team_members = new WP_Query( [
		'post_type' => 'team_member',
		'post__in'  => $ids,
	] );

	ob_start();

	if ( $team_members->have_posts() ):
		while ( $team_members->have_posts() ):
			$team_members->the_post();
			?>
            <div class="flex flex-col col-span-2 lg:col-span-1  shadow-lg bg-darkblue my-5">
				<?php the_post_thumbnail( 'quarter-box', [
					'style' => 'min-height: 50%',
					'class' => 'hidden lg:block w-full h-auto',
				] ); ?>
				<?php the_post_thumbnail( 'custom-thumbnail', [ 'class' => 'lg:hidden' ] ); ?>
                <div class="<?php echo $bg ?> w-full flex flex-col flex-grow p-5 relative">
                        <h3 class="text-golden text-xl leading-normal mb-0">
                            <?php the_field('field_5f23fa71c024c') ?>&nbsp;<?php the_field('field_5f23fa76c024d') ?>
                        </h3>
                        <h3 class="text-white text-lg font-medium mt-0">
                            <?php echo get_field( 'field_5f25dace611bf' ) != '' ? get_field( 'field_5f25dace611bf' ) : 'Da Vinci Group' ?>
                        </h3>
					<?php $term = wp_get_post_terms( get_the_ID(), 'project_location' );
					if ( $term ): $divider_tag = $term[0]->name;
					else: $divider_tag = null; endif; ?>
					<?php get_template_part( 'helper', 'divider', [
						'bg'          => $bg,
						'divider_tag' => $divider_tag,
					] ); ?>
                    <div class="mt-auto">
						<p>
                            <a href="mailto:<?php the_field('field_5f23fa7ec024e'); ?>" class="text-white"><?php the_field('field_5f23fa7ec024e'); ?></a>
                        </p>
                        <p>
                            <a href="tel:<?php the_field('field_5f23fa86c024f'); ?>" class="text-white"><?php the_field('field_5f23fa86c024f'); ?></a>
                        </p>
                        <p>
	                        <?php if ( get_field( 'field_60efd6ac8f6e3' ) ): ?>
                                <a href="<?php the_field( 'field_60efd6ac8f6e3' ); ?>" class="underline text-white">Download digitale Visitenkarte
                                    <small>(vcf)</small>
                                </a>
	                        <?php endif; ?>
                        </p>
                    </div>
                </div>
            </div>

		<?php
		endwhile;
	endif;

	return ob_get_clean();

} );

<?php
add_shortcode( 'project', function ( $atts ) {

    $bg = 'bg-darkblue';

	if ( ! isset( $atts['ids'] ) ) {
		return;
	}

	$ids = explode( ',', $atts['ids'] );

	$projects = new WP_Query( [
		'post_type' => 'project',
		'post__in'  => $ids,
	] );

	ob_start();

	if ( $projects->have_posts() ):
		while ( $projects->have_posts() ):
			$projects->the_post();
			?>
            <div class="flex flex-col col-span-2 lg:col-span-1  shadow-lg bg-darkblue my-5">
				<?php if ( get_post_type() == 'project' ): ?>
                <a href="<?php the_permalink(); ?>" class="w-full h-full">
					<?php else: ?>
                    <a href="<?php echo get_field( 'field_5f23c86fc9b98' )['url'] ?? '' ?>" class="w-full h-full relative">
						<?php endif; ?>
						<?php the_post_thumbnail( 'quarter-box', [
							'style' => 'min-height: 50%',
							'class' => 'hidden lg:block w-full h-auto',
						] ); ?>
						<?php the_post_thumbnail( 'custom-thumbnail', [ 'class' => 'lg:hidden' ] ); ?>
                    </a>
                    <div class="<?php echo $bg ?> w-full flex flex-col flex-grow p-5 relative">

						<?php if ( get_field( 'field_60bc7d0a1e837' ) ): ?>
                            <p class="bg-golden text-white uppercase px-3 flex justify-center absolute top-0 -mt-3 left-0 w-full">
                                <span><?php echo get_field( 'field_60bc94a0bef6f' ) ?></span>
                            </p>
						<?php endif; ?>


                        <a href="<?php the_permalink(); ?>">
                            <h2 class="text-golden text-xl leading-normal truncate"><?php the_title() ?></h2>
                            <h3 class="text-white text-lg font-medium -mb-4 truncate"><?php echo get_field( 'field_5f216411f6f5a' ) != '' ? get_field( 'field_5f216411f6f5a' ) : 'Da Vinci Group' ?></h3>
                        </a>
						<?php $term = wp_get_post_terms( get_the_ID(), 'project_location' );
						if ( $term ): $divider_tag = $term[0]->name;
						else: $divider_tag = null; endif; ?>
						<?php get_template_part( 'helper', 'divider', [ 'bg'          => $bg,
						                                                'divider_tag' => $divider_tag,
						] ); ?>
                        <div class="mt-auto">
							<?php get_template_part( 'helper', 'project-meta' ); ?>
							<?php get_template_part( 'helper', 'grid-button' ); ?>
                        </div>
                    </div>
            </div>

		<?php
		endwhile;
	endif;

	return ob_get_clean();

} );

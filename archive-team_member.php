<?php
get_header();


$terms = get_terms( 'team_member_tag' );

if ( $terms ) {
	foreach ( $terms as $index => $term ) {
		$terms[ $index ]->sort = (int) get_field( 'field_5f2b1c928d84b', 'team_member_tag_' . $term->term_id );
	}

	usort( $terms, function ( $a, $b ) {
		if ( $a->sort == $b->sort ) {
			return 0;
		} elseif ( $a->sort < $b->sort ) {
			return - 1;
		} else {
			return 1;
		}
	} );
}

get_template_part( 'headers', 'banderole' );
get_template_part( 'headers', 'team', [ 'tags' => $terms ] );

?>
    <section class="container mx-auto px-3 xl:px-0" style="
            background-image: url( <?php the_field( 'field_5f213eff8495d', 'option' ) ?>);
            background-size: 100% auto;
            background-repeat: no-repeat;
            background-position: bottom left;
            padding-bottom: <?php the_field( 'field_5f2141a728d7c', 'option' ) ?>px">
        <div class="wrapper">
            <div class="content">
				<?php foreach ( $terms as $term ):

					$team_members = new WP_Query( [
						'post_type'      => 'team_member',
						'posts_per_page' => - 1,
						'post_status'    => 'publish',
						'tax_query'      => [
							'relation' => 'AND',
							[
								'taxonomy' => 'team_member_tag',
								'field'    => 'slug',
								'terms'    => $term->slug,

							],
						],
					] );

					?>
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 pt-10" id="<?php echo $term->slug ?>">
                        <div class="col-span-1 mb-10">
							<?php get_template_part( 'helper', 'headings',
								[
									'title'    => $term->name,
									'subtitle' => get_field( 'field_5f25d3a3727b8', $term ),
								] ); ?>
                        </div>

                        <div class="col-span-2">
                            <div class="grid grid-cols-2 gap-4">

								<?php
								if ( $team_members->have_posts() ):
									while ( $team_members->have_posts() ):
										$team_members->the_post(); ?>

                                        <div class="flex flex-col col-span-2 md:col-span-1">
											<?php the_post_thumbnail( 'custom-thumbnail' ); ?>

                                            <div class="border-b border-darkblue mt-5 flex flex-col flex-1">

                                                <span class="block font-medium"><?php the_field( 'field_5f25dace611bf' ) ?></span>
                                                <span class="block text-golden text-4xl m-0"><?php the_title() ?></span>

                                                <p>
													<?php the_content(); ?>
                                                </p>

                                                <div>
                                                </div>

                                                <div class="mt-auto">
                                                    <span class="block">E-Mail:<a href="mailto:<?php the_field( 'field_5f23fa7ec024e' ) ?>" class="pl-5 underline"><?php the_field( 'field_5f23fa7ec024e' ) ?></a></span>
                                                    <span class="block">Telefon:<a href="tel:<?php the_field( 'field_5f23fa86c024f' ) ?>" class="pl-5 underline"><?php the_field( 'field_5f23fa86c024f' ) ?></a></span>

													<?php if ( get_field( 'field_60efd6ac8f6e3' ) ): ?>
                                                        <a href="<?php the_field( 'field_60efd6ac8f6e3' ); ?>" class="underline my-3">Download digitale Visitenkarte
                                                            <small>(vcf)</small>
                                                        </a>
													<?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
									<?php
									endwhile;
                                    endif;
                                    ?>
                            </div>
                        </div>
                    </div>
				<?php endforeach; ?>
            </div>
        </div>
    </section>
<?php get_footer();


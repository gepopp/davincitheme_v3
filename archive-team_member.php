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
$slugs = array_column( $terms, 'slug' );

?>
    <script>
        function scrollspy() {
            const element = document.getElementById('scrollnav');
            return element.getBoundingClientRect().top;
        }

        function isInViewport(el) {
            const rect = el.getBoundingClientRect();
            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                rect.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
        }

        var slugs = <?php echo json_encode( $slugs ) ?>;

        function sluginviewport() {
            return slugs.find(sl => {
                if (isInViewport(document.getElementById(sl))) {
                    return sl;
                }
            })
        }

    </script>
    <section class="container mx-auto px-3 xl:px-0" style="
            background-image: url( <?php the_field( 'field_5f213eff8495d', 'option' ) ?>);
            background-size: 100% auto;
            background-repeat: no-repeat;
            background-position: bottom left;
            padding-bottom: <?php the_field( 'field_5f2141a728d7c', 'option' ) ?>px">
        <div class="wrapper">
            <div class="content">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 pt-10" id="<?php echo $term->slug ?>">

                    <div class="col-span-1 mb-10">
                        <div class="relative pt-10"
                             id="powered"
                             x-data="{ scrolled : 0, active : '' }"
                             @scroll.window.debounce="scrolled = document.getElementById('powered').offsetTop - window.pageYOffset"
                             @scroll.window="active = sluginviewport()">
                            <div id="scrollnav"
                                 class="absolute left-0 transition-all hidden lg:block"
                                 :style="`top: ${ scrolled < 0 ? (scrolled * -1) + 100 : 0 }px;`"
                                 x-transition
                            >
                                <h3 class="text-xl text-darkblue font-semibold">
									<?php _e( 'Abteilungen', 'davincigroup' ) ?>
                                </h3>
                                <ul class="text-darkblue">
									<?php foreach ( $terms as $tag ): ?>
                                        <li>
                                            <a href="#<?php echo $tag->slug ?>" :class="{ 'font-semibold underline' : active == '<?php echo $tag->slug ?>' }">
                                                <span class="text-3xl leading-none pr-5">&rsaquo;</span>
                                                <span class="hover:underline"><?php echo $tag->name ?></span>
                                            </a>
                                        </li>
									<?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-2">

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


                            <div class="grid grid-cols-2 gap-4" id="<?php echo $term->slug ?>">

								<?php
								if ( $team_members->have_posts() ):
									while ( $team_members->have_posts() ):
										$team_members->the_post(); ?>

                                        <div class="flex flex-col col-span-2 md:col-span-1">
                                            <a href="<?php the_permalink(); ?>">
												<?php the_post_thumbnail( 'custom-thumbnail' ); ?>
                                            </a>
                                            <div class="border-b border-darkblue mt-5 flex flex-col flex-1  mb-10">
                                                <a href="<?php the_permalink(); ?>">
                                                    <span class="block font-medium"><?php the_field( 'field_5f25dace611bf' ) ?></span>
                                                </a>
                                                <a href="<?php the_permalink(); ?>">
                                                    <span class="block text-golden text-4xl m-0"><?php the_title() ?></span>
                                                </a>
                                                <p>
													<?php the_excerpt(); ?>
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
						<?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php get_footer();

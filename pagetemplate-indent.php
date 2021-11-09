<?php
/**
 * Template Name: Indent
 */

get_header();
?>

<?php
get_template_part( 'headers', 'banderole' );

?>
    <div class="mt-10"></div>
    <div class="container mx-auto px-3 xl:px-0 mb-5">
        <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-4">
            <div class="">
                <h3 class="text-base font-bold mb-0 leading-none text-white"><?php the_field( 'field_5f216411f6f5a' ) ?></h3>
                <h1 class="text-5xl text-golden leading-normal"><?php the_title() ?></h1>
            </div>
            <div class="col-span-1 lg:col-span-2">
	            <?php if ( ! empty( get_field( 'field_5f21641ef6f5b' ) ) ): ?>
                    <p class="text-white mb-10"><?php the_field( 'field_5f21641ef6f5b' ) ?></p>
	            <?php endif; ?>
				<?php if ( has_post_thumbnail() ): ?>
					<?php the_post_thumbnail( 'custom-thumbnail', [ 'class' => 'shadow-lg w-full' ] ); ?>
				<?php endif ?>

            </div>
        </div>
    </div>
<?php
get_template_part('headers', 'close');


if ( have_posts() ) : ?>
    <div class="container mx-auto bg-white bg-opacity-50">
		<?php while ( have_posts() ) :
			the_post();

			$content = get_the_content();
			$parts   = explode( '<h2>', $content );

			foreach ( $parts as $part ) {

				$cols = explode( '</h2>', $part );

				if ( count( $cols ) > 1 ) { ?>
                    <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-4 mt-12 p-3">
                        <div class="mb-5">
                            <h3 class="intent text-base font-bold mb-0 mt-0 leading-none" style="margin: 0"><?php the_field( 'field_5f216411f6f5a' ) ?></h3>
                            <h1 class="intent text-5xl text-golden leading-none"><?php echo array_shift( $cols ) ?></h1>
                        </div>
                        <div class="col-span-1 lg:col-span-2">
							<?php echo do_shortcode( implode( $cols ) ) ?>
                        </div>
                    </div>
				<?php } else { ?>
                    <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-4 p-3">
                        <div class=""></div>
                        <div class="col-span-2">
							<?php echo do_shortcode( implode( $cols ) ) ?>
                        </div>
                    </div>
					<?php
				}


			}
		endwhile; ?>
    </div>
<?php
endif;
get_template_part( 'helper', 'close-body' );


get_footer();

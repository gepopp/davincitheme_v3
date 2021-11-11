<?php
/**
 * Template Name: NEWS
 */
get_header();

get_template_part( 'headers', 'banderole' );

$sticky = new WP_Query( [
	'posts_per_page'      => 1,
	'post__in'            => get_option( 'sticky_posts' ),
	'ignore_sticky_posts' => 1,
] );


if ( $sticky->have_posts() ):
	while ( $sticky->have_posts() ):
		$sticky->the_post();
		$categories = get_the_category();
		$ignore     = get_the_ID();
		?>

        <div class="mt-10"></div>
        <div class="container mx-auto px-3 xl:px-0">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                <div class="mb-10">
                    <p class="text-base font-bold mb-0 leading-none text-white">
						<?php echo get_the_time( 'd.m.Y' ) ?>
                        |
						<?php echo get_the_author() ?>

						<?php foreach ( $categories as $category ): ?>
                            |
                            <span class="text-golden underline">
                                <a href="<?php echo get_category_link( $category ) ?>" class="text-golden underline"><?php echo $category->name; ?></a>
                                </span>
						<?php endforeach; ?>
                    </p>
                    <h1 class="text-5xl text-golden leading-normal"><?php the_title() ?></h1>
                    <div class="text-white line-clamp-4">
						<?php the_excerpt(); ?>
                    </div>
                    <div class="mt-5 flex justify-end">
                        <a href="<?php the_permalink(); ?>"
                           class="bg-golden text-white py-3 px-10 shadow-lg">Jetzt lesen</a>
                    </div>
                </div>
                <div class="col-span-2 lg:col-span-1 lg:mb-10 order-first lg:order-last">
					<?php if ( has_post_thumbnail() ): ?>
						<?php the_post_thumbnail( '16by9', [ 'class' => 'shadow-lg w-full' ] ); ?>
					<?php endif ?>
                </div>
            </div>
        </div>
		<?php
		get_template_part( 'headers', 'close' );
	endwhile;
endif;
get_template_part( 'helper', 'close-body' );
wp_reset_postdata();

$posts  = new WP_Query( [
	'post_type'           => 'post',
	'post_status'         => 'publish',
	'posts_per_page'      => 4,
	'paged'               => get_query_var( 'paged', 1 ),
	'ignore_sticky_posts' => 1,
] );
$runner = 1;
if ( $posts->have_posts() ): ?>
    <div class="container mx-auto px-3 xl:px-0 mb-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
			<?php
			while ( $posts->have_posts() ):
				$posts->the_post();
				$categories = get_the_category();
				?>


                <div class="flex flex-col h-full shadow-lg">
                    <div class="col-span-4 lg:hidden">
						<?php the_post_thumbnail( 'custom-thumbnail' ) ?>
                    </div>

                    <div class="hidden lg:block" style="background-image: url( <?php echo the_post_thumbnail_url( '16by9' ) ?> ); background-size: cover; min-height: 258px"></div>
                    <div class="h-full flex flex-col justify-end p-5 bg-darkblue" style="min-height: 258px">

                        <a href="<?php the_permalink(); ?>" class="mb-3">
                            <p class="text-base font-bold mb-0 leading-none text-white">
								<?php echo get_the_time( 'd.m.Y' ) ?>
                                |
								<?php echo get_the_author() ?>

								<?php foreach ( $categories as $category ): ?>
                                    |
                                    <span class="text-golden underline">
                                <a href="<?php echo get_category_link( $category ) ?>" class="text-golden underline"><?php echo $category->name; ?></a>
                                </span>
								<?php endforeach; ?>
                            </p>
                            <h2 class="text-golden text-3xl leading-normal"><?php the_title() ?></h2>
                        </a>
						<?php $term = wp_get_post_terms( get_the_ID(), 'project_location' );
						if ( $term ): $divider_tag = $term[0]->name;
						else: $divider_tag = null; endif; ?>
						<?php get_template_part( 'helper', 'divider', [
							'bg'          => 'bg-darkblue',
							'divider_tag' => $divider_tag,
						] ); ?>
                        <p class="text-white line-clamp-4">
							<?php echo get_the_excerpt(); ?>
                        </p>
                        <div class="mt-5">
                            <a href="<?php the_permalink(); ?>"
                               class="block text-center bg-golden text-white py-3 px-10 shadow-lg">Jetzt lesen</a>
                        </div>
                    </div>
                </div>
				<?php $runner ++ ?>
			<?php endwhile; ?>
        </div>
    </div>
<?php
endif;

\davinci\codebase\Pagination::paginate($posts->max_num_pages);


get_footer();
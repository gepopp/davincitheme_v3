<?php
get_header();

get_template_part( 'headers', 'banderole' );
the_post();

$categories = get_the_category();
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
?>
	<div class="container mx-auto p-5">
		<div class="grid grid-cols-4 gap-5">
			<div class="hidden md:block px-5 border-r border-golden" id="app">
				<?php dynamic_sidebar('article_sidebar'); ?>
			</div>
			<div class="col-span-4 md:col-span-3">
				<?php the_content();?>
			</div>
		</div>
	</div>
<?php
get_footer();

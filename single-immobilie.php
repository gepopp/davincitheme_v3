<?php
the_post();
get_header();

$gallery = get_field( 'oii_anh_BILD' );


if ( ! empty( $gallery ) ):
	$urls     = [];
	$lightbox = [];


	if ( has_post_thumbnail() ) {

		$urls[]     = [
			'url' => get_the_post_thumbnail_url( null, '16by9' ),
		];
		$lightbox[] = [
			'thumb'   => get_the_post_thumbnail_url( null, 'thumbnail' ),
			'src'     => get_the_post_thumbnail_url( null, 'full' ),
			'caption' => get_the_post_thumbnail_caption(),
		];
	}

	foreach ( $gallery as $img ) {

		$urls[] = [
			'url'    => $img['sizes']['16by9'],
			'is_360' => get_field( 'field_5f4e73ada2722', $img['ID'] ),
		];


		$lightbox[] = [
			'thumb'   => $img['sizes']['thumbnail'],
			'src'     => $img['url'],
			'caption' => $img['caption'],
		];

	}
endif;

$gallery = [];
?>
<div id="app">
	<?php get_template_part( 'headers', 'banderole' ); ?>
    <section class="container mx-auto px-5">
        <div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-10">
            <div class="lg:my-24 mb-10 mt-10">
                <h3 class="text-base font-bold mb-0 leading-none text-white">
					<?php the_field( 'field_5f216411f6f5a' ) ?></h3>
                <h1 class="text-3xl text-golden leading-none mb-8 break-words"><?php the_title() ?></h1>
                <div class="text-white text-sm"><?php the_field( 'oii_ft_ObjektText', null, false ) ?></p>
                </div>
            </div>
            <div class="lg:my-24 mb-10">
				<?php if ( ! empty( $gallery ) ): ?>
                    <image-carousel :images="<?php echo htmlspecialchars( json_encode( $urls, ENT_QUOTES ) ) ?>"></image-carousel>
                    <image-light-box :media="<?php echo htmlspecialchars( json_encode( $lightbox, ENT_QUOTES ) ) ?>"></image-light-box>
				<?php else: ?>
                    <div class="relative pt-5625 bg-turquise">
                        <div class="absolute top-0 left-0 h-full w-full flex items-center justify-center text-white">
                            <span>Bilder folgen</span>
                        </div>
                    </div>
				<?php endif; ?>
            </div>
    </section>
	<?php get_template_part( 'headers', 'close' ) ?>
    <section class="container mx-auto px-5">
		<?php get_template_part( 'project', 'menubar' ) ?>
		<?php get_template_part( 'project', 'canvas' ) ?>
    </section>
</div>




<?php get_footer() ?>

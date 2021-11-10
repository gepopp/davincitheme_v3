<?php get_template_part('headers', 'open') ?>
<div class="bg-lightblue shadow-lg py-3 lg:py-0 <?php !is_singular('project') ? 'mb-10' : '' ?>" id="banderole" >
    <div class="container mx-auto flex justify-between content-center px-3  <?php echo is_singular( 'project' ) ? 'py-5' : '' ?>">
        <a href="<?php echo home_url() ?>">
			<?php if ( ! is_singular( 'project' ) ): ?>
                <img src="<?php the_field( 'field_5f207d4c15987', 'option' ) ?>" width="100" height="100" class="logo hidden lg:block">
                <img src="<?php the_field( 'field_5f20aa5bbc4e0', 'option' ) ?>" width="100" height="100" class="logo lg:hidden">
			<?php else: ?>
				<?php get_template_part( 'svg', 'logo-horizontal' ); ?>
			<?php endif; ?>
        </a>
		<?php
		wp_nav_menu( [
			'menu'            => "header-menu",
			// (int|string|WP_Term) Desired menu. Accepts a menu ID, slug, name, or object.
			'menu_class'      => "flex justify-between",
			// (string) CSS class to use for the ul element which forms the menu. Default 'menu'.
			'container_class' => "hidden lg:flex flex-col justify-center text-golden w-1/2",
			// (string) Class that is applied to the container. Default 'menu-{menu slug}-container'.
		] );
		?>
        <div class="flex flex-col justify-center">
			<?php get_template_part( 'headers', 'contactbuttons' ) ?>
			<?php get_template_part( 'headers', 'hamburger' ) ?>
        </div>
    </div>
</div>
<?php if(is_singular('project')): ?>
<div class="bg-golden">
    <div class="container py-2 px-3">
        <p class="text-white font-semibold"><?php _e('Projekt: ', 'davincitheme') ?><?php echo strip_tags( get_the_title() ) ?></p>
    </div>
</div>
<?php endif; ?>

<?php if(is_singular('immobilie')): ?>
<?php
	$projekt_id = get_field( 'oii_vt_Gruppe_oii_vt_GruppenKennung' );
	$projekt = get_posts( [
		'post_type'  => 'project',
		'meta_query' => [
			'relation' => 'AND',
			[
				'key'     => 'gruppen_id',
				'value'   => $projekt_id,
				'compare' => '=',
			],
		],
	] );
    ?>
    <div class="bg-golden">
        <div class="container py-2 px-3">
            <a href="<?php echo get_the_permalink( $projekt[0]->ID ) ?>" class="flex items-center text-white no-underline whitespace-no-wrap">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"></path>
                </svg>
                <div class="hidden lg:block">
                    <span class="underline">Projekt: <?php echo strip_tags( get_the_title( $projekt[0]->ID ) ) ?></span>
                </div>
            </a>
        </div>
    </div>
<?php endif; ?>

<?php get_template_part( 'headers', 'mobilemenu' ) ?>


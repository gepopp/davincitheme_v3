<?php
$is_sticky = false;
extract( $args )

?>

<?php if ( ! $is_sticky ): ?>
<div class="fixed top w-full" style="z-index: 9999"
     x-data="{ show : false }"
     x-cloak
     x-show="show"
     @scroll.window="(e) => {
            const rect = document.querySelector('#banderole').getBoundingClientRect();
            show = rect.bottom <= 0;
     }"
     x-init="">
	<?php else: ?>
    <div class="fixed top w-full" style="z-index: 9999">
		<?php endif; ?>
        <section class="bg-lightblue shadow-lg" v-show="show">
            <div class="container mx-auto flex justify-between content-center px-3 py-5">
                <a href="<?php echo home_url() ?>">
					<?php get_template_part( 'svg', 'logo-horizontal' ) ?>
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
					<?php if ( get_field( 'field_5f501e9309b83', 'options' ) == 'button' ): ?>
                        <a class="bg-golden text-white px-8 py-2 hidden lg:inline-block  <?php global $wp;
						if ( home_url( $wp->request ) == rtrim( get_field( 'field_5f2085fc2cdc8', 'option' ), '/' ) ): echo 'underline font-semibold'; endif; ?>    " href="<?php the_field( 'field_5f2085fc2cdc8', 'option' ) ?>">
							<?php the_field( 'field_5f208633cc294', 'option' ) ?>
                        </a>
					<?php else: ?>
                        <div class="hidden lg:inline-block text-golden">
                            <a href="mailto:<?php the_field( 'field_5f501ef709b85', 'options' ) ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail inline">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                            </a>
                            <div class="mx-2 inline-block">|</div>
                            <a href="tel:<?php the_field( 'field_5f501ee109b84', 'options' ) ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone-call inline">
                                    <path d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                </svg>
                            </a>
                        </div>
					<?php endif; ?>
					<?php get_template_part( 'headers', 'hamburger' ) ?>
                </div>
            </div>
			<?php get_template_part( 'headers', 'mobilemenu' ) ?>
        </section>
    </div>

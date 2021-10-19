<div id="banderole" class="z-50 py-5 mb-10 border-b-2 border-golden shadow-xl"
     style="
             background-image: url(<?php echo get_field('field_5f207d5615988', 'option') ?>);
             background-size: auto 100%"
>
    <div class="bg-lightblue shadow-lg py-3 lg:py-0">
        <div class="container mx-auto flex justify-between content-center px-3  <?php echo is_singular( 'project' ) ? 'py-5' : ''  ?>">
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
			    <?php get_template_part('headers', 'contactbuttons') ?>
			    <?php get_template_part('headers', 'hamburger') ?>
            </div>
        </div>
    </div>
    <?php get_template_part('headers', 'mobilemenu') ?>
</div>

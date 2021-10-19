<div class="py-5 hidden lg:block"></div>
<div id="banderole" class="bg-lightblue shadow-lg z-50 mb-10">
    <div class="container mx-auto flex justify-between content-center px-3  <?php echo is_singular( 'project' ) ? 'py-5' : ''  ?>">
        <a href="<?php echo home_url() ?>">
            <?php if ( ! is_singular( 'project' ) ): ?>
                <img src="<?php the_field( 'field_5f207d4c15987', 'option' ) ?>" width="150" height="150" class="logo hidden lg:block">
                <img src="<?php the_field( 'field_5f20aa5bbc4e0', 'option' ) ?>" width="150" height="150" class="logo lg:hidden">
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
    <?php get_template_part('headers', 'mobilemenu') ?>
</div>

<?php
get_header();
\Tonik\Theme\App\template('partials/header/header');
?>



<section class="container mx-auto px-3 xl:px-0 py-10" style="
    background-image: url( <?php the_field('field_5f213eff8495d', 'option') ?>);
    background-size: 100% auto;
    background-repeat: no-repeat;
    background-position: bottom left;
    padding-bottom: <?php the_field('field_5f2141a728d7c', 'option' ) ?>px">
    <div class="wrapper">
        <div class="content">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post() ?>
                    <?php the_content(); ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>

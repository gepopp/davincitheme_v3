<?php get_header(); ?>
<?php \Tonik\Theme\App\template('partials/header/header'); ?>
<?php \Tonik\Theme\App\template('helper/open-body'); ?>


    <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-4 mt-12 p-3" style="min-height: 80vh">
        <div class="mb-5">
            <?php \Tonik\Theme\App\template('helper/headings', ['title' => get_field('field_5f292e35d10a2', 'option'), 'subtitle' => get_field('field_5f292e3ed10a3', 'option')]); ?>
        </div>
        <div class="col-span-1 lg:col-span-2">
            <?php echo  do_shortcode( get_field('field_5f292e4ad10a4', 'option') ) ?>
        </div>
    </div>


<?php \Tonik\Theme\App\template('helper/close-body'); ?>

<?php get_footer();

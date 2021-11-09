<div id="canvas" class="wrapper">
    <project-canvas>
        <?php get_template_part('canvases', 'appartments') ?>
        <?php get_template_part( 'canvases','content' ); ?>
        <?php get_template_part( 'canvases','tour' ); ?>
<!--        --><?php //\Tonik\Theme\App\template( 'project/canvases/pano' ); ?>
        <?php get_template_part( 'canvases','building' ); ?>
        <?php get_template_part( 'canvases','ausstattung' ); ?>
        <?php get_template_part( 'canvases','downloads' ); ?>
        <?php get_template_part( 'canvases','map' ); ?>
    </project-canvas>
</div>

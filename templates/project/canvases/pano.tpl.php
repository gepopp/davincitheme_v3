<?php $panos = get_field('field_5f4f6e8c3d811') ?>
<?php if (!empty($panos)): ?>
    <project-canvas-content id="<?php _e('360° Panoramas', 'davincigroup' ) ?>">
        <div class="container mx-auto">
            <div class="grid grid-cols-4 gap-4">
                <div class="col-span-4 lg:col-span-3">
                    <div style="min-height: 800px">
                        <pano-switcher :panos="<?php echo htmlentities(json_encode($panos)) ?>"
                                       loadimage="<?php the_field('field_5f4fe9591f733', 'options') ?>"></pano-switcher>
                    </div>
                </div>
                <?php \Tonik\Theme\App\template('project/sidebar'); ?>
            </div>
    </project-canvas-content>
<?php endif;

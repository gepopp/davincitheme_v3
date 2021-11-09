<?php if (!empty(get_field('field_5f22e62fee8ac'))): ?>
    <project-canvas-content id="<?php _e('360° Rundgang', 'davincigroup') ?>">
        <div class="container mx-auto p-5">
            <div class="grid grid-cols-4 gap-4">
                <div class="col-span-4 lg:col-span-3">
                    <iframe src="<?php the_field('field_5f22e62fee8ac'); ?>" width="100%" height="800"></iframe>
                </div>
                <?php \Tonik\Theme\App\template('project/sidebar'); ?>
            </div>
        </div>
    </project-canvas-content>
<?php endif;

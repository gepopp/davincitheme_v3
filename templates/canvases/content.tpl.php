<project-canvas-content id="<?php _e('Beschreibung', 'davincigroup' ) ?>">
    <div class="container mx-auto p-5">
        <div class="grid grid-cols-4 gap-4">
            <div class="col-span-4 lg:col-span-3">
                <div class="project-content">
                    <?php the_content(); ?>
                </div>
            </div>
            <?php \Tonik\Theme\App\template('project/sidebar');  ?>
        </div>
    </div>
</project-canvas-content>


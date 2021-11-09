<?php
$building = get_field('field_5f22e219caec9');
if (!empty($building)):
    ?>
    <project-canvas-content id="<?php _e('Gebäude', 'davincigroup' ) ?>">
        <div class="container mx-auto p-5">
            <div class="grid grid-cols-4 gap-5">
                <div class="col-span-4 lg:col-span-3">
                    <div>
                        <?php echo $building ?>
                    </div>
                </div>
                <?php \Tonik\Theme\App\template('project/sidebar');  ?>
            </div>
        </div>
    </project-canvas-content>
<?php endif; ?>

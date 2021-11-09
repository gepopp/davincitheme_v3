<?php
$building = get_field('field_5f22e219caec9');
if (!empty($building)):
    ?>
    <project-canvas-content id="<?php _e('Gebäude', 'davincigroup' ) ?>">
        <div class="container mx-auto p-5">
            <div class="grid grid-cols-4 gap-5">
                <div class="hidden md:block px-5 border-r border-golden">
                    <h2 class="text-2xl text-golden mb-3">Kontakt</h2>
                    <contact-form></contact-form>
                </div>
                <div class="col-span-4 lg:col-span-3">
                    <div>
                        <?php echo $building ?>
                    </div>
                </div>
            </div>
        </div>
    </project-canvas-content>
<?php endif; ?>

<?php if (!empty(get_field('field_5f22e2d2ee8aa'))): ?>
    <project-canvas-content id="<?php _e('Ausstattung', 'davincigroup' ) ?>">
        <div class="container mx-auto p-5">
            <div class="grid grid-cols-4 gap-5">
                <div class="col-span-4 lg:col-span-3">
                    <?php foreach (get_field('field_5f22e2d2ee8aa') as $item): ?>
                        <div class="grid grid-cols-3 gap-5 flex flex-col">
                            <div class="col-span-3 md:col-span-1 mb-10">
                                <h2 class="text-primary font-medium text-3xl"><?php echo $item['titel'] ?></h2>
                            </div>
                            <div class="col-span-3 md:col-span-2 mb-10">
                                <p><?php echo $item['beschreibung'] ?></p>
                                <?php if (!empty($item['link'])): ?>
                                    <a href="<?php echo $item['link']['url'] ?>"
                                       class="bg-golden text-white w-full py-3 hover:font-semibold hover:shadow-none shadow-lg block text-center mt-5">
                                        <?php echo $item['link']['title'] ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php \Tonik\Theme\App\template('project/sidebar');  ?>
            </div>
        </div>
    </project-canvas-content>
<?php endif; ?>

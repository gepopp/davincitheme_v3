<?php $downloads = get_field('field_5f22da4592c42'); ?>
<?php if (count($downloads) > 0): ?>
    <project-canvas-content id="<?php _e('Downloads', 'davincigroup' ) ?>">
        <div class="container mx-auto p-5">
            <div class="grid grid-cols-4 gap-5">
                <div class="hidden md:block px-5 border-r border-golden">
                    <h2 class="text-2xl text-golden mb-3">Kontakt</h2>
                    <contact-form></contact-form>
                </div>
                <div class="col-span-4 lg:col-span-3">
                    <h3 class="text-2xl text-golden font-medium mb-5">
                        <?php echo count($downloads) ?> <?php if (count($downloads) > 1): _e('Downloads', 'davincigroup'); else:  _e('Download', 'davincigroup'); endif; ?>
                    </h3>
                    <ul class="w-full">
                        <?php foreach ($downloads as $download): ?>
                            <li class="border-b border-golden p-5 w-full">
                                <a href="<?php echo $download['url'] ?>" class="flex justify-between flex-1">
                                    <div class="flex">
                                        <svg class="w-6 h-6 mr-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                        </svg>
                                        <span><?php echo $download['title'] ?></span>
                                    </div>
                                    <span>Download</span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </project-canvas-content>
<?php endif; ?>

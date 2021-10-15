<?php $rundgang = get_field('field_60bdd0c93fd7a'); ?>
<div class="container mx-auto p-5">
    <div class="relative w-full h-halfscreen lg:h-auto lg:pt-5625">
        <?php if(empty($rundgang)): ?>
        <div class="absolute top-0 left-0 w-full h-full bg-darkblue flex justify-center items-center">
            <div class="flex flex-col text-center">
                <p class="text-golden"><?php _e( 'Noch haben wir keinen Rundgang zu diesem Top.', 'davincigroup' ) ?></p>
                <p class="text-golden"><?php _e( 'Vereinbaren Sie eine Besichtigung.', 'davincigroup' ) ?></p>
                <a href="/kontakt" class="bg-golden text-white p-2 mt-3">Kontakt</a>
            </div>
        </div>
        <?php else: ?>
            <div class="absolute top-0 left-0 w-full h-full border-2 border-darkblue flex justify-center items-center">
                <iframe src="<?php echo $rundgang ?>" frameborder="0" width="100%" height="100%"></iframe>
            </div>
        <?php endif; ?>
    </div>
</div>

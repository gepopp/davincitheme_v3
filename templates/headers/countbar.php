<?php if(get_field('field_61a4f3a28f609', 'option')): ?>

<div class="bg-golden" id="app">
    <div class="container mx-auto text-white">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5" style="min-height: 0 !important;">
            <div class="flex flex-col justify-center items-center p-10">
                <countup :end-val="<?php the_field('field_61a4f3bb8f60b', 'option'); ?>" :delay="1000"></countup>
                <p class="text-lg font-semibold"><?php the_field('field_61a4f3e18f60c', 'option'); ?></p>
                <a href="<?php the_field('field_61a4f3ec8f60d', 'option'); ?>" class="block bg-darkblue text-white text-center shadow-lg px-5 py-3 mt-3">
	                <?php the_field('field_61a4f3fb8f60e', 'option'); ?>
                </a>
            </div>
            <div class="flex flex-col justify-center items-center p-10">
                <countup :end-val="<?php the_field('field_61a4f4158f610', 'option'); ?>" :delay="2000"></countup>
                <p class="text-lg font-semibold"><?php the_field('field_61a4f4348f611', 'option'); ?></p>
                <a href="<?php the_field('field_61a4f43f8f612', 'option'); ?>" class="block bg-darkblue text-white text-center shadow-lg px-5 py-3 mt-3">
	                <?php the_field('field_61a4f44a8f613', 'option'); ?>
                </a>
            </div>
            <div class="flex flex-col justify-center items-center p-10">
                <countup :end-val="<?php the_field('field_61a4f4628f615', 'option'); ?>" :delay="3000"></countup>
                <p class="text-lg font-semibold"><?php the_field('field_61a4f4738f616', 'option'); ?></p>
                <a href="<?php the_field('field_61a4f4818f617', 'option'); ?>" class="block bg-darkblue text-white text-center shadow-lg px-5 py-3 mt-3">
	                <?php the_field('field_61a4f48c8f618', 'option'); ?>
                </a>
            </div>

        </div>
    </div>
</div>
<?php endif;
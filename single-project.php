<?php

the_post();
get_header( null, [ 'is_sticky' => true ] ); ?>


<section class="container mx-auto px-5" style="
        background-image: url( <?php the_field( 'field_5f213eff8495d', 'option' ) ?>);
        background-size: 100% auto;
        background-repeat: no-repeat;
        background-position: bottom left;
        padding-bottom: <?php the_field( 'field_5f2141a728d7c', 'option' ) ?>px">

    <div class="grid grid-cols-1 lg:grid-cols-4 lg:gap-10 pt-40">
        <div class="mb-10 ">
            <div>
                <h3 class="text-base font-bold mb-0 leading-none text-white">
					<?php the_field( 'field_5f216411f6f5a' ) ?></h3>
                <h1 class="text-3xl text-golden leading-none mb-8 break-words"><?php the_title() ?></h1>
            </div>
            <div class="col-span-2 text-white bg-lightblue p-3" x-data="{ open : false }">
                <div :class="!open ? 'line-clamp-5 lg:line-clamp-none' : ''" x-transition>
					<?php the_field( 'field_5f21641ef6f5b', null, false ) ?>
                </div>
                <div class="flex justify-end mt-5 lg:hidden">
                    <p @click="open = !open" x-transition x-text="open ? 'weniger' : 'mehr'" class="cursor-pointer underline"></p>
                </div>
            </div>
        </div>
        <div class="bg-white col-span-3 p-5" x-data="{ current : '' }" @tab.window="tab => current = tab.detail">
            <div x-show="current == 'Apartments'" x-cloak class="overflow-x-scroll">
				<?php get_template_part( 'project', 'appartments' ) ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer() ?>
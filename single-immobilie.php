<?php

use function Tonik\Theme\App\template;

get_header('sticky');

the_post();
?>
<div class="mt-24"></div>
<section class="container mx-auto px-3 xl:px-0 py-10" style="
    background-image: url( <?php the_field( 'field_5f213eff8495d', 'option' ) ?>);
    background-size: 100% auto;
    background-repeat: no-repeat;
    background-position: bottom left;
    padding-bottom: <?php the_field( 'field_5f2141a728d7c', 'option' ) ?>px;
    min-height: 800px">
    <single-canvas>

        <template v-slot:eckdaten>
            <?php template('single-immobilie/eckdaten'); ?>
        </template>

        <template v-slot:rundgang>
            <?php template('single-immobilie/rundgang'); ?>
        </template>

        <template v-slot:plan>
            <?php template('single-immobilie/grundriss'); ?>
        </template>

        <template v-slot:ausstattung>
            <?php template('single-immobilie/description'); ?>

        </template>

    </single-canvas>
</section>


<?php get_footer() ?>

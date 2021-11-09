<?php
/**
 * Template Name: Archive Projekte
 */

get_header();
get_template_part('headers', 'banderole');

$types = get_terms([
    'taxonomy' => 'project_type',
]);
$locations = get_terms([
    'taxonomy' => 'project_location',
]);
?>
    <div class="mt-10"></div>
<?php

if (get_field('field_5f4ff2cd45951')): ?>
    <div class="container mx-auto mb-10 lg:px-0 px-3">
        <h3 class="text-golden text-xl font-semibold pb-1 mb-2 border-b-2 border-golden inline-block"><?php echo __('Objekte Filtern', 'davincigroup') ?></h3>
        <div class="flex text-golden flex-wrap" x-data="projectFilterbar('<?php echo get_permalink() ?>', [<?php echo $_GET['type'] ?? ''?>], <?php echo $_GET['location'] ?? 0?>)">
            <?php foreach ( $types as $type ): ?>
                <div class="border border-golden p-2 mr-3 cursor-pointer mb-3"
                     :class="{ 'text-white bg-golden' : types.indexOf(<?php echo $type->term_id ?>) !== -1 }"
                     @click="toggleType(<?php echo $type->term_id ?>)"><?php echo $type->name ?></div>
            <?php endforeach; ?>
            <select class="text-golden p-2 bg-darkblue border border-golden mr-3 mb-3" x-model="locations">
                <option selected="true" value="0">...</option>
                <?php foreach ( $locations as $location ): ?>
                    <option value="<?php echo $location->term_id ?>"><?php echo $location->name ?></option>
                <?php endforeach; ?>
            </select>
            <div class="border border-golden bg-golden text-white p-2 px-5 hover:underline cursor-pointer mb-3 flex-1 lg:flex-none text-center" @click="filter()">
                <?php _e('Filtern', 'davincigroup') ?>
            </div>
            <div class="hover:underline cursor-pointer p-2 px-5" @click="reset()" x-show="types.length != 0 || locations != 0">
                <?php _e('zurücksetzen', 'davincigroup') ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php (new \davinci\codebase\IndexWalker())->walk(); ?>
<?php
get_footer();

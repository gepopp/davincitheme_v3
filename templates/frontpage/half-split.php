<?php
/**
 * @var $hidden
 * @var $bg
 */
$hidden = '';
$bg = '';
extract($args);
?>

<div class="col-span-2 py-5 lg:py-0 min-grid <?php echo $hidden ?>">

    <?php if (has_tag('horizontal')): ?>

        <div class="flex flex-col h-full shadow-lg">

            <div class="col-span-4 lg:hidden">
                <?php the_post_thumbnail('custom-thumbnail') ?>
            </div>

            <div class="hidden lg:block" style="background-image: url( <?php echo the_post_thumbnail_url('custom-thumbnail') ?> ); background-size: cover; min-height: 258px"></div>

            <div class="h-full flex flex-col justify-end p-5 <?php echo $bg ?>" style="min-height: 258px">

                <?php if (get_field('field_60bc7d0a1e837')): ?>
                    <p class="bg-golden text-white uppercase px-3 flex justify-center w-full">
                        <span><?php echo get_field('field_60bc94a0bef6f') ?></span>
                    </p>
                <?php endif; ?>


                <a href="<?php if (get_field('field_63f70dec119ca')):
                    the_field('field_63f70dec119ca');
                else:
                    the_permalink();
                endif; ?>" class="mb-3">
                    <h2 class="text-golden text-3xl leading-normal"><?php the_title() ?></h2>
                    <h3 class="text-white text-lg font-medium -mb-6"><?php echo get_field('field_5f216411f6f5a') != '' ? get_field('field_5f216411f6f5a') : 'Da Vinci Group' ?></h3>
                </a>

                <?php $term = wp_get_post_terms(get_the_ID(), 'project_location');
                if ($term): $divider_tag = $term[0]->name;
                else: $divider_tag = null; endif; ?>
                <?php get_template_part('helper', 'divider', [ 'bg' => $bg, 'divider_tag' => $divider_tag ]); ?>

                <p class="text-white truncate">
                    <?php echo get_the_excerpt(); ?>
                </p>
                <?php get_template_part('helper', 'grid-button'); ?>

            </div>
        </div>

    <?php else: ?>
        <div class="grid grid-cols-4 lg:grid-cols-2 gap-0 shadow-lg min-grid">
            <div class="hidden lg:block" style="background-image: url( <?php echo the_post_thumbnail_url('custom-thumbnail-portrait') ?> ); background-size: cover">
            </div>
            <div class="col-span-4 lg:hidden">
                <?php the_post_thumbnail('custom-thumbnail') ?>
            </div>
            <div class="col-span-4 lg:col-span-1 h-full flex flex-col justify-end <?php echo $bg ?> p-5">

                <?php if (get_field('field_60bc7d0a1e837')): ?>
                    <p class="bg-golden text-white uppercase px-3 flex justify-center w-full">
                        <span><?php echo get_field('field_60bc94a0bef6f') ?></span>
                    </p>
                <?php endif; ?>

                <a href="<?php if (get_field('field_63f70dec119ca')):
                    the_field('field_63f70dec119ca');
                else:
                    the_permalink();
                endif; ?>" class="mb-3">
                    <h2 class="text-golden text-3xl leading-normal"><?php the_title() ?></h2>
                    <h3 class="text-white text-lg font-medium"><?php echo get_field('field_5f216411f6f5a') != '' ? get_field('field_5f216411f6f5a') : 'Da Vinci Group' ?></h3>
                </a>
                <?php $term = wp_get_post_terms(get_the_ID(), 'project_location');
                if ($term): $divider_tag = $term[0]->name;
                else: $divider_tag = null; endif; ?>
                <?php get_template_part('helper', 'divider', [ 'bg' => $bg, 'divider_tag' => $divider_tag ]); ?>

                <div class="text-white"><?php the_excerpt(); ?></div>
                <div class="mt-auto">
                    <?php get_template_part('helper', 'project-meta'); ?>
                    <?php get_template_part('helper', 'grid-button'); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>


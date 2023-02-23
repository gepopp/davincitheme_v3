<?php
/**
 * @var $hidden
 * @var $bg
 */
$hidden = 'bg-darkblue';
$bg = '';
extract($args);
?>

<?php if (has_post_thumbnail()): ?>

    <div class="flex flex-col col-span-2 lg:col-span-1  shadow-lg <?php echo $hidden . ' ' . $bg ?> my-5 lg:my-0">
        <?php if (get_post_type() == 'project'): ?>
        <a href="<?php if (get_field('field_63f70dec119ca')):
            the_field('field_63f70dec119ca');
        else:
            the_permalink();
        endif; ?>" class="w-full h-full">
            <?php else: ?>
            <a href="<?php echo get_field('field_5f23c86fc9b98')['url'] ?? '' ?>" class="w-full h-full relative">
                <?php endif; ?>
                <?php the_post_thumbnail('quarter-box', [
                    'style' => 'min-height: 50%',
                    'class' => 'hidden lg:block w-full h-auto',
                ]); ?>
                <?php the_post_thumbnail('custom-thumbnail', [ 'class' => 'lg:hidden' ]); ?>
            </a>
            <div class="<?php echo $bg ?> w-full flex flex-col flex-grow p-5 relative">

                <?php if (get_field('field_60bc7d0a1e837')): ?>
                    <p class="bg-golden text-white uppercase px-3 flex justify-center absolute top-0 -mt-3 left-0 w-full">
                        <span><?php echo get_field('field_60bc94a0bef6f') ?></span>
                    </p>
                <?php endif; ?>


                <a href="<?php the_permalink(); ?>">
                    <h2 class="text-golden text-xl leading-normal truncate"><?php the_title() ?></h2>
                    <h3 class="text-white text-lg font-medium -mb-4 truncate"><?php echo get_field('field_5f216411f6f5a') != '' ? get_field('field_5f216411f6f5a') : 'Da Vinci Group' ?></h3>
                </a>
                <?php $term = wp_get_post_terms(get_the_ID(), 'project_location');
                if ($term): $divider_tag = $term[0]->name;
                else: $divider_tag = null; endif; ?>
                <?php get_template_part('helper', 'divider', [ 'bg' => $bg, 'divider_tag' => $divider_tag ]); ?>
                <div class="mt-auto">
                    <?php get_template_part('helper', 'project-meta'); ?>
                    <?php get_template_part('helper', 'grid-button'); ?>
                </div>
            </div>
    </div>

<?php else: ?>

    <div class="<?php echo $bg ?> w-full h-full p-5 flex flex-col col-span-2 lg:col-span-1  shadow-lg <?php echo $hidden ?> my-5 lg:my-0">
        <?php if (get_field('field_60bc7d0a1e837')): ?>
            <p class="bg-golden text-white uppercase px-3 flex justify-center w-full">
                <span><?php echo get_field('field_60bc94a0bef6f') ?></span>
            </p>
        <?php endif; ?>
        <a href="<?php  if (get_field('field_63f70dec119ca')):
            the_field('field_63f70dec119ca');
        else:
            the_permalink();
        endif; ?>">
            <h2 class="text-golden text-xl leading-normal"><?php the_title() ?></h2>
            <h3 class="text-white text-lg font-medium mb-3"><?php echo get_field('field_5f216411f6f5a') != '' ? get_field('field_5f216411f6f5a') : 'Da Vinci Group' ?></h3>
        </a>
        <?php get_template_part('helper', 'divider'); ?>
        <p class="text-white"><?php echo get_the_excerpt(); ?></p>
        <div class="mt-auto">
            <?php get_template_part('helper', 'grid-button'); ?>
        </div>
    </div>


<?php endif; ?>

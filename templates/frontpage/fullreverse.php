<?php
/**
 * @var $hidden
 * @var $bg
 */
$hidden = '';
$bg = '';
extract($args);
?>
<div class="col-span-4 lg:hidden <?php echo $hidden ?>">
    <?php if (get_post_type() == 'project'): ?>
        <a href="<?php if (get_field('field_63f70dec119ca')):
            the_field('field_63f70dec119ca');
        else:
            the_permalink();
        endif; ?>">
            <?php the_post_thumbnail('custom-thumbnail') ?>
        </a>
    <?php else: ?>
        <?php the_post_thumbnail('custom-thumbnail') ?>
    <?php endif; ?>
</div>

<div class="bg-op p-5 lg:p-10 flex flex-col col-span-4 lg:col-span-2 shadow-lg <?php echo $hidden . ' ' . $bg ?>">
    <a href="<?php the_permalink(); ?>">
        <?php get_template_part('helper', 'hreadings', [ 'title' => get_the_title(), 'subtitle' => get_field('field_5f216411f6f5a') != '' ? get_field('field_5f216411f6f5a') : 'Da Vinci Group' ]); ?>
    </a>

    <?php $term = wp_get_post_terms(get_the_ID(), 'project_location');
    if ($term): $divider_tag = $term[0]->name;
    else: $divider_tag = null; endif; ?>
    <?php get_template_part('helper', 'divider', [ 'bg' => $bg, 'divider_tag' => $divider_tag ]); ?>

    <div class="text-white">
        <?php the_excerpt(); ?>
    </div>
    <div class="mt-auto">
        <?php get_template_part('helper', 'project-meta'); ?>
        <?php get_template_part('helper', 'grid-button'); ?>
    </div>
</div>
<div class="col-span-4 lg:col-span-2 shadow-lg hidden lg:block <?php echo $hidden ?>"
     style="background-image: url( <?php echo get_the_post_thumbnail_url(get_the_ID(), 'custom-thumbnail') ?>);
             background-size: cover;
             background-position: center"
>
    <?php if (get_post_type() == 'project'): ?>
        <a href="<?php if (get_field('field_63f70dec119ca')):
            the_field('field_63f70dec119ca');
        else:
            the_permalink();
        endif; ?>" class="w-full h-full">&nbsp;</a>
    <?php endif; ?>
</div>

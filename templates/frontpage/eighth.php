<?php
/**
 * @var $hidden
 * @var $bg
 */
$hidden = '';
$bg = 'bg-darkblue';
extract($args);

if ( has_post_thumbnail() ): ?>
    <div class="eighth relative shadow-lg <?php echo $bg ?> my-5 lg:my-0 <?php echo $hidden ?>"
         style="background-image: url(<?php echo get_the_post_thumbnail_url( get_the_ID(), 'custom-thumbnail' ) ?>);
             background-size: cover">
        <a href="<?php if ( get_post_type() == 'project' ): the_permalink(); else: echo get_field( 'field_5f23c86fc9b98' )['url']; endif; ?>">
            <div class="absolute w-full h-full flex flex-col justify-end" style="top: 0; left: 0">

                <?php if ( get_field( 'field_60bc7d0a1e837' ) ): ?>
                    <p class="bg-golden text-white uppercase px-3 flex justify-center">
                        <span><?php echo get_field('field_60bc94a0bef6f') ?></span>
                    </p>
                <?php endif; ?>


                <div class="bg-opacity-75 p-5 <?php echo $bg ?>">
                    <h2 class="text-golden text-xl leading-normal truncate"><?php the_title() ?></h2>
                </div>
            </div>
        </a>
    </div>


<?php else: ?>

    <div class="eighth relative shadow-lg p-5 flex flex-col my-5 lg:my-0 <?php echo $hidden . ' ' . $bg ?> ">

        <?php if ( get_field( 'field_60bc7d0a1e837' ) ): ?>
            <p class="bg-golden text-white uppercase px-3 flex justify-center">
                <span><?php echo get_field('field_60bc94a0bef6f') ?></span>
            </p>
        <?php endif; ?>

        <a href="<?php the_permalink(); ?>">
            <h2 class="text-golden text-2xl leading-normal"><?php the_title() ?></h2>
        </a>
        <?php get_template_part( 'helper', 'grid-button' ); ?>
    </div>

<?php endif; ?>

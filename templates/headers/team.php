<?php
/**
 * @var $tags
 */
extract( $args );

$slugs = array_column( $tags, 'slug' );
?>

    <div class="mt-10"></div>
    <div class="main-header">
        <div class="container mx-auto px-3 mb-10">
            <div class="grid lg:grid-cols-3 gap-4">
                <div>
                    <h3 class="text-base font-bold mb-0 leading-none text-darkblue lg:text-white"><?php the_field( 'field_5f25cdcd1347d', 'option' ) ?></h3>
                    <h1 class="text-5xl text-golden leading-none"><?php the_field( 'field_5f25cdc71347c', 'option' ) ?></h1>
                </div>
                <div class="col-span-2">
                    <p class="text-white mb-10"><?php the_field( 'field_5f25cdd41347e', 'option' ) ?></p>
                    <img src="<?php echo get_field( 'field_5f25cf9841c46', 'option' )['sizes']['custom-thumbnail'] ?>" class="w-full shadow-lg">
                </div>
            </div>
        </div>
    </div>
<?php get_template_part( 'headers', 'close' );
<?php

$gallery = get_field('field_5f21b237e2f60');

$group = get_field( 'field_5f5c7c78415e9' );
$tops  = new WP_Query( [
    'post_type'      => 'immobilie',
    'post_status'    => 'publish',
    'posts_per_page' => - 1,
    'meta_query'     => [
        'relation' => 'AND',
        [
            'key'     => 'oii_vt_gruppe_oii_vt_gruppenkennung',
            'value'   => $group,
            'compare' => '=',
        ],
        [
            'key'     => 'oii_vt_gruppe_oii_vt_gruppenkennung',
            'compare' => 'EXISTS',
        ],
    ],
] );
$active = true;

if ( ! empty( get_field( 'field_5f22dde18baf4' ) ) || ( $tops->post_count != 0 ) && ! empty( $group ) ){
$active = false;
}

?>

<?php if(!empty($gallery) || has_post_thumbnail()): ?>
<project-canvas-content id="<?php _e('Bilder', 'davincigroup' ) ?>" <?php echo $active ? 'active-start="true"' : '' ?>>
    <div class="container mx-auto p-5">
        <div class="grid grid-cols-4 gap-4">
            <div class="col-span-4 lg:col-span-3">
                <?php
                if (!empty($gallery)):
                    $urls = [];
                    foreach ($gallery as $img) {

                        $urls[] = [
                            'url'    => $img['sizes']['custom-thumbnail'],
                            'is_360' => get_field('field_5f4e73ada2722', $img['ID']),
                        ];
                    }
                    ?>
                    <div class="text-white z-40">
                        <image-carousel :images="<?php echo htmlspecialchars(json_encode($urls, ENT_QUOTES)) ?>"></image-carousel>
                    </div>
                <?php else: ?>
                        <div class="text-white" style="min-height: 640px">
                            <?php the_post_thumbnail('custom-thumbnail', ['class' => 'w-full']); ?>
                        </div>
                <?php endif; ?>
            </div>
            <?php \Tonik\Theme\App\template('project/sidebar');  ?>
        </div>
    </div>
</project-canvas-content>
<?php endif ;


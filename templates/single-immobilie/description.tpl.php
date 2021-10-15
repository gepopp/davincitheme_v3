<?php
$description = get_field( 'oii_at_Beschreibung' );

if ( empty( $description ) ) {

    $projekt_id = get_field( 'oii_vt_Gruppe_oii_vt_GruppenKennung' );
    $projekt    = get_posts( [
        'post_type'  => 'project',
        'meta_query' => [
            'relation' => 'AND',
            [
                'key'     => 'gruppen_id',
                'value'   => $projekt_id,
                'compare' => '=',
            ],
        ],
    ] );

    $description = get_field( 'field_5f22e2d2ee8aa', $projekt[0]->ID );
}
?>

<div class="container mx-auto p-5">
    <div class="grid grid-cols-1 xl:grid-cols-5 gap-10">
        <div class="col-span-3">
            <?php if ( empty( $description ) ): ?>
                <div class="relative w-full" style="padding-top: 75%">
                    <div class="absolute top-0 left-0 w-full h-full bg-darkblue flex justify-center items-center">
                        <div class="flex flex-col text-center">
                            <p class="text-golden"><?php _e( 'Noch haben wir keine Beschreibung zur Ausstattung dieses Tops.', 'davincigroup' ) ?></p>
                            <p class="text-golden"><?php _e( 'Vereinbaren Sie eine Besichtigung.', 'davincigroup' ) ?></p>
                            <a href="/kontakt" class="bg-golden text-white p-2 mt-3">Kontakt</a>
                        </div>
                    </div>
                </div>
            <?php elseif ( is_array( $description ) ): ?>
                <?php foreach ( $description as $item ): ?>
                    <div class="grid grid-cols-3 gap-5 flex flex-col">
                        <div class="col-span-3 md:col-span-1 mb-10">
                            <h2 class="text-primary font-medium text-3xl"><?php echo $item['titel'] ?></h2>
                        </div>
                        <div class="col-span-3 md:col-span-2 mb-10">
                            <p><?php echo $item['beschreibung'] ?></p>
                            <?php if ( ! empty( $item['link'] ) ): ?>
                                <a href="<?php echo $item['link']['url'] ?>"
                                   class="bg-golden text-white w-full py-3 hover:font-semibold hover:shadow-none shadow-lg block text-center mt-5">
                                    <?php echo $item['link']['title'] ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <?php echo $description ?>
            <?php endif; ?>

        </div>
        <div class="col-span-2">
            <?php \Tonik\Theme\App\template( 'project/sidebar' ); ?>
        </div>
    </div>
</div>

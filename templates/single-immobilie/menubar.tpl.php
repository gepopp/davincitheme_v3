<?php

the_post();

$projekt_id = get_field( 'oii_vt_Gruppe_oii_vt_GruppenKennung' );

$projekt = get_posts( [
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
?>


<div class="w-full py-3 bg-golden text-white shadow-lg">
    <div class="container mx-auto px-3 flex">

        <a href="<?php echo get_the_permalink( $projekt[0]->ID ) ?>" class="flex items-center">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"></path>
            </svg>
            <div class="hidden lg:block">
                <span class="underline"><?php echo get_the_title( $projekt[0]->ID ) ?></span>
                &nbsp;|&nbsp;
            </div>
        </a>
        <div class="font-medium">
            <?php _e( 'Top', 'davincigroup' ) ?>&nbsp;
            <?php the_field( 'oii_wohnungsnummer' ); ?>&nbsp;
            <?php the_field( 'oii_etage' ); ?>
        </div>

        <single-canvas-menu :mobile="false"></single-canvas-menu>
        <div class="lg:hidden ml-auto">
            <hamburger id="immobilie_single" color="white"></hamburger>
        </div>
    </div>
    <single-mobile-menu id="immobilie_single">
        <div class="absolute w-full bg-golden">
            <single-canvas-menu :mobile="true"></single-canvas-menu>
        </div>
    </single-mobile-menu>
</div>

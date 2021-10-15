<?php

\Tonik\Theme\App\template( 'helper/header-start' ); ?>
<div class="grid lg:grid-cols-3 gap-4 mb-5">
    <div>
        <h3 class="text-base font-bold mb-0 leading-none text-white">
            <?php the_field( 'field_5f216411f6f5a' ) ?></h3>
        <h1 class="text-3xl md:text-5xl text-golden leading-none mb-8"><?php the_title() ?></h1>
    </div>
    <div class="col-span-2 text-white">
        <?php the_field( 'field_5f21641ef6f5b' ) ?>
    </div>
</div>
<div class="md:w-1/2 md:w-1/3 hidden"></div>

<tabs :downloads="<?php echo htmlentities( json_encode( get_field( 'field_5f22da4592c42' ) ) ) ?>">
    <?php
    $gallery = get_field( 'field_5f21b237e2f60' );
    if ( ! empty( $gallery ) ):

        $urls = [];
        foreach ( $gallery as $img ) {

            $urls[] = [
                'url'    => $img['sizes']['custom-thumbnail'],
                'is_360' => get_field( 'field_5f4e73ada2722', $img['ID'] ),
            ];
        }
        ?>
        <tab title="<?php _e( 'Bilder', 'davincigroup' ) ?>" icon="icon-13">
            <div class="text-white" style="min-height: 640px">
                <image-carousel :images="<?php echo htmlspecialchars( json_encode( $urls, ENT_QUOTES ) ) ?>"></image-carousel>
            </div>
        </tab>
    <?php else: ?>
        <tab title="<?php _e( 'Bilder', 'davincigroup' ) ?>" icon="icon-13">
            <div class="text-white" style="min-height: 640px">
                <?php the_post_thumbnail( 'custom-thumbnail', [ 'class' => 'w-full' ] ); ?>
            </div>
        </tab>
    <?php endif; ?>


    <?php if ( ! empty( get_field( 'field_5f22e62fee8ac' ) ) ): ?>
        <tab title="<?php _e( '360° Rundgang', 'davincigroup' ) ?>" icon="icon-33">
            <iframe src="<?php the_field( 'field_5f22e62fee8ac' ); ?>" width="100%" height="640"></iframe>
        </tab>
    <?php endif; ?>
    <?php if ( ! empty( get_the_content() ) ): ?>
        <tab title="<?php _e( 'Beschreibung', 'davincigroup' ) ?>" icon="icon-26">
            <div class="p-10 bg-turquise text-white" style="min-height: 640px">
                <?php the_content(); ?>
            </div>
        </tab>
    <?php endif;
    $group       = get_field( 'field_5f5c7c78415e9' );
    $appartments = get_field( 'field_5f22dde18baf4' );
    ?>
    <tab title="<?php _e( 'Apartments', 'davincigroup' ) ?>" icon="icon-31">
        <div class="lg:p-10 bg-turquise text-white" style="min-height: 640px">
            <?php if ( ! empty( $group ) ):
            $tops = new WP_Query( [
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
                ],
            ] )
            ?>

            <?php
            if ( $tops->have_posts() ):
                $runner   = 1;
                $top_data = [];

                $minPrice = 999999999;
                $maxPrice = 0;

                $minRooms = 999999999;
                $maxRooms = 0;

                $minWfl = 999999999;
                $maxWfl = 0;

                while ( $tops->have_posts() ):
                    $tops->the_post();

                    $von  = ( new \Carbon\Carbon() )->parse( get_field( 'oii_vo_Dati_oii_vo_Abdatum' ) != '' ? get_field( 'oii_vo_Dati_oii_vo_Abdatum' ) : '01.01.1970' );
                    $bis  = ( new \Carbon\Carbon() )->parse( get_field( 'oii_vo_Dati_oii_vo_Bisdatum' ) != '' ? get_field( 'oii_vo_Dati_oii_vo_Bisdatum' ) : '01.01.9999' );
                    $frei = \Carbon\Carbon::now()->between( $von, $bis );
                    $sold = false;
                    if ( get_field( 'oii_vo_Dati_oii_vo_verfuegbarab' ) == 'verkauft' ) {
                        $sold = true;
                        $frei = false;
                    }

                    $top_data[] = [
                        'id'            => get_the_ID(),
                        'top'           => get_field( 'oii_wohnungsnummer' ) != '' ? get_field( 'oii_wohnungsnummer' ) : 'folgt ',
                        'etage'         => get_field( 'oii_etage' ) != '' ? get_field( 'oii_etage' ) : 'folgt',
                        'zimmer'        => get_field( 'oii_fl_Zimmer' )['oii_fl_AnzahlZimmer'] != '' ? get_field( 'oii_fl_Zimmer' )['oii_fl_AnzahlZimmer'] : 'folgt',
                        'wfl'           => get_field( 'oii_fl_WohnflächenGroup' )['oii_fl_Wohnflaeche'] != '' ? get_field( 'oii_fl_WohnflächenGroup' )['oii_fl_Wohnflaeche'] : 'folgt',
                        'ffl'           => get_field( 'oii_fl_WohnflächenGroup' )['oii_fl_BalkonTerrasseFlaeche'] != '' ? get_field( 'oii_fl_WohnflächenGroup' )['oii_fl_BalkonTerrasseFlaeche'] : '--',
                        'garten'        => get_field( 'oii_fl_WohnflächenGroup' )['oii_fl_Gartenflaeche'] != '' ? get_field( 'oii_fl_WohnflächenGroup' )['oii_fl_Gartenflaeche'] : '--',
                        'verkaufspreis' => get_field( 'oii_pr_verkaufspreise' )['oii_pr_kaufpreis'] != '' ? (float) get_field( 'oii_pr_verkaufspreise' )['oii_pr_kaufpreis'] : '--',
                        'miete'         => get_field( 'oii_pr_Mietpreise' )['oii_pr_Pauschalmiete'] != '' ? (float) get_field( 'oii_pr_Mietpreise' )['oii_pr_Pauschalmiete'] : '--',
                        'status'        => $frei,
                        'sold'          => $sold,
                        'permalink'     => get_permalink(),
                        'von'           => $von,
                        'bis'           => $bis,
                        'grundrisse'    => get_field( 'oii_anh_GRUNDRISS' ),

                    ];

                    $kaufpreis = get_field( 'oii_pr_verkaufspreise' )['oii_pr_kaufpreis'] ?? false;

                    if ( $kaufpreis ) {
                        if ( $kaufpreis < $minPrice ) {
                            $minPrice = $kaufpreis;
                        }
                        if ( $kaufpreis > $maxPrice ) {
                            $maxPrice = $kaufpreis;
                        }

                        $minPrice = $minPrice - ( $minPrice % 100000 );
                        $maxPrice = ceil( $maxPrice / 100000 ) * 100000;
                    }


                    $rooms = get_field( 'oii_fl_Zimmer' )['oii_fl_AnzahlZimmer'] ?? false;

                    if ( $rooms ) {
                        if ( $rooms < $minRooms ) {
                            $minRooms = $rooms;
                        }
                        if ( $rooms > $maxRooms ) {
                            $maxRooms = $rooms;
                        }
                    }


                    $wfl = get_field( 'oii_fl_WohnflächenGroup' )['oii_fl_Wohnflaeche'] ?? false;

                    if ( $wfl ) {
                        if ( $wfl < $minWfl ) {
                            $minWfl = $wfl;
                        }
                        if ( $wfl > $maxWfl ) {
                            $maxWfl = $wfl;
                        }

                        $minWfl = $minWfl - ( $minWfl % 10 );
                        $maxWfl = ceil( $maxWfl / 10 ) * 10;
                    }


                    $runner ++;
                endwhile;
            endif;
            wp_reset_postdata(); ?>
            <tops-table :tops="<?php echo htmlentities( json_encode( $top_data ) ) ?>"
                        :min-price="<?php echo $minPrice ?>"
                        :max-price="<?php echo $maxPrice ?>"
                        :min-rooms="<?php echo $minRooms ?>"
                        :max-rooms="<?php echo $maxRooms ?>"
                        :min-wfl="<?php echo $minWfl ?>"
                        :max-wfl="<?php echo $maxWfl ?>"
            ></tops-table>

        </div>
    </tab>
<?php elseif ( ! empty( $appartments ) ): ?>
    <tab title="<?php _e( 'Apartments', 'davincigroup' ) ?>" icon="icon-31">
        <div class="p-10 bg-turquise text-white" style="min-height: 640px">
            <?php echo $appartments ?>
        </div>
    </tab>
<?php endif;

$building = get_field( 'field_5f22e219caec9' );
if ( ! empty( $building ) ):
    ?>

    <tab title="<?php _e( 'Gebäude', 'davincigroup' ) ?>" icon="icon-1">
        <div class="p-10 bg-turquise text-white" style="min-height: 640px">
            <?php echo $building ?>
        </div>
    </tab>
<?php
endif;
?>
    <?php $map = get_field( 'field_5f22e291ee8a7' ); ?>
    <?php if ( ! empty( $map ) ): ?>
        <tab title="Lage" icon="icon-7">
            <div class="relative" style="min-height: 640px">
                <gmap-map :center="{lat:<?php echo $map['lat'] ?>, lng:<?php echo $map['lng'] ?> }"
                          :zoom="<?php echo $map['zoom'] ?>" style="width: 844px; height: 477px">
                    <gmap-marker
                        :position="{lat:<?php echo $map['lat'] ?>, lng:<?php echo $map['lng'] ?> }"
                        icon="<?php echo get_stylesheet_directory_uri() ?>/public/images/map-marker.png"
                    ></gmap-marker>
                </gmap-map>
                <?php if ( ! empty( get_field( 'field_5f22e2a0ee8a8' ) ) ): ?>
                    <div class="absolute w-full p-5 bg-turquise bg-opacity-75 text-white" style="bottom: 0; left:0">
                        <p>
                            <?php the_field( 'field_5f22e2a0ee8a8' ); ?>
                        </p>
                    </div>
                <?php endif; ?>
            </div>
        </tab>
    <?php endif; ?>

    <?php if ( ! empty( get_field( 'field_5f22e2d2ee8aa' ) ) ): ?>

        <tab title="<?php _e( 'Ausstattung', 'davincigroup' ) ?>" icon="icon-18">
            <div class="col-span-2 bg-turquise p-8 text-white" style="min-height: 640px">
                <div class="grid lg:grid-cols-<?php echo count( get_field( 'field_5f22e2d2ee8aa' ) ) ?> gap-4 flex flex-col">
                    <?php $runner = 1;
                    foreach ( get_field( 'field_5f22e2d2ee8aa' ) as $item ): ?>
                        <div class="flex flex-col h-full md:border-l  <?php if ( $runner == count( get_field( 'field_5f22e2d2ee8aa' ) ) ): echo 'md:border-r'; endif; ?>  border-golden p-5">
                            <i class="<?php echo $item['icon'] ?> text-golden text-6xl mx-auto my-3"></i>
                            <h2 class="text-golden font-medium text-3xl text-center mb-5"><?php echo $item['titel'] ?></h2>
                            <p><?php echo $item['beschreibung'] ?></p>
                            <?php if ( ! empty( $item['link'] ) ): ?>
                                <a href="<?php echo $item['link']['url'] ?>"
                                   class="bg-golden text-white w-full py-3 hover:font-semibold hover:shadow-none shadow-lg block text-center mt-5">
                                    <?php echo $item['link']['title'] ?>
                                </a>
                            <?php endif; ?>
                        </div>
                        <hr class="md:hidden">
                        <?php $runner ++; endforeach; ?>
                </div>
            </div>
        </tab>
    <?php endif; ?>


    <?php $downloads = get_field( 'field_5f22da4592c42' ); ?>
    <?php if ( count( $downloads ) > 1 ): ?>
        <tab title="<?php _e( 'Downloads', 'davincigroup' ) ?>" icon="icon-25">
            <div class="col-span-2 bg-turquise p-8 text-white" style="min-height: 640px">
                <h3 class="text-xl text-golden mb-5"><?php echo count( $downloads ) ?>
                    <?php _e('Downloads','davincigroup' ) ?>
                </h3>
                <ul>
                    <?php foreach ( $downloads as $download ): ?>
                        <li class="border-b border-golden p-5">
                            <a href="<?php echo $download['url'] ?>" class="flex justify-between flex-1">
                                <span><i class="icon-25 pr-5"></i> <?php echo $download['title'] ?></span>
                                <span><?php _e('Download','davincigroup' ) ?></span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </tab>
    <?php endif; ?>

    <?php $panos = get_field( 'field_5f4f6e8c3d811' ) ?>
    <?php if ( ! empty( $panos ) ): ?>
        <tab title="<?php _e( '360° Panoramas', 'davincigroup' ) ?>" icon="icon-47">
            <div class="col-span-2 bg-turquise p-8 text-white" style="min-height: 640px">
                <pano-switcher :panos="<?php echo htmlentities( json_encode( $panos ) ) ?>"
                               loadimage="<?php the_field( 'field_5f4fe9591f733', 'options' ) ?>"></pano-switcher>
            </div>
        </tab>
    <?php endif; ?>

</tabs>
</div>
</div>


<div class="container mx-auto p-5">
    <div class="grid grid-cols-1 xl:grid-cols-5 gap-10">
        <div class="col-span-5 lg:col-span-3">

            <?php $bilder = get_field( 'oii_anh_BILD' ) ?>

            <?php if ( empty( $bilder ) ): ?>

                <div class="relative w-full" style="padding-top: 75%">
                    <div class="absolute top-0 left-0 w-full h-full bg-darkblue flex justify-center items-center">
                        <div class="flex flex-col text-center">
                            <p class="text-golden"><?php _e( 'Noch haben wir keine Bilder zu diesem Top.', 'davincigroup' ) ?></p>
                            <p class="text-golden"><?php _e( 'Vereinbaren Sie eine Besichtigung.', 'davincigroup' ) ?></p>
                            <a href="/kontakt" class="bg-golden text-white p-2 mt-3">Kontakt</a>
                        </div>
                    </div>
                </div>

            <?php else: ?>

                <?php
                $urls = [];
                foreach ( $bilder as $img ) {

                    $urls[] = [
                        'url'    => $img['sizes']['custom-thumbnail'],
                        'is_360' => get_field( 'field_5f4e73ada2722', $img['ID'] ),
                    ];
                }
                ?>
                <image-carousel :images="<?php echo htmlspecialchars( json_encode( $urls, ENT_QUOTES ) ) ?>"></image-carousel>
            <?php endif; ?>
        </div>
        <div class="col-span-5 lg:col-span-2 bg-white bg-opacity-75 flex flex-col">
            <ul>
                <li class="flex justify-between pb-2 mb-2 border-b">
                    <strong><?php _e( 'Adresse:', 'davincigroup' ) ?></strong>
                    <div class="text-right">
                        <?php the_field( 'oii_strasse' ) ?>&nbsp;<?php the_field( 'oii_hausnummer' ); ?><br>
                        <?php the_field( 'oii_plz' ) ?>&nbsp;<?php the_field( 'oii_ort' ); ?><br>
                        <strong><?php _e( 'Top', 'davincigroup' ) ?>&nbsp;<?php the_field( 'oii_wohnungsnummer' ); ?>&nbsp;<?php the_field( 'oii_etage' ); ?></strong>
                    </div>
                </li>
                <li class="flex justify-between">
                    <strong><?php _e( 'Zimmer:', 'davincigroup' ) ?></strong>
                    <span><?php the_field( 'oii_fl_Zimmer_oii_fl_AnzahlZimmer' ); ?></span>

                </li>
                <li class="flex justify-between">
                    <strong><?php _e( 'Wohnfläche:', 'davincigroup' ) ?></strong>
                    <span><?php the_field( 'oii_fl_WohnflächenGroup_oii_fl_Wohnflaeche' ); ?>&nbsp;m²</span>

                </li>
                <li class="flex justify-between">
                    <?php $balkon = empty( get_field( 'oii_fl_WohnflächenGroup_oii_fl_BalkonTerrasseFlaeche' ) ) ? '--' : get_field( 'oii_fl_WohnflächenGroup_oii_fl_BalkonTerrasseFlaeche' ) . '&nbsp;m²' ?>
                    <strong><?php _e( 'Balkon, Loggia, Terasse:', 'davincigroup' ) ?></strong>
                    <span><?php echo $balkon ?></span>
                </li>
                <li class="flex justify-between pb-2 mb-2 border-b">
                    <?php $garten = empty( get_field( 'oii_fl_WohnflächenGroup_oii_fl_Gartenflaeche' ) ) ? '--' : get_field( 'oii_fl_WohnflächenGroup_oii_fl_Gartenflaeche' ) . '&nbsp;m²' ?>
                    <strong><?php _e( 'Garten:', 'davincigroup' ) ?></strong>
                    <span><?php echo $garten ?></span>
                </li>

                <?php
                $auf_anfrage = get_field('oii_pr_verkaufspreise_oii_pr_kaufpreisAnfrage');

                if($auf_anfrage){
                    $kaufpreis = __('Auf Anfrage', 'davincigroup');
                }else{
                    $kaufpreis = get_field( 'oii_pr_verkaufspreise_oii_pr_kaufpreis' );
                }

                if ( ! empty( $kaufpreis ) ):
                    if(is_numeric($kaufpreis)){
                        $kaufpreis = number_format( $kaufpreis, 2, ',', '.' ) . '&nbsp;€';
                    }
                    ?>
                    <li class="flex justify-between">
                        <strong><?php _e( 'Kaufpreis:', 'davincigroup' ) ?></strong>
                        <span><?php echo $kaufpreis ?></span>
                    </li>
                <?php endif; ?>


                <?php
                $nettokaltmiete = get_field('oii_pr_Mietpreise_oii_pr_nettokaltmiete');
                if(!empty($nettokaltmiete)):
                ?>
                    <li class="flex justify-between">
                        <strong><?php _e( 'Nettokaltmiete:', 'davincigroup' ) ?></strong>
                        <span><?php echo number_format($nettokaltmiete, 2, ',', '.') ?>&nbsp;€</span>
                    </li>
                <?php endif; ?>

                <?php
                $kaltmiete = get_field('oii_pr_Mietpreise_oii_pr_kaltmiete');
                if(!empty($kaltmiete)):
                    ?>
                    <li class="flex justify-between">
                        <strong><?php _e( 'Nettokaltmiete:', 'davincigroup' ) ?></strong>
                        <span><?php echo number_format($kaltmiete, 2, ',', '.') ?>&nbsp;€</span>
                    </li>
                <?php endif; ?>

                <?php
                $warmmiete = get_field('oii_pr_Mietpreise_oii_pr_warmmiete');
                if(!empty($warmmiete)):
                    ?>
                    <li class="flex justify-between">
                        <strong><?php _e( 'Nettokaltmiete:', 'davincigroup' ) ?></strong>
                        <span><?php echo number_format($warmmiete, 2, ',', '.') ?>&nbsp;€</span>
                    </li>
                <?php endif; ?>
            </ul>


            <?php $downloads = get_field('oii_anh_DOKUMENTE') ?>
<?php //echo var_dump($downloads) ?>
            <?php if(!empty($downloads)): ?>
            <div class="lg:mt-auto mt-10">
                <h3 class="font-bold">Downloads</h3>
                <ul>
                    <?php foreach ( $downloads as $download ): ?>
                        <li class="py-2 border-b text-sm">
                            <a href="<?php echo $download['url'] ?>" target="_blank"><?php echo $download['title'] ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

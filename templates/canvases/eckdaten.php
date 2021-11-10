<project-canvas-content id="<?php _e( 'Eckdaten', 'davincigroup' ) ?>" active-start="true">
    <div class="container mx-auto p-5">
        <div class="grid grid-cols-4 gap-5">
            <div class="hidden md:block px-5 border-r border-golden">
                <h2 class="text-2xl text-golden mb-3">Kontakt</h2>
                <contact-form></contact-form>
            </div>
            <div class="col-span-4 lg:col-span-3">
                <div class="grid grid-cols-1 xl:grid-cols-5 gap-10">
                    <div class="col-span-5 bg-white bg-opacity-75 flex flex-col">
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
							$auf_anfrage = get_field( 'oii_pr_verkaufspreise_oii_pr_kaufpreisAnfrage' );

							if ( $auf_anfrage ) {
								$kaufpreis = __( 'Auf Anfrage', 'davincigroup' );
							} else {
								$kaufpreis = get_field( 'oii_pr_verkaufspreise_oii_pr_kaufpreis' );
							}

							if ( ! empty( $kaufpreis ) ):
								if ( is_numeric( $kaufpreis ) ) {
									$kaufpreis = number_format( $kaufpreis, 2, ',', '.' ) . '&nbsp;€';
								}
								?>
                                <li class="flex justify-between">
                                    <strong><?php _e( 'Kaufpreis:', 'davincigroup' ) ?></strong>
                                    <span><?php echo $kaufpreis ?></span>
                                </li>
							<?php endif; ?>


							<?php
							$nettokaltmiete = get_field( 'oii_pr_Mietpreise_oii_pr_nettokaltmiete' );
							if ( ! empty( $nettokaltmiete ) ):
								?>
                                <li class="flex justify-between">
                                    <strong><?php _e( 'Nettokaltmiete:', 'davincigroup' ) ?></strong>
                                    <span><?php echo number_format( $nettokaltmiete, 2, ',', '.' ) ?>&nbsp;€</span>
                                </li>
							<?php endif; ?>

							<?php
							$kaltmiete = get_field( 'oii_pr_Mietpreise_oii_pr_kaltmiete' );
							if ( ! empty( $kaltmiete ) ):
								?>
                                <li class="flex justify-between">
                                    <strong><?php _e( 'Nettokaltmiete:', 'davincigroup' ) ?></strong>
                                    <span><?php echo number_format( $kaltmiete, 2, ',', '.' ) ?>&nbsp;€</span>
                                </li>
							<?php endif; ?>

							<?php
							$warmmiete = get_field( 'oii_pr_Mietpreise_oii_pr_warmmiete' );
							if ( ! empty( $warmmiete ) ):
								?>
                                <li class="flex justify-between">
                                    <strong><?php _e( 'Nettokaltmiete:', 'davincigroup' ) ?></strong>
                                    <span><?php echo number_format( $warmmiete, 2, ',', '.' ) ?>&nbsp;€</span>
                                </li>
							<?php endif; ?>
                        </ul>


						<?php $downloads = get_field( 'oii_anh_DOKUMENTE' ) ?>
<!--						--><?php //echo var_dump($downloads) ?>
						<?php if ( ! empty( $downloads ) ): ?>
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
        </div>
    </div>
</project-canvas-content>
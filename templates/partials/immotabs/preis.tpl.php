<?php

$vermarktung        = wp_get_post_terms( get_the_ID(), 'vermarktungsart', [ 'fields' => 'names' ] );
$vkpreis_obj        = get_field_object( 'oii_pr_verkaufspreise_oii_pr_kaufpreis' );
$vkpreis_netto_obj  = get_field_object( 'oii_pr_verkaufspreise_oii_pr_kaufpreis_netto' );
$vkpreis_brutto_obj = get_field_object( 'oii_pr_verkaufspreise_oii_pr_kaufpreis_brutto' );

?>
<tab title="Preis" icon="icon-22">
    <div class="p-10 bg-turquise text-white" style="min-height: 640px">
        <div class="grid grid-cols-2 gap-6">
            <div class="flex flex-col text-center">
                <i class="icon-42 text-5xl text-golden mb-10"></i>
                <?php if ( ! in_array( 'Verkauf', $vermarktung ) ): ?>
                    <p><?php echo __( 'Wird nicht zum Verkauf angeboten', 'davincigroup' ) ?></p>
                <?php elseif ( ! get_field( 'oii_pr_verkaufspreise_oii_pr_kaufpreisAnfrage' ) ): ?>
                    <div class="flex justify-between">
                        <div><?php echo $vkpreis_obj['label'] ?></div>
                        <div><?php echo euro( $vkpreis_obj['value'] ) ?></div>
                    </div>
                    <div class="flex justify-between">
                        <div><?php echo $vkpreis_netto_obj['label'] ?></div>
                        <div><?php echo euro( $vkpreis_netto_obj['value'] ) ?></div>
                    </div>
                    <div class="flex justify-between">
                        <div><?php echo $vkpreis_brutto_obj['label'] ?></div>
                        <div><?php echo euro( $vkpreis_brutto_obj['value'] ) ?></div>
                    </div>
                <?php else: ?>
                    <p><?php echo __( 'Kaufpreis auf Anfrage', 'davincigroup' ) ?></p>
                <?php endif; ?>
            </div>
            <div class="flex flex-col text-center">
                <i class="icon-6 text-5xl text-golden mb-10"></i>
                <?php if ( ! in_array( 'Vermietung, Verpachtung', $vermarktung ) ): ?>
                    <p><?php echo __( 'Wird nicht zur Vermietung angeboten', 'davincigroup' ) ?></p>
                <?php elseif ( ! get_field( 'oii_pr_verkaufspreise_oii_pr_kaufpreisAnfrage' ) ): ?>
                    <div class="flex justify-between">
                        <?php $obj = get_field_object( 'oii_pr_Mietpreise_oii_pr_nettokaltmiete' ) ?>
                        <div><?php echo $obj['label'] ?></div>
                        <div><?php echo euro( $obj['value'] ) ?></div>
                    </div>
                    <div class="flex justify-between">
                        <?php $obj = get_field_object( 'oii_pr_Mietpreise_oii_pr_kaltmiete' ) ?>
                        <div><?php echo $obj['label'] ?></div>
                        <div><?php echo euro( $obj['value'] ) ?></div>
                    </div>
                    <div class="flex justify-between">
                        <?php $obj = get_field_object( 'oii_pr_Mietpreise_oii_pr_warmmiete' ) ?>
                        <div><?php echo $obj['label'] ?></div>
                        <div><?php echo euro( $obj['value'] ) ?></div>
                    </div>
                    <div class="flex justify-between">
                        <?php $obj = get_field_object( 'oii_pr_Mietpreise_oii_pr_MietpreisProQm' ) ?>
                        <div><?php echo $obj['label'] ?></div>
                        <div><?php echo euro( $obj['value'] ) ?></div>
                    </div>
                    <div class="flex justify-between">
                        <?php $obj = get_field_object( 'oii_pr_Mietpreise_oii_pr_Pauschalmiete' ) ?>
                        <div><?php echo $obj['label'] ?></div>
                        <div><?php echo euro( $obj['value'] ) ?></div>
                    </div>
                    <?php if ( get_field( 'oii_pr_BruttoNetto_oii_pr_ZzgMehrwertsteuer' ) ): ?>
                        <hr>
                        <div class="flex justify-between">
                            <?php $obj = get_field_object( 'oii_pr_BruttoNetto_oii_pr_Hauptmietzinsnetto' ) ?>
                            <div><?php echo $obj['label'] ?></div>
                            <div><?php echo euro( $obj['value'] ) ?></div>
                        </div>
                        <div class="flex justify-between">
                            <?php $obj = get_field_object( 'oii_pr_BruttoNetto_oii_pr_Hauptmietzinsust' ) ?>
                            <div><?php echo $obj['label'] ?></div>
                            <div><?php echo euro( $obj['value'] ) ?></div>
                        </div>
                    <?php endif; ?>
                    <hr>
                    <div class="flex justify-between">
                        <?php $obj = get_field_object( 'oii_pr_NebenBetriebskosten_oii_pr_Nebenkosten' ) ?>
                        <div><?php echo $obj['label'] ?></div>
                        <div><?php echo euro( $obj['value'] ) ?></div>
                    </div>
                    <div class="flex justify-between">
                        <?php $obj = get_field_object( 'oii_pr_NebenBetriebskosten_oii_pr_Betriebskostennetto' ) ?>
                        <div><?php echo $obj['label'] ?></div>
                        <div><?php echo euro( $obj['value'] ) ?></div>
                    </div>
                    <div class="flex justify-between">
                        <?php $obj = get_field_object( 'oii_pr_NebenBetriebskosten_oii_pr_Betriebskostenust' ) ?>
                        <div><?php echo $obj['label'] ?></div>
                        <div><?php echo euro( $obj['value'] ) ?></div>
                    </div>
                    <div class="flex justify-between">
                        <?php $obj = get_field_object( 'oii_pr_NebenBetriebskosten_oii_pr_Hausgeld' ) ?>
                        <div><?php echo $obj['label'] ?></div>
                        <div><?php echo euro( $obj['value'] ) ?></div>
                    </div>
                    <?php if ( ! get_field( 'oii_pr_HeizkostenGroup_oii_pr_HeizkostenEnthalten' ) ): ?>
                        <hr>
                        <div class="flex justify-between">
                            <?php $obj = get_field_object( 'oii_pr_HeizkostenGroup_oii_pr_Heizkosten' ) ?>
                            <div><?php echo $obj['label'] ?></div>
                            <div><?php echo euro( $obj['value'] ) ?></div>
                        </div>
                    <?php endif; ?>
                    <hr>
                    <div class="flex justify-between">
                        <?php $obj = get_field_object( 'oii_pr_Mietzuschläge' ) ?>
                        <div><?php echo $obj['label'] ?></div>
                        <div><?php echo euro( $obj['value'] ) ?></div>
                    </div>
                    <hr>
                    <div class="flex justify-between">
                        <?php $obj = get_field_object( 'oii_pr_Kaution' ) ?>
                        <div><?php echo $obj['label'] ?></div>
                        <div><?php echo euro( $obj['value'] ) ?></div>
                    </div>
                    <p><?php get_field( 'oii_pr_KautionText' ) ?></p>
                    <?php if ( get_field( 'oii_pr_ProvisionCourtageGroup_oii_pr_Provisionspflichtig' ) ): ?>
                        <hr>
                    <?php endif; ?>
                <?php else: ?>
                    <p><?php echo __( 'Kaufpreis auf Anfrage', 'davincigroup' ) ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>

</tab>

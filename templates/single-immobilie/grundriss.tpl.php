<?php $grundrisse = get_field( 'oii_anh_GRUNDRISS' ) ?>

<div class="container mx-auto p-5">

    <?php if ( empty( $grundrisse ) ): ?>

        <div class="relative w-full h-halfscreen lg:pt-75">
            <div class="absolute top-0 left-0 w-full h-full bg-darkblue flex justify-center items-center">
                <div class="flex flex-col text-center">
                    <p class="text-golden"><?php _e( 'Noch haben wir keinen Grundriss zu diesem Top.', 'davincigroup' ) ?></p>
                    <p class="text-golden"><?php _e( 'Vereinbaren Sie eine Besichtigung.', 'davincigroup' ) ?></p>
                    <a href="/kontakt" class="bg-golden text-white p-2 mt-3">Kontakt</a>
                </div>
            </div>
        </div>

    <?php elseif ( count( $grundrisse ) == 1 ): ?>
        <div class="relative w-full lg:pt-75 h-halfscreen lg:h-auto">
            <div class="absolute top-0 left-0 w-full h-halfscreen lg:h-full bg-darkblue">
                <?php if ( $grundrisse[0]['subtype'] == 'pdf' ): ?>
                <div class="hidden lg:block h-full">
                    <object data="<?php echo $grundrisse[0]['url'] ?>" class="w-full h-full"></object>
                </div>
                <div class="lg:hidden w-full h-full flex items-center justify-center">
                    <a href="<?php echo $grundrisse[0]['url'] ?>" target="_blank" class="bg-golden p-3 text-center text-white">
                        <?php _e('PDF Download', 'davincigroup') ?>
                    </a>
                </div>
                <?php else: ?>
                    <img src="<?php echo $grundrisse[0]['sizes']['custom-thumbnail'] ?>" class="w-full h-auto">
                <?php endif; ?>
            </div>
        </div>
    <?php else: ?>

        <?php
        $urls = [];
        foreach ( $grundrisse as $img ) {

            $urls[] = [
                'url'    => $img['sizes']['custom-thumbnail'],
                'is_360' => get_field( 'field_5f4e73ada2722', $img['ID'] ),
            ];
        }
        ?>
        <div class="p-5 border-2 border-darkblue border-2">
            <image-carousel :images="<?php echo htmlspecialchars( json_encode( $urls, ENT_QUOTES ) ) ?>"></image-carousel>
        </div>
    <?php endif; ?>

</div>

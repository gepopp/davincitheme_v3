<?php
    $gallery = get_field('oii_anh_BILD');
    if (!empty($gallery)):

        $urls = [];

        $urls[] = [
          'url' => get_the_post_thumbnail_url(get_the_ID(), 'custom-thumbnail')
        ];
        foreach ($gallery as $img) {

            $urls[] = [
                'url'    => $img['sizes']['custom-thumbnail'],
                'is_360' => get_field('field_5f4e73ada2722', $img['ID']),
            ];
        }

        ?>
        <tab title="Bilder" icon="icon-13">
            <div class="text-white" style="min-height: 640px">
                <image-carousel
                    :images="<?php echo htmlspecialchars(json_encode($urls, ENT_QUOTES)) ?>">
                </image-carousel>
            </div>
        </tab>
    <?php else: ?>
        <tab title="Bilder" icon="icon-13">
            <div class="text-white" style="min-height: 640px">
                <?php the_post_thumbnail('custom-thumbnail', ['class' => 'w-full']); ?>
            </div>
        </tab>
    <?php endif;

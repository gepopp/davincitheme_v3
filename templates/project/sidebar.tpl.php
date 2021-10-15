<?php

$contacts = get_field('field_5f7e0c5615b91');

?>


<div class="lg:flex flex-col hidden <?php if(!empty($contacts)): ?>bg-darkblue text-white<?php endif; ?>">

    <?php if (empty($contacts)): ?>
        <div class="">
            <h3 class="intent text-base font-bold mb-0 mt-0 leading-none" style="margin: 0"><?php the_field('field_5f2924406d177', 'option') ?></h3>
            <h1 class="intent text-4xl text-golden leading-none"><?php the_field('field_5f2924346d176', 'option') ?></h1>
        </div>
        <contact-form subject="Anfrage zu <?php the_title() ?>">
            <?php \Tonik\Theme\App\template('contactform-col'); ?>
        </contact-form>
    <?php else: ?>
        <?php foreach ($contacts as $contact): ?>
            <div>
                <img src="<?php echo get_the_post_thumbnail_url($contact->ID, 'team-image') ?>" alt="">
            </div>
            <div class="p-5">
                <p class="text-lg"><?php _e('Ihr Direktkontakt:', 'davincigroup' ) ?></p>
                <h2 class="text-2xl leading-none mt-5">
                    <?php echo get_field('field_5f23fa71c024c', $contact->ID) ?>
                    <?php echo get_field('field_5f23fa76c024d', $contact->ID) ?>
                </h2>
                <p class="text-lg leading-none"><?php echo get_field('field_5f25dace611bf', $contact->ID) ?></p>
                <p class="pt-3 text-golden">Tel:
                    <a class="underline" href="tel:<?php echo get_field('field_5f23fa86c024f', $contact->ID) ?>">
                        <?php echo get_field('field_5f23fa86c024f', $contact->ID) ?>
                    </a>
                </p>
                <p class="pt-3 text-golden">E-Mail:
                    <a class="underline" href="mailto:<?php echo get_field('field_5f23fa7ec024e', $contact->ID) ?>">
                        <?php echo get_field('field_5f23fa7ec024e', $contact->ID) ?>
                    </a>
                </p>
            </div>
            <div class="p-5">
                <?php \Tonik\Theme\App\template('helper/divider'); ?>
            </div>

            <div class="mt-auto px-5 pb-5">
                <h2 class="text-golden footer-widget-title">
                    <?php _e('Da Vinci Group', 'davincigroup') ?>
                </h2>
                <div class="textwidget">
                    <p>
                        <?php _e('Schönbrunner Schloßstraße 37A', 'davincigroup') ?>
                        <br>
                        <?php _e('1120 Wien', 'davincigroup') ?>
                    </p>
                    <p>
                        <?php _e('Tel.: ', 'davincigroup' ) ?>
                        <a href="tel:+43196210" class="underline">
                            <?php _e('+43 1 962 10', 'davincigroup' ) ?>
                        </a>
                        <br>
                        <?php _e('Fax: +43 1 962 10 – 99', 'davincigroup' ) ?>
                    </p>
                    <p>
                        E-Mail:&nbsp;<a href="mailto:office@davincigroup.eu" class="underline">office@davincigroup.eu</a>
                    </p>
                </div>
            </div>

        <?php endforeach; ?>
    <?php endif; ?>
</div>

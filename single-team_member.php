<?php

the_post();
get_header();

get_template_part( 'headers', 'banderole' ); ?>
    <section class="container mx-auto px-5">
        <div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-10">
            <div class="lg:my-12 my-10">
                <h3 class="text-base font-bold mb-0 leading-none text-white">
					<?php the_field( 'field_5f216411f6f5a' ) ?></h3>
                <h1 class="text-3xl text-golden leading-none mb-8 break-words"><?php the_title() ?></h1>
                <div class="text-white text-sm"><?php the_content(); ?></p>
                </div>
            </div>
            <div class="lg:my-12 my-10">
				<?php the_post_thumbnail( '16by9' ); ?>
            </div>
    </section>

<?php get_template_part( 'headers', 'close' ); ?>

    <section class="container mx-auto px-5" id="app">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 pt-10">
            <div class="mb-5">
                <h1 class="intent text-5xl text-golden leading-none">Kontaktdaten</h1>
            </div>
            <div class="col-span-3 lg:col-span-2">
                <ul class="mb-10 pb-10">
                    <li class="flex justify-between py-3 border-b border-darkblue">
                        <span>Name:</span>
                        <span>
                            <?php the_field( 'field_5f23fa71c024c' ) ?> &nbsp; <?php the_field( 'field_5f23fa76c024d' ); ?>
                        </span>
                    </li>
                    <li class="flex justify-between py-3 border-b border-darkblue">
                        <span>Position:</span>
                        <span>
                            <?php the_field( 'field_5f25dace611bf' ); ?>
                        </span>
                    </li>
                    <li class="flex justify-between py-3 border-b border-darkblue">
                        <span>E-Mail:</span>
                        <span>
                            <a href="mailto:<?php the_field( 'field_5f23fa7ec024e' ); ?>" class="underline">
                                <?php the_field( 'field_5f23fa7ec024e' ); ?>
                            </a>
                        </span>
                    </li>
                    <li class="flex justify-between py-3 border-b border-darkblue">
                        <span>Telefon:</span>
                        <span>
                            <a href="tel:<?php the_field( 'field_5f23fa86c024f' ); ?>" class="underline">
                                <?php the_field( 'field_5f23fa86c024f' ); ?>
                            </a>
                        </span>
                    </li>
					<?php if ( ! empty( get_field( 'field_61b07c6bfb2ff' ) ) ): ?>
                        <li class="flex justify-between py-3 border-b border-darkblue">
                            <span>Mobil:</span>
                            <span>
                            <a href="tel:<?php the_field( 'field_61b07c6bfb2ff' ); ?>" class="underline">
                                <?php the_field( 'field_61b07c6bfb2ff' ); ?>
                            </a>
                        </span>
                        </li>
					<?php endif; ?>
					<?php if ( ! empty( get_field( 'field_60efd6ac8f6e3' ) ) ): ?>
                        <li class="flex justify-between py-3 border-b border-darkblue">
                            <span>Download VCF:</span>
                            <span>
                            <a href="<?php the_field( 'field_60efd6ac8f6e3' ); ?>" class="underline">
                                Datei Downlaod
                            </a>
                        </span>
                        </li>
					<?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 pt-10">
            <div class="mb-5">
                <h1 class="intent text-5xl text-golden leading-none">Direktkontakt</h1>
            </div>
            <div class="mb-10 pb-10 col-span-3 lg:col-span-2">
                <contact-form></contact-form>
            </div>
        </div>
    </section>


<?php get_footer();

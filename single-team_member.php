<?php

the_post();
get_header();

get_template_part( 'headers', 'banderole' ); ?>
    <section class="container mx-auto px-5">
        <div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-10">
            <div class="lg:my-12 my-10">
                <div class="flex">
                    <div class="lg:hidden mr-5">
						<?php the_post_thumbnail( 'thumbnail', [ 'class' => 'rounded-full' ] ); ?>
                    </div>
                    <div>
                        <h3 class="text-base font-bold mb-0 leading-none text-white">
							<?php the_field( 'field_5f216411f6f5a' ) ?></h3>
                        <h1 class="text-3xl text-golden leading-none mb-8 break-words"><?php the_title() ?></h1>
                        <div class="text-white text-sm"><?php the_content(); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lg:my-12 hidden lg:block">
				<?php the_post_thumbnail( '16by9' ); ?>
            </div>
    </section>

<?php

$vcf = get_field( 'field_60efd6ac8f6e3' );
$phone = empty(get_field('field_61b07c6bfb2ff')) ? get_field('field_5f23fa86c024f') : get_field('field_61b07c6bfb2ff');

?>


    <div class="bg-darkblue border-t border-golden">
        <div class="container mx-auto px-5">
            <div class="grid grid-cols-1 <?php echo empty( $vcf ) ? 'sm:grid-cols-2' : 'sm:grid-cols-3' ?> text-white py-3">

				<?php if ( ! empty( $vcf ) ): ?>
                    <a href="<?php echo $vcf ?>" class="flex lg:justify-center items-center py-3">
                        <div class="bg-lightblue rounded-full p-2 mr-5 inline-block">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <span class="text-lg">Kontakt speichern</span>
                    </a>
				<?php endif; ?>


                <a href="tel:<?php echo $phone ?>" class="flex lg:justify-center items-center py-3">
                    <div class="bg-lightblue rounded-full p-2 mr-5 inline-block">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <span class="text-lg">Kontakt anrufen</span>
                </a>
                <a href="mailto:<?php the_field('field_5f23fa7ec024e'); ?>" class="flex lg:justify-center items-center py-3">
                    <div class="bg-lightblue rounded-full p-2 mr-5 inline-block">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                        </svg>
                    </div>
                    <span class="text-lg">E-Mail senden</span>
                </a>
            </div>
        </div>
    </div>
    </div>
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

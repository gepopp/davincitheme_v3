<div class="main-header pt-6 border-b-2 border-turquise" style="background-image: url( <?php the_field('field_5f207d5615988', 'option') ?> )">
    <?php \Tonik\Theme\App\template('partials/header/banderole'); ?>

    <div class="container mx-auto px-3 xl:px-0 mb-5">
        <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-4">
            <div class="">
                <h3 class="text-base font-bold mb-0 leading-none text-white"><?php the_field('field_5f216411f6f5a') ?></h3>
                <h1 class="text-5xl text-golden leading-normal"><?php the_title() ?></h1>
            </div>
            <div class="col-span-1 lg:col-span-2">
                <?php if(!empty(get_field('field_5f21641ef6f5b'))): ?>
                <p class="text-white mb-10"><?php the_field('field_5f21641ef6f5b') ?></p>
                <?php endif; ?>
                <?php if(has_post_thumbnail()): ?>
                    <?php the_post_thumbnail('custom-thumbnail', ['class' => 'shadow-lg w-full']); ?>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>

<div class="bg-darkblue border-t-2 border-golden">
    <div class="container mx-auto px-3 xl:px-0">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4" style=" min-height: 0px">
            <div class="flex flex-col justify-center">
                <?php dynamic_sidebar('footer_1'); ?>
            </div>
            <div class="flex flex-col justify-center">
                <?php dynamic_sidebar('footer_2'); ?>
            </div>
            <div class="flex flex-col justify-center">
                <?php dynamic_sidebar('footer_3'); ?>
            </div>
        </div>
        <hr>
        <div class="text-golden text-center p-3">
            &copy; <?php echo date('Y') ?> <?php the_field('field_5f2a768ae67dd', 'option') ?>
        </div>
    </div>
</div>
</div>
</main>
<!--footer-->
<?php wp_footer(); ?>
<!--footer-->
</body>
</html>

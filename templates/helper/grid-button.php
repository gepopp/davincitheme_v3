<a
    href="<?php
    if(get_post_type() == 'project'):
        if (get_field('field_63f70dec119ca')):
            the_field('field_63f70dec119ca');
        else:
            the_permalink();
        endif;
    else:
        echo get_field('field_5f23c86fc9b98')['url'];
    endif; ?>"
    class="bg-golden text-white w-full py-3 hover:font-semibold hover:shadow-none shadow-lg block text-center mt-auto">
    <?php if(get_post_type() == 'project'):
        echo __('weitere Informationen', 'davincigroup');
    else:
        echo get_field('field_5f23c86fc9b98')['title'];
    endif; ?>
</a>

<?php
    $cat = get_field('field_5f25af86cb0c1');
    $prefix = get_field('field_5f25b70bf11e8');
    ?>

    <div class="container mx-auto">


    <?php
    $cols = 0;
    $first = true;

    $all = [];

    $col_posts = new WP_Query([
        'post_type'      => ['project', 'frontpage'],
        'post_status'    => 'publish',
        'cat'            => $cat,
        'posts_per_page' => -1,
    ]);

    if ($col_posts->have_posts()) {
        while ($col_posts->have_posts()) {
            $col_posts->the_post();

            if (has_tag($prefix . '-' . 'fullreverse')) {
                $all[get_the_ID()] = 4;
            } elseif (has_tag($prefix . '-' . 'half')) {
                $all[get_the_ID()] = 2;
            } elseif (has_tag($prefix . '-' . 'quarter')) {
                $all[get_the_ID()] = 1;
            } elseif (has_tag($prefix . '-' . 'eighth')) {
                $all[get_the_ID()] = .5;
            } else {
                $all[get_the_ID()] = 1;
            }

        }
    }

    $all['last'] = 0;
    wp_reset_postdata();


    $projects = new WP_Query([
        'post_type'      => ['project', 'frontpage'],
        'post_status'    => 'publish',
        'cat'            => $cat,
        'posts_per_page' => -1,
    ]);


    $firstline = true;
    $last = [];

    if ($projects->have_posts()) {
        while ($projects->have_posts()) {
            $projects->the_post();

            $bg = 'bg-darkblue';

            if (has_tag($prefix . '-' . 'lightblue')) {
                $bg = 'bg-lightblue';
            }

            if (has_tag($prefix . '-' . 'turquise')) {
                $bg = 'bg-turquise';
            }

            if ($first) {
                echo '<div class="grid grid-cols-1 lg:grid-cols-4 lg:gap-10 mb-10 px-3 lg:px-0">';
                $first = false;
            }


            if (!empty($last) && ($last[count($last) - 1] == 'eighth' && !has_tag('eighth'))) {
                echo '</div>';
            }


            if ($cols + $all[get_the_ID()] > 4) {

                if ($firstline) {
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="container mx-auto xl:px-0 py-10" style="
        background-image: url( ' . get_field('field_5f213eff8495d', 'option') . ');
        background-size: 100% auto;
        background-repeat: no-repeat;
        background-position: bottom left;
        padding-bottom: ' . get_field('field_5f2141a728d7c', 'option') . 'px">';

                    echo '<div class="grid grid-cols-1 lg:grid-cols-4 lg:gap-10 mb-10 px-3 lg:px-0">';
                    $firstline = false;
                } else {
                    echo '</div><div class="grid grid-cols-1 lg:grid-cols-4 gap-10 mb-10 px-3 lg:px-0">';
                }
                $cols = 0;
            }


            /** output start */

            if (has_tag($prefix . '-' . 'hiddenmobile')) {
                $hidden = "hidden lg:block";
            } else {
                $hidden = '';
            }

            if(has_tag($prefix . '-' . 'hiddendesktop')){
                $hidden .= ' lg:hidden';
            }



            if (has_tag($prefix . '-' . 'full')) {
                \Tonik\Theme\App\template('frontpage/full', ['bg' => $bg, 'hidden' => $hidden]);
                $last[] = 'full';
                $cols += 4;
            }

            elseif (has_tag($prefix . '-' . 'fullreverse')) {
                \Tonik\Theme\App\template('frontpage/fullreverse', ['bg' => $bg, 'hidden' => $hidden]);
                $last[] = 'fullreverse';
                $cols += 4;
            }

            elseif (has_tag($prefix . '-' . 'half')) {
                \Tonik\Theme\App\template('frontpage/half-split', ['bg' => $bg, 'hidden' => $hidden]);
                $last[] = 'half';
                $cols += 2;
            }

            elseif (has_tag($prefix . '-' . 'quarter')) {
                \Tonik\Theme\App\template('frontpage/quarter', ['bg' => $bg, 'hidden' => $hidden]);
                $last[] = 'quarter';
                $cols += 1;
            }


            elseif (has_tag($prefix . '-' . 'eighth')) {

                if ($last[count($last) - 1] != 'eighth') {
                    echo '<div class="flex flex-col justify-start col-span-2 lg:col-span-1">';
                    \Tonik\Theme\App\template('frontpage/eighth', ['bg' => $bg, 'hidden' => $hidden]);
                    $last[] = 'eighth';
                    $cols += .5;

                } else {

                    \Tonik\Theme\App\template('frontpage/eighth', ['bg' => $bg, 'hidden' => $hidden]);
                    $cols += .5;
                    $last[] = 'secondeighth';
                    echo '</div>';

                }
            }else{
                \Tonik\Theme\App\template('frontpage/quarter', ['bg' => $bg, 'hidden' => $hidden]);
                $last[] = 'quarter';
                $cols += 1;
            }

        }//endwhile
    }


    ?>
</div>
</div>
</div>
</section>
<?php get_footer(); ?>

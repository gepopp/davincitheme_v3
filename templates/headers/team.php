<?php
/**
 * @var $tags
 */
extract( $args );

$slugs = array_column( $tags, 'slug' );
?>
    <script>
        function scrollspy() {
            const element = document.getElementById('scrollnav');
            return element.getBoundingClientRect().top;
        }

        function isInViewport(el) {
            const rect = el.getBoundingClientRect();
            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                rect.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
        }

        var slugs = <?php echo json_encode( $slugs ) ?>;

        function sluginviewport() {
            return slugs.find(sl => {
                if (isInViewport(document.getElementById(sl))) {
                    return sl;
                }
            })
        }

    </script>
    <div class="mt-10"></div>
    <div class="main-header">
        <div class="container mx-auto px-3 mb-10">
            <div class="grid lg:grid-cols-3 gap-4">
                <div>
                    <h3 class="text-base font-bold mb-0 leading-none text-darkblue lg:text-white"><?php the_field( 'field_5f25cdcd1347d', 'option' ) ?></h3>
                    <h1 class="text-5xl text-golden leading-none"><?php the_field( 'field_5f25cdc71347c', 'option' ) ?></h1>
                </div>
                <div class="col-span-2">
                    <p class="text-white mb-10"><?php the_field( 'field_5f25cdd41347e', 'option' ) ?></p>
                    <img src="<?php echo get_field( 'field_5f25cf9841c46', 'option' )['sizes']['custom-thumbnail'] ?>" class="w-full shadow-lg">
                </div>
            </div>
            <div class="grid lg:grid-cols-3 gap-4">
                <div class="relative"
                     id="powered"
                     x-data="{ scrolled : 0, active : '', active : '' }"
                     @scroll.window.debounce="scrolled = document.getElementById('powered').offsetTop - window.pageYOffset"
                     @scroll.window="active = sluginviewport()">
                    <div id="scrollnav"
                         class="absolute left-0 transition-all hidden lg:block"
                         :style="`top: ${ scrolled < 0 ? (scrolled * -1) + 100 : 0 }px;`"
                         x-transition
                    >
                        <h3 class="text-xl text-darkblue font-semibold"><?php _e( 'Abteilungen', 'davincigroup' ) ?></h3>
                        <ul class="text-darkblue">
							<?php foreach ( $tags as $tag ): ?>
                                <li>
                                    <a href="#<?php echo $tag->slug ?>" :class="{ 'font-semibold underline' : active == '<?php echo $tag->slug ?>' }">
                                        <span class="text-3xl leading-none pr-5">&rsaquo;</span>
                                        <span class="hover:underline"><?php echo $tag->name ?></span>
                                    </a>
                                </li>
							<?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_template_part( 'headers', 'close' );
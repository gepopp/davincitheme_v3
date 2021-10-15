<?php
$tabs = [];

$group = get_field( 'field_5f5c7c78415e9' );
$tops  = new WP_Query( [
	'post_type'      => 'immobilie',
	'post_status'    => 'publish',
	'posts_per_page' => - 1,
	'meta_query'     => [
		'relation' => 'AND',
		[
			'key'     => 'oii_vt_gruppe_oii_vt_gruppenkennung',
			'value'   => $group,
			'compare' => '=',
		],
		[
			'key'     => 'oii_vt_gruppe_oii_vt_gruppenkennung',
			'compare' => 'EXISTS',
		],
	],
] );

$apparments = false;
if ( ! empty( get_field( 'field_5f22dde18baf4' ) ) || ( $tops->post_count != 0 ) && ! empty( $group ) ){
    $tabs[] =  __( 'Apartments', 'davincigroup' );
}
wp_reset_postdata();

if ( ! empty( $gallery ) || has_post_thumbnail() ){
    $tabs[] = __( 'Bilder', 'davincigroup' );
}
if ( ! empty( get_the_content() ) ){
    $tabs[] =  __( 'Beschreibung', 'davincigroup' );
}
if ( ! empty( get_field( 'field_5f22e62fee8ac' ) ) ){
    $tabs[] = __( '360° Rundgang', 'davincigroup' );
}
if ( ! empty( get_field( 'field_5f4f6e8c3d811' ) ) ){
    $tabs[] = __( 'Gebäude', 'davincigroup' );
}
if ( ! empty( get_field( 'field_5f22e219caec9' ) ) ){
    $tabs[] = __( '360° Panoramas', 'davincigroup' );
}
if ( ! empty( get_field( 'field_5f22e2d2ee8aa' ) ) ){
    $tabs[] = __( 'Ausstattung', 'davincigroup' );
}

if ( ! empty( get_field( 'field_5f22da4592c42' ) ) ){
    $tabs[] = __( 'Downloads', 'davincigroup' );
}

?>
<script>
    var tabs = <?php echo json_encode($tabs) ?>;
</script>



<div class="bg-golden text-white relative shadow-2xl">
	<div ref="bar" class="container mx-auto text-white pb-2 pt-4 font-medium flex justify-between whitespace-no-wrap overflow-hidden px-3">
		<div ref="outer" class="flex justify-between min-w-full" style="transition: margin-left .2s ease">
            <div class="hidden lg:block">
	            Projekt: <?php the_title() ?>
            </div>
            <nav>
                <ul class="flex flex-wrap justify-between sm:space-x-5"
                    x-data="{ acitve : 0, tabs : tabs }"
                    x-init="setTimeout(() => $dispatch('tab', tabs[0]), 1000)"
                >
                    <template x-for="( tab, index ) in tabs" x-key="index">
                        <li class="cursor-pointer" x-text="tab" :data-index="index" @click="$dispatch('tab', tab)"></li>
                    </template>
                </ul>
            </nav>
		</div>
	</div>
</div>
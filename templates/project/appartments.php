<?php

$group = get_field( 'field_5f5c7c78415e9' );

if ( ! empty( $group ) ) {
	$tops = new WP_Query( [
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
		],
	] );

	if ( $tops->have_posts() ) {
		while ( $tops->have_posts() ) {
			$tops->the_post();

            $status = 'reserviert';

			$von  = ( new \Carbon\Carbon() )->parse( get_field( 'oii_vo_Dati_oii_vo_Abdatum' ) != '' ? get_field( 'oii_vo_Dati_oii_vo_Abdatum' ) : '01.01.1970' );
			$bis  = ( new \Carbon\Carbon() )->parse( get_field( 'oii_vo_Dati_oii_vo_Bisdatum' ) != '' ? get_field( 'oii_vo_Dati_oii_vo_Bisdatum' ) : '01.01.9999' );
			$status = \Carbon\Carbon::now()->between( $von, $bis ) ? 'frei' : 'reserviert';

			if ( get_field( 'oii_vo_Dati_oii_vo_VerfuegbarAb' ) == 'verkauft' ) {
                $status = 'verkauft';
			}

			$top_data[] = [
				'id'            => get_the_ID(),
				'top'           => get_field( 'oii_wohnungsnummer' ),
				'etage'         => get_field( 'oii_etage' ),
				'zimmer'        => get_field( 'oii_fl_Zimmer' )['oii_fl_AnzahlZimmer'],
				'wfl'           => get_field( 'oii_fl_WohnflächenGroup' )['oii_fl_Wohnflaeche'],
				'ffl'           => get_field( 'oii_fl_WohnflächenGroup' )['oii_fl_BalkonTerrasseFlaeche'],
				'garten'        => empty( get_field( 'oii_fl_WohnflächenGroup' )['oii_fl_Gartenflaeche'] ) ? 0 : get_field( 'oii_fl_WohnflächenGroup' )['oii_fl_Gartenflaeche'],
				'verkaufspreis' => get_field( 'oii_pr_verkaufspreise' )['oii_pr_kaufpreis'],
				'miete'         => get_field( 'oii_pr_Mietpreise' )['oii_pr_Pauschalmiete'],
				'status'        => $status,
				'permalink'     => get_permalink(),
				'von'           => $von,
				'bis'           => $bis,
				'grundrisse'    => get_field( 'oii_anh_GRUNDRISS' ),
			];
		}
	}
	wp_reset_postdata();
}

foreach ( $top_data as $top ) {

	$prices[] = (float) $top['verkaufspreis'];
	$rents[]  = (float) $top['miete'];
	$wfl[]    = (float) $top['wfl'];
	$rooms[]  = (float) $top['zimmer'];

}
?>
<script>
    var tops = <?php echo json_encode( $top_data ) ?>;

    document.addEventListener('alpine:init', () => {
        Alpine.store('sort', false);
        Alpine.store('direction', false);
    });

    function sortTable(sort, direction, tops){

            return  tops.sort(function(a,b){
                return direction == 'up' ? a[sort] - b[sort]  : b[sort] - a[sort] ;
            });
    }
</script>

<?php //get_template_part('project', 'inputrange') ?>

<table class="border-golden w-full max-w-full border mb-5 tops-table" x-data="{ tops : tops }"
       @sort.window="function(e){ tops = sortTable(e.detail.sort, e.detail.direction, tops); $store.sort = e.detail.sort; $store.direction = e.detail.direction}">
    <thead>
    <tr>
        <th class="uppercase border border-golden text-xs font-weight-light p-1 w-24 text-center">
            <div class="flex items-center justify-center space-x-2">
                <div>
                    <span x-text="window.translations.top"></span>
                </div>
                <div>
		            <?php get_template_part('project', 'tablesort', ['sort_by' => 'top']) ?>
                </div>
            </div>
        </th>
        <th class="uppercase border border-golden text-xs font-weight-light p-1 w-24 text-center cursor-pointer">
            <div class="flex items-center justify-center space-x-2">
                <div>
                    <span x-text="window.translations.etage"></span>
                </div>
            </div>
        </th>
        <th class="uppercase border border-golden text-xs font-weight-light p-1 w-24 text-center cursor-pointer">
            <div class="flex items-center justify-center space-x-2">
                <div>
                    <span x-text="window.translations.zimmer"></span>
                </div>
                <div>
			        <?php get_template_part('project', 'tablesort', ['sort_by' => 'zimmer']) ?>
                </div>
            </div>
        </th>
        <th class="uppercase border border-golden text-xs font-weight-light p-1 w-24 text-center cursor-pointer">
            <div class="flex items-center justify-center space-x-2">
                <div>
                    <span x-text="window.translations.wfl"></span>
                </div>
                <div>
			        <?php get_template_part('project', 'tablesort', ['sort_by' => 'wfl']) ?>
                </div>
            </div>
        </th>
        <th class="uppercase border border-golden text-xs font-weight-light p-1 w-24 text-center cursor-pointer">
            <span x-text="window.translations.garten"></span>
        </th>
        <th class="uppercase border border-golden text-xs font-weight-light p-1 w-24 text-center ">
            <small class="text-xs" x-text="window.translations.balkon"></small>
        </th>
        <th class="uppercase border border-golden text-xs font-weight-light p-1 w-24 text-center cursor-pointer font-mono" @click="sort('verkaufspreis')">
            <span x-text="window.translations.kaufpreis"></span>
        </th>
        <th class="uppercase border border-golden text-xs font-weight-light p-1 w-24 text-center" x-text="window.translations.grundriss"></th>
        <th class="uppercase border border-golden text-xs font-weight-light p-1 w-24 text-center" x-text="window.translations.frei"></th>
        <th class="uppercase border border-golden text-xs font-weight-light p-1 w-24 text-center" x-text="window.translations.details"></th>
    </tr>
    </thead>
    <tbody>
    <template x-for="top in tops" x-key="top.top">
        <tr class="hover:bg-gray-300 bg-opacity-25">
            <td>
                <span x-text="top.top"></span>
            </td>
            <td>
                <span x-text="top.etage"></span>
            </td>
            <td>
                <span x-text="top.zimmer"></span>
            </td>
            <td>
                <span x-text="top.wfl"></span><span> m²</span>
            </td>
            <td>
                <span x-text="top.garten"></span><span> m²</span>
            </td>
            <td>
                <span x-text="top.ffl"></span><span> m²</span>
            </td>
            <td x-show="top.status == 'frei'">
                <span x-text="top.verkaufspreis"></span><span> &euro;</span>
            </td>
            <td x-show="top.status == 'frei'">
                <template x-for="grundriss in top.grundrisse" x-key="grundriss.url">
                    <a :href="grundriss.url" target="_blank" class="flex space-x-3 justify-center items-center underline">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13l-3 3m0 0l-3-3m3 3V8m0 13a9 9 0 110-18 9 9 0 010 18z"></path>
                        </svg>
                        Download
                    </a>
                </template>
            </td>
            <td x-show="top.status == 'frei'">
                <span x-text="top.status"></span>
            </td>
            <td x-show="top.status == 'frei'">
                <a :href="top.permalink" x-text="window.translations.details" class="underline"></a>
            </td>
            <td x-show="top.status != 'frei'" colspan="4" class="text-white" :class="top.status == 'reserviert' ? ' bg-yellow-500 bg-opacity-75 ' : ' bg-red-500 bg-opacity-75 '">
                <span x-text="top.status"></span>
            </td>
        </tr>
    </template>
    </tbody>
</table>
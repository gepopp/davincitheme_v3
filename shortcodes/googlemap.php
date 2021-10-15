<?php
add_shortcode( 'map', function ( $atts ) {

	$attributes = shortcode_atts([
		'lat' => 0.00,
		'lng' => 0.00,
		'zoom' => 7
	], $atts);



	ob_start();
	?>

	<gmap-map :center="{lat:<?php echo $attributes['lat'] ?>, lng:<?php echo $attributes['lng'] ?> }" :zoom="<?php echo $attributes['zoom'] ?>" style="width: 100%; height: 477px">
		<gmap-marker
			:position="{lat:<?php echo $attributes['lat'] ?>, lng:<?php echo $attributes['lng'] ?> }"
			icon="<?php echo get_stylesheet_directory_uri() ?>/public/images/map-marker.png"
		></gmap-marker>
	</gmap-map>


	<?php
	return ob_get_clean();

} );
<?php
add_shortcode('button', function ($atts){

	$attributes = shortcode_atts([
		'href' => '#',
		'content' => __('weitere Informationen', 'davincigroup')
	], $atts);

	ob_start();

	get_template_part('shortcodes', 'button', ['attributes' => $attributes, 'cotnent' => $attributes['content']]);

	return ob_get_clean();

});


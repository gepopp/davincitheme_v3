<?php
add_shortcode( 'contactform', function($atts){

	$attributes = shortcode_atts([
		'subject' => __('Bitte informieren Sie mich', 'davincigroup')
	], $atts);


	ob_start();

	$errMsg = [
		'name' => __('Bitte geben Sie, Ihren Namen ein!', 'davincigroup'),
		'email' => __('Bitte geben Sie eine gültige E-Mail-Adresse ein!', 'davincigroup'),
		'subject' => __('Bitte einen Betreff eingeben!', 'davincigroup'),
		'message' => __('Bitte eine Nachricht eingeben!', 'davincigroup')
	];
	?>

	<contact-form subject="<?php echo $attributes['subject'] ?>" :error-messages='<?php echo str_replace("'", "\'",json_encode($errMsg, JSON_HEX_APOS)) ?>' >
		<?php get_template_part('parts', 'contactform'); ?>
	</contact-form>

	<?php
	return ob_get_clean();

});

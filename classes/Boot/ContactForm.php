<?php

namespace davinci\codebase\Boot;

class ContactForm {

	public function __construct() {

		add_action('wp_ajax_contactForm', [$this, 'sent_request_email']);
		add_action('wp_ajax_nopriv_contactForm', [$this, 'sent_request_email']);

	}

	function sent_request_email()
	{

		$name       = sanitize_text_field($_POST['name']);
		$email      = sanitize_email($_POST['email']);
		$subject    = sanitize_text_field($_POST['subject']);
		$message    = sanitize_text_field($_POST['message']);
		$headers    = array('Content-Type: text/html; charset=UTF-8');
		$receipient = get_field('field_5f232f326084f', 'option');



		$mail_message = '';
		$mail_message .= 'Anfrage über das Kontaktfromular vom ' . date('H:i:s d.m.Y') . '<br>';
		$mail_message .= 'Anfrage von: ' . $name . '<br>';
		$mail_message .= 'E-Mail Adresse: ' . $email . '<br>';
		$mail_message .= '----------------------------------------------------------------------------------------------------<br><br>';
		$mail_message .= $message;



		if(wp_mail($receipient,  $subject, $mail_message, $headers )){
			wp_die();
		}else{
			wp_die('sendefehler', 400);
		}
	}

}
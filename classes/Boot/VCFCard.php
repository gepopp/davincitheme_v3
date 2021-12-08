<?php

namespace davinci\codebase\Boot;


use JeroenDesloovere\VCard\VCard;
use JeroenDesloovere\VCard\Property\URL;
use JeroenDesloovere\VCard\Property\Name;
use JeroenDesloovere\VCard\Property\Logo;
use JeroenDesloovere\VCard\Property\Email;
use JeroenDesloovere\VCard\Property\Title;
use JeroenDesloovere\VCard\Property\Address;
use JeroenDesloovere\VCard\Property\Telephone;
use JeroenDesloovere\VCard\Formatter\Formatter;
use JeroenDesloovere\VCard\Formatter\VcfFormatter;
use JeroenDesloovere\VCard\Property\Parameter\Type;
use JeroenDesloovere\VCard\Property\Parameter\Value;

class VCFCard {


	public function __construct() {

		add_action( 'save_post', [ $this, 'createCard' ] );

	}


	function createCard( $post_id ) {


		if ( get_post_type( $post_id ) != "team_member" ) {
			return;
		}


		$firstname = get_field( 'field_5f23fa71c024c', $post_id );
		$lastname  = get_field( 'field_5f23fa76c024d', $post_id );
		$postition = get_field( 'field_5f25dace611bf', $post_id );
		$email     = get_field( 'field_5f23fa7ec024e', $post_id );
		$phone     = get_field( 'field_5f23fa86c024f', $post_id );
		$logo      = get_field( 'field_5f4fe9591f733', 'option' );


		$fullname = mb_convert_encoding( $firstname . ' ' . $lastname, "ISO-8859-1", 'UTF-8' );
		$email    = mb_convert_encoding( $email, "ISO-8859-1", 'UTF-8' );
		$phone    = mb_convert_encoding( $phone, "ISO-8859-1", 'UTF-8' );
		$title    = mb_convert_encoding( 'Da Vinci Group - ' . $postition, "ISO-8859-1", 'UTF-8' );
		$address  = mb_convert_encoding( 'Schönbrunner Schlossstrasse 37A', "ISO-8859-1", 'UTF-8' );


		$filename = strtolower( $firstname . '_' . $lastname . '_' . time() );

		// create vcf
		$card = ( new VCard() )
			->add( new Name( $fullname ) )
			->add( new Email( $email, Type::work() ) )
			->add( new Telephone( $phone, Type::work(), new Value( 'text' ) ) )
			->add( new Title( $title ) )
			->add( new Logo( $logo ) )
			->add( new Address( null, null, $address, 'Wien', 'Wien', '1120' ) )
			->add( new URL( 'https://davincigroup.eu', Type::work() ) );


		if ( ! is_dir( get_stylesheet_directory() . '/tmp' ) ) {
			mkdir( get_stylesheet_directory() . '/tmp' );
		}

		foreach ( glob( get_stylesheet_directory() . '/tmp/*' ) as $file ) {
			if ( file_exists( $file ) ) {
				unlink( $file );
			}
		}

		$formatter = new Formatter( new VcfFormatter(), $filename );
		$formatter->addVCard( $card );

		$file = $formatter->save( get_stylesheet_directory() . '/tmp' );

		//save to meida lib
		if ( $file ) {

			$vcf_location = get_stylesheet_directory() . '/tmp/' . $filename . '.vcf';

			$upload_dir = wp_upload_dir();

			$file_data = file_get_contents( $vcf_location );

			$filename = basename( $vcf_location );

			if ( wp_mkdir_p( $upload_dir['path'] ) ) {
				$file = $upload_dir['path'] . '/' . $filename;
			} else {
				$file = $upload_dir['basedir'] . '/' . $filename;
			}

			file_put_contents( $file, $file_data );

			$wp_filetype = wp_check_filetype( $filename, null );

			$attachment = [
				'post_mime_type' => $wp_filetype['type'],
				'post_title'     => sanitize_file_name( $filename ),
				'post_content'   => '',
				'post_status'    => 'inherit',
			];

			$attach_id = wp_insert_attachment( $attachment, $file, $post_id );
			require_once( ABSPATH . 'wp-admin/includes/image.php' );


			$attach_data = wp_generate_attachment_metadata( $attach_id, $file );
			wp_update_attachment_metadata( $attach_id, $attach_data );

			update_field( 'field_60efd6ac8f6e3', $attach_id, $post_id );
		}
	}
}
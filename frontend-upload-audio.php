<?php
/*
Plugin Name: Frontend Upload Audio
Plugin URI: https://geek.hellyer.kiwi/plugins/
Description: Frontend Upload Audio
Version: 1.0
Author: Ryan Hellyer
Author URI: https://geek.hellyer.kiwi/

*/


/**
 * Add a custom audio upload meta box.
 * Based on code from the Unique Headers plugin ... https://geek.hellyer.kiwi/plugins/unique-headers/
 *
 * @copyright Copyright (c), Ryan Hellyer
 * @license http://www.gnu.org/licenses/gpl.html GPL
 * @author Ryan Hellyer <ryanhellyer@gmail.com>
 */
class Frontend_Upload_Audio {

	/**
	 * Class constructor.
	 */
	public function __construct() {
		add_action( 'init',               array( $this, 'media_upload' ) );
		add_shortcode( 'upload_audio',    array( $this, 'form' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );
	}

function media_upload() {
/*
name
type
tmp_name
*/

	$name = sanitize_title( $_FILES[ 'file' ][ 'name' ] );

	// These files need to be included as dependencies when on the front end.
	require_once( ABSPATH . 'wp-admin/includes/image.php' );
	require_once( ABSPATH . 'wp-admin/includes/file.php' );
	require_once( ABSPATH . 'wp-admin/includes/media.php' );
	
	// Let WordPress handle the upload.
	// Remember, 'my_image_upload' is the name of our file input in our form above.
	$attachment_id = media_handle_upload( $name, $_POST['post_id'] );

	if ( is_wp_error( $attachment_id ) ) {
		// There was an error uploading the image.
	} else {
		// The image was uploaded successfully!
	}

	file_put_contents( '/home/ryan/nginx/arousingaudio.com/public_html/wp-content/plugins/frontend-upload-audio/temp.txt', print_r( $_FILES, true ) );

}

	/**
	 * The forms HTML.
	 */
	public function form() {

		$content = file_get_contents( dirname( __FILE__ ) . '/uploader.html' );

		return $content;
	}

	/**
	 * Adding required scripts.
	 */
	public function scripts() {

		wp_enqueue_script(
			'frontend-upload-audio',
			plugin_dir_url( __FILE__ ) . 'uploader.js',
			array(),
			'1.0',
			true
		);

	}

}
new Frontend_Upload_Audio( $args );

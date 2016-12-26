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

	/**
	 * Uploading the content into WordPress.
	 */
	public function media_upload() {

		// Load WordPress file handling tools
		if ( ! function_exists( 'wp_handle_upload' ) ) {
			require_once( ABSPATH . 'wp-admin/includes/file.php' );
		}

		$uploadedfile = $_FILES['file'];
		$upload_overrides = array(
			'test_form' => false
		);
		$movefile = wp_handle_upload( $uploadedfile, $upload_overrides );

		if ( $movefile && ! isset( $movefile['error'] ) ) {

			$this->create_audio_post( $movefile );
			file_put_contents( '/home/ryan/nginx/arousingaudio.com/public_html/wp-content/plugins/frontend-upload-audio/temp.txt', print_r( $movefile, true ) );

		} else {
			file_put_contents( '/home/ryan/nginx/arousingaudio.com/public_html/wp-content/plugins/frontend-upload-audio/temp.txt', 'ERROR: ' . print_r( $_FILES, true ) );
		}

		return;
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

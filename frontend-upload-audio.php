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
		add_shortcode( 'upload_audio',    array( $this, 'form' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );
	}

	public function form() {
//echo plugin_dir_url( __FILE__ ) . 'uploader.html';die;
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

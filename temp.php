<?php

//file_put_contents( '/home/ryan/nginx/arousingaudio.com/public_html/wp-content/plugins/frontend-upload-audio/temp.txt', print_r( $_FILES, true ) );

/*
// These files need to be included as dependencies when on the front end.
require_once( ABSPATH . 'wp-admin/includes/image.php' );
require_once( ABSPATH . 'wp-admin/includes/file.php' );
require_once( ABSPATH . 'wp-admin/includes/media.php' );

// Let WordPress handle the upload.
// Remember, 'my_image_upload' is the name of our file input in our form above.
$attachment_id = media_handle_upload( 'my_image_upload', $_POST['post_id'] );

if ( is_wp_error( $attachment_id ) ) {
	// There was an error uploading the image.
} else {
	// The image was uploaded successfully!
}


$_FILES[ 'file' ][ 'name' ]
*/

?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset=utf-8>
<meta name="viewport" content="width=620">
<title>HTML5 Demo: Drag and drop, automatic upload</title>
<body>

<?php require( 'uploader.php' ); ?>

</body>
</html>
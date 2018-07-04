<?php

/**
/* Template Name: API KEY 
 * @package WordPress
 * @subpackage CMHC
 * @since CMHC
 */
$api_response = wp_remote_post( 'https://localhost/demo-product/wp-json/wc/v2/products/{5910}', array(  // ?force=true
	'method'    => 'DELETE',
 	'headers' => array(
		'Authorization' => 'Basic ' . base64_encode( 'ck_18b0f3ea56032a754da849a5934b1d48ff657e06:cs_51c9a1db99c8d61f05987067e4be0e13daee27e4' )
	)
) );
 
$body = json_decode( $api_response['body'] );
//print_r( $body );
 
if( wp_remote_retrieve_response_message( $api_response ) === 'OK' ) {
	echo 'The product ' . $body->name . ' has been removed';
}
?>
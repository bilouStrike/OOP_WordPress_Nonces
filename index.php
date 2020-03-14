<?php
require 'vendor/autoload.php';

// create field nonce
$field_nonce = new WpOriented\wpNonnes\wpFieldNonce( 'my_action' );
	$field_nonce->createNonceForForm();

// create url nonce
$url_nonce = new WpOriented\wpNonnes\wpUrlNonce( 'my_action' );
	echo $url_nonce->createNonceForUrl();

// validate field nonce
$field_nonce = new WpOriented\wpNonnes\wpFieldNonce('my_action');
	$validator = new WpOriented\wpNonnes\nonceValidator;
	$validator->isValid($nonce);

// validate url nonce
$nonce = new WpOriented\wpNonnes\wpUrlNonce('my_action');
	$validator = new WpOriented\wpNonnes\nonceValidator;
	$validator->isValid($nonce);

?>




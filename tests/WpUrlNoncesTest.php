<?php

require dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

use WpOriented\WpNonnes\wpUrlNonce;
use PHPUnit\Framework\TestCase;
use Brain\Monkey;
use Brain\Monkey\Functions;


class WpUrlNoncesTest extends TestCase {

	public function setUp() {
		$this->urlNonce = new wpUrlNonce( 'my_action' );
        Monkey\setUp();
	}

	public function tearDown() {
		unset( $this->urlNonce );
		Monkey\tearDown();
	}

	public function test_Nonce_for_url() {
		Functions\when( 'wp_create_nonce' )->justReturn( '83467e5027' );
   	 	$input = $this->urlNonce->createNonceForUrl( 'www.website.com/?user=100' );

    	$expected = 'www.website.com/?user=100&_wpnonce=83467e5027';

    	$this->assertEquals( $expected, $input );
	}

	public function test_verify() {
		Functions\expect( 'wp_verify_nonce' )->once()->with( 'value', 'my_action' )->andReturn(true);
		$_GET['_wpnonce'] = 'value';
		$this->assertTrue( $this->urlNonce->verify() );
	}
	
}
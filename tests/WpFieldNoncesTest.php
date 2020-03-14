<?php

require dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

use WpOriented\WpNonnes\wpFieldNonce;
use PHPUnit\Framework\TestCase;
use Brain\Monkey;
use Brain\Monkey\Functions;


class WpFieldNoncesTest extends TestCase {

	public function setUp() {
		$this->fieldNonce = new wpFieldNonce( 'my_action' );
        Monkey\setUp();
	}

	public function tearDown() {
		unset( $this->fieldNonce );
		Monkey\tearDown();
	}

	public function test_Nonce_for_form() {
		Functions\when( 'wp_create_nonce' )->justReturn( '83467e5027' );
   	 	$input = $this->fieldNonce->createNonceForForm();

    	$expected = '<input type="hidden" id="my_action" name="my_action" value="83467e5027" />';
    	$this->assertEquals( $expected, $input );
	}

	public function test_verify() {
		Functions\expect('wp_verify_nonce')->once()->with('value' , 'my_action')->andReturn(true);
		$_POST['_wpnonce'] = 'value';
		$this->assertTrue($this->fieldNonce->verify());
	}
	
}
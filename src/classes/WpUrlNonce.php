<?php
declare(strict_types=1);

namespace WpOriented\WpNonnes;

use WpOriented\WpNonnes\nonceInterface as nonceInterface;

class WpUrlNonce implements nonceInterface 
{

	/**
   	 * @var string $action
   	 */
	private $action;


	/**
   	 * @param string $action
     */
	public function __construct($action) { 
		$this->action = $action;
	}

	/**
     * Returns URL with given action name and nonce value.
     * @param  string $url
     * @return string
    */
	public function createNonceForUrl($url) {
		return wp_nonce_url($url, $this->action);
	}


	/**
   	 * Verifies the nonce using wp_verify_nonce
   	 * @return bool
   	*/
	public function verify() {
		$retrieved_nonce = $_GET['_wpnonce'];
		return (bool) wp_verify_nonce($retrieved_nonce, $this->action);
	}

}

?>
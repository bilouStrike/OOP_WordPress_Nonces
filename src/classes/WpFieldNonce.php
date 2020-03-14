<?php
declare(strict_types=1);

namespace WpOriented\WpNonnes;

use WpOriented\WpNonnes\nonceInterface as nonceInterface;

class WpFieldNonce implements nonceInterface 
{
    /**
    * @var string $action
    */
    private $action;

    /**
    * @param string $action
    */
    public function __construct($action) 
    {
        $this->action = $action;
    }

    /**
    * Returns hidden input with action name and nonce value
    * @return string
    */
    public function createNonceForForm() {
        $nonce_field = '<input type="hidden" id="'.$this->action.'" name="'.$this->action.'" value="' . wp_create_nonce($this->action) . '" />';
        return $nonce_field;
    }

    /**
    * Verifies the nonce using wp_verify_nonce
    * @return bool
    */
    public function verify() {
        $retrieved_nonce = $_POST['_wpnonce'];
        return (bool) wp_verify_nonce($retrieved_nonce, $this->action);
    }

}

?>
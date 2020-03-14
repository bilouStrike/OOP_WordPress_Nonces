<?php
declare(strict_types=1);

namespace WpOriented\WpNonnes;

class NonceValidator
{
    public function isValid($nonce)
    {
        return $nonce->verify();
    }
}

?>
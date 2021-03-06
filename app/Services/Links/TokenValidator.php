<?php

namespace App\Services\Links;

use App\Exceptions\TokenAccessException;

/**
 * Class TokenValidator
 * @package App\Services\Links
 */
class TokenValidator
{
    /**
     * @param Token $token
     * @return bool
     * @throws TokenAccessException
     */
    public function validate(Token $token) {
        return password_verify($token->getOriginal(), $token->getHash());
    }
}

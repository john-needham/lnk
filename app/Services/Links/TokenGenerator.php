<?php

namespace App\Services\Links;

use App\Exceptions\InkException;
use App\Exceptions\TypeException;
use App\Link;
use Exception;
use Ramsey\Uuid\Uuid;

class TokenGenerator
{
    /**
     * @return Token
     * @throws Exception
     */
    public function generateToken() :  Token {
        $uuid = Uuid::uuid4();
        return new Token(
            password_hash($uuid, PASSWORD_DEFAULT),
            $uuid
        );
    }
}

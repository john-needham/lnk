<?php

namespace Tests\Unit\Services\Links;

use App\Exceptions\TokenAccessException;
use App\Services\Links\Token;
use PHPUnit\Framework\TestCase;

class TokenTest extends TestCase
{
    /**
     * @param $hash
     * @param null $original
     * @return Token
     */
    protected function getToken($hash, $original = null)
    {
        return new Token($hash, $original);
    }

    /**
     * @throws \Exception
     */
    public function testGetters()
    {
        $hash = 'hash';
        $original = 'original';

        $token = $this->getToken('hash', 'original');
        $this->assertEquals($hash, $token->getHash());
        $this->assertEquals($original, $token->getOriginal());
    }


    /**
     * When we try to get the original when its not set, we throw an exception.
     */
    public function testOriginalException()
    {
        $token = $this->getToken('hash');
        $this->expectException(TokenAccessException::class);
        $token->getOriginal();
    }
}

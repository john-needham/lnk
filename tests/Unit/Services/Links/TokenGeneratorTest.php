<?php

namespace Tests\Unit\Services\Links;

use App\Services\Links\Token;
use App\Services\Links\TokenGenerator;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class TokenGeneratorTest extends TestCase
{
    /**
     * @return TokenGenerator
     */
    protected function getService()
    {
        return new TokenGenerator();
    }

    /**
     * @throws \Exception
     */
    public function testGenerate()
    {
        $token = $this->getService()->generateToken();
        $this->assertInstanceOf(Token::class, $token);
    }

    /**
     * @throws \Exception
     */
    public function testValidToken()
    {
        $token = $this->getService()->generateToken();
        $this->assertTrue(Uuid::isValid($token->getOriginal()));
        $this->assertTrue(
            password_verify($token->getOriginal(), $token->getHash())
        );
    }
}

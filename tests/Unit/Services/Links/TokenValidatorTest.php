<?php

namespace Tests\Unit\Services\Links;

use App\Services\Links\Token;
use App\Services\Links\TokenValidator;
use App\Services\Links\UidGenerator;
use Mockery as M;
use PHPUnit\Framework\TestCase;

class TokenValidatorTest extends TestCase
{
    /**
     * @return TokenValidator
     */
    protected function getService()
    {
        return new TokenValidator();
    }

    /**
     * @throws \Exception
     */
    public function testCorrectValidation()
    {
        $original = 'some random string';
        $hash = password_hash($original, PASSWORD_DEFAULT);

        $token = M::mock(Token::class);
        $token->shouldReceive('getOriginal')
            ->andReturn($original);
        $token->shouldReceive('getHash')
            ->andReturn($hash);

        $result = $this->getService()->validate($token);
        $this->assertTrue($result);
    }

    /**
     * @throws \App\Exceptions\TokenAccessException
     */
    public function testIncorrectValidation()
    {
        $original = 'some random string';
        $hash = password_hash($original . 'breaker', PASSWORD_DEFAULT);

        $token = M::mock(Token::class);
        $token->shouldReceive('getOriginal')
            ->andReturn($original);
        $token->shouldReceive('getHash')
            ->andReturn($hash);

        $result = $this->getService()->validate($token);
        $this->assertFalse($result);
    }
}

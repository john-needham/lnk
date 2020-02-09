<?php

namespace Tests\Unit\Repositories;

use App\Exceptions\ModelParametersException;
use App\Link;
use App\Repositories\LinkRepository;
use App\Services\Links\Token;
use App\Services\Links\TokenGenerator;
use App\Services\Links\UidGenerator;
use Mockery as M;
use PHPUnit\Framework\TestCase;

class LinkRepositoryTest extends TestCase
{
    /**
     * @param null $uid
     * @param $hash
     * @param null $token
     * @return LinkRepository
     */
    protected function getRepo($uid = null, $hash, $token = null)
    {
        $modelMock = M::mock(Link::class);
        $modelMock->shouldReceive('create')
            ->andReturn(new Link());

        $tokenMock = M::mock(Token::class);
        $tokenMock->shouldReceive('getHash')
            ->andReturn($hash);

        $tokenMock->shouldReceive('getOriginal')
            ->andReturn($token);

        $uidGen = M::mock(UidGenerator::class);
        $uidGen->shouldReceive('generate')
            ->andReturn($uid);

        $tokenGen = M::mock(TokenGenerator::class);
        $tokenGen->shouldReceive('generateToken')
            ->andReturn($tokenMock);

        $repo = new LinkRepository(
            $modelMock,
            $uidGen,
            $tokenGen
        );
        return $repo;
    }

    /**
     * @return void
     * @throws \App\Exceptions\InkException
     * @throws \App\Exceptions\ModelParametersException
     */
    public function testSimpleCreate()
    {
        $repo = $this->getRepo('uid', 'hash');
        $result = $repo->create([
            'url' => 'http://example.com'
        ]);
        $this->assertInstanceOf(Link::class, $result);
    }

    /**
     * @return array
     */
    public function invalidDataProvider()
    {
        return [
            'invalid url' => [
                'params' => [
                    'url' => 'not a url'
                ],
                'exception' => ModelParametersException::class
            ],
            'null url' => [
                'params' => [
                    'url' => null
                ],
                'exception' => ModelParametersException::class
            ],
            'no params' => [
                'params' => [],
                'exception' => ModelParametersException::class
            ],
        ];
    }

    /**
     * @dataProvider invalidDataProvider
     * @throws \App\Exceptions\InkException
     * @throws \App\Exceptions\ModelParametersException
     */
    public function testInvalidUrl($params, $exception)
    {
        $this->expectException($exception);

        $repo = $this->getRepo('uid', 'hash');
        $result = $repo->create($params);
    }
}

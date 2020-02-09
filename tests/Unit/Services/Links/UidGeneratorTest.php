<?php

namespace Tests\Unit\Services\Links;

use App\Exceptions\ModelParametersException;
use App\Link;
use App\Repositories\LinkRepository;
use App\Services\Links\Token;
use App\Services\Links\TokenGenerator;
use App\Services\Links\UidGenerator;
use Mockery as M;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class UidGeneratorTest extends TestCase
{
    /**
     * @return UidGenerator
     */
    protected function getService()
    {
        return new UidGenerator();
    }

    /**
     * @throws \Exception
     */
    public function testGenerate()
    {
        $uid = $this->getService()->generate();
        $this->assertIsString($uid);
        $this->assertEquals(UidGenerator::UID_LENGTH, strlen($uid));

        // must be a valid uid, alpha numeric only
        $this->assertRegExp('/[a-z0-9]*/i', $uid);
    }
}

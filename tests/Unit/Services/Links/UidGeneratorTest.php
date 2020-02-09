<?php

namespace Tests\Unit\Services\Links;

use App\Services\Links\UidGenerator;
use PHPUnit\Framework\TestCase;

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

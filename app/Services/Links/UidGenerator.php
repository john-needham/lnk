<?php

namespace App\Services\Links;

use App\Exceptions\InkException;
use App\Exceptions\TypeException;
use App\Link;
use Exception;
use Ramsey\Uuid\Uuid;

class UidGenerator
{
    const UID_LENGTH = 6;

    /**
     * @return string
     * @throws InkException
     */
    public function generate() {
        try {
            $uuid = str_replace('-', '', Uuid::uuid4());
        } catch (Exception $e) {
            throw new InkException('Exception creating UUID', $e->getCode(), $e);
        }

        // shorten to desired length
        $uid = substr($uuid, 0, self::UID_LENGTH);

        if(!is_string($uid)) {
            throw new TypeException('Invalid uid');
        }

        return $uid;
    }
}

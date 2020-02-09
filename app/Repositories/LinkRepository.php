<?php

namespace App\Repositories;

use App\Link;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

/**
 * Class LinkRepository
 * @package App\Repositories
 */
class LinkRepository
{
    /**
     * @var EloquentRepository
     */
    private $repo;

    public function __construct(EloquentRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * @param Request $url
     * @return Link
     * @throws \Exception
     */
    public function createLink($url) : Link
    {
        $code = str_replace('-', '', Uuid::uuid4());
        $token = Uuid::uuid4();
        $tokenHash = password_hash($token, PASSWORD_DEFAULT);
        /** @var Link $model */
        $model = $this->repo->create([
            'token_hash' => $tokenHash,
            'uid' => substr($code, 0, Link::UID_LENGTH),
            'url' => $url
        ]);
        $model->setToken($token);
        return $model;
    }
}

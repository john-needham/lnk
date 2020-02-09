<?php

namespace App\Repositories;

use App\Exceptions\ModelParametersException;
use App\Link;
use App\Services\Links\TokenGenerator;
use App\Services\Links\UidGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Ramsey\Uuid\Uuid;

/**
 * Class LinkRepository
 * @package App\Repositories
 */
class LinkRepository implements ModelRepositoryInterface
{
    /**
     * @var Link
     */
    private $model;
    /**
     * @var UidGenerator
     */
    private $uidGenerator;
    /**
     * @var TokenGenerator
     */
    private $tokenGenerator;

    /**
     * LinkRepository constructor.
     * @param Link $model
     * @param UidGenerator $uidGenerator
     * @param TokenGenerator $tokenGenerator
     */
    public function __construct(
        Link $model,
        UidGenerator $uidGenerator,
        TokenGenerator $tokenGenerator
    )
    {
        $this->model = $model;
        $this->uidGenerator = $uidGenerator;
        $this->tokenGenerator = $tokenGenerator;
    }

    /**
     * @param array $data
     * @return Link
     * @throws ModelParametersException
     * @throws \App\Exceptions\InkException
     * @throws \Exception
     */
    public function create(array $data = []) : Link
    {
        $url = Arr::get($data, 'url');
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            throw new ModelParametersException('Invalid URL for link');
        }

        /**
         * Generate simple auth token
         */
        $token = $this->tokenGenerator->generateToken();

        /** @var Link $model */
        $model = $this->model->create([
            'token_hash' => $token->getHash(),
            'uid' => $this->uidGenerator->generate(),
            'url' => $url
        ]);
        $model->setToken($token);
        return $model;
    }
}

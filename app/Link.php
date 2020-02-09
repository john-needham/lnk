<?php

namespace App;

use GuzzleHttp\Psr7\Uri;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
use Psr\Http\Message\UriInterface;

/**
 * Class link
 * @package App
 * @property string token_hash
 * @property string uid
 * @property UriInterface url
 * @property UriInterface Shortlink
 */
class Link extends Model
{
    const UID_LENGTH = 6;

    /**
     * Set primary key as uid
     */
    protected $primaryKey = 'uid';
    /**
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Stop casting key
     */
    public $incrementing = false;

    protected $attributes = [
        'uid' => null,
        'token_hash' => null,
        'url' => null
    ];

    protected $fillable = [
        'uid',
        'token_hash',
        'url'
    ];

    protected $token = null;

    /**
     * @param string $url
     * @return UriInterface
     */
    public function getUrlAttribute(string $url) : UriInterface {
        return new Uri($url);
    }

    /**
     * @return UriInterface
     */
    public function getShortlinkAttribute() : UriInterface {
        // redirect
        return new Uri(route('redirect', ['link' => $this->uid]));
    }

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'uid';
    }

    /**
     * @return null
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param null $raw_token
     */
    public function setToken($token): void
    {
        $this->token = $token;
    }
}

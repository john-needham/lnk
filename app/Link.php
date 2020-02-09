<?php

namespace App;

use App\Services\Links\Token;
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
 * @method static create(array $array)
 */
class Link extends Model
{
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
     * @return Token
     */
    public function getToken() : Token
    {
        /**
         * Return if defined
         */
        if(!is_null($this->token)) {
            return $this->token;
        }
        return new Token($this->token_hash);
    }

    /**
     * @param Token $token
     */
    public function setToken(Token $token): void
    {
        $this->token = $token;
    }
}

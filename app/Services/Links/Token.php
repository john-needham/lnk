<?php


namespace App\Services\Links;


use App\Exceptions\TokenAccessException;

class Token
{
    /**
     * @var string
     */
    protected $original = null;

    /**
     * @var string
     */
    protected $hash = null;

    /**
     * Token constructor.
     * @param string $hash
     * @param string|null $original
     */
    public function __construct(string $hash, string $original = null)
    {
        $this->hash = $hash;
        $this->original = $original;
    }

    /**
     * @return string
     * @throws TokenAccessException
     */
    public function getOriginal(): string
    {
        if(is_null($this->original)) {
            throw new TokenAccessException('Attempting to access token when not defined');
        }
        return $this->original;
    }

    /**
     * @param string $token
     * @return $this
     */
    public function setOriginal(string $token): self
    {
        $this->original = $token;
        return $this;
    }

    /**
     * @return string
     */
    public function getHash(): string
    {
        return $this->hash;
    }

    /**
     * @param string $hash
     * @return $this
     */
    public function setHash(string $hash): self
    {
        $this->hash = $hash;
        return $this;
    }

    /**
     * This will always resolve the token as a strong in its hashed form
     * @return string
     */
    public function __toString()
    {
        return $this->getHash();
    }
}

<?php

namespace App\Policies;

use App\Link;
use App\Services\Links\Token;
use App\Services\Links\TokenValidator;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Http\Request;

class LinkPolicy
{
    use HandlesAuthorization;

    /**
     * @var Request
     */
    private $request;
    /**
     * @var TokenValidator
     */
    private $validator;

    /**
     * No user model, url has token
     *
     * LinkPolicy constructor.
     * @param Request $request
     * @param TokenValidator $validator
     */
    public function __construct(Request $request, TokenValidator $validator)
    {
        $this->request = $request;
        $this->validator = $validator;
    }

    /**
     * Determine whether the user can view any links.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(?User $user)
    {
        return false;
    }

    /**
     * @param User|null $user
     * @param Link|null $link
     * @return bool
     * @throws \App\Exceptions\TokenAccessException
     */
    public function view(?User $user = null, ?Link $link = null)
    {
        // validate the request token against the model
        return $this->validator->validate(new Token(
            $link->token_hash,
            $this->request->token
        ));
    }

    /**
     * Determine whether the user can create links.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(?User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the link.
     *
     * @param  \App\User  $user
     * @param  \App\Link  $link
     * @return mixed
     */
    public function update(?User $user = null, Link $link)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the link.
     *
     * @param  \App\User  $user
     * @param  \App\Link  $link
     * @return mixed
     */
    public function delete(?User $user, Link $link)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the link.
     *
     * @param  \App\User  $user
     * @param  \App\Link  $link
     * @return mixed
     */
    public function restore(?User $user, Link $link)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the link.
     *
     * @param  \App\User  $user
     * @param  \App\Link  $link
     * @return mixed
     */
    public function forceDelete(?User $user, Link $link)
    {
        return false;
    }
}

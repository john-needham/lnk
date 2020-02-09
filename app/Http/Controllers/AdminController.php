<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Link;
use App\Repositories\LinkRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * @var LinkRepository
     */
    private $repository;

    /**
     * @param Link $link
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function view(AdminRequest $request, Link $link)
    {
        return view('admin.index', ['link' => $link]);
    }
}

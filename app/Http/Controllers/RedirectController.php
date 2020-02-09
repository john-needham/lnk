<?php

namespace App\Http\Controllers;

use App\Link;
use App\Repositories\LinkRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class RedirectController extends Controller
{
    /**
     * @param Link $link
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function redirect(Link $link)
    {
        return redirect($link->url);
    }
}

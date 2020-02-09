<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLinkRequest;
use App\Repositories\LinkRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IndexController extends Controller
{
    /**
     * @var LinkRepository
     */
    private $repository;

    public function __construct(LinkRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request)
    {
        return view('home.index');
    }

    /**
     * @param CreateLinkRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function create(CreateLinkRequest $request)
    {
        // todo: where should this live? :thinking:
        $model = $this->repository->createLink($request->post('url'));

        return redirect()->route('view', [
            'link' => $model->uid,
            'token' => $model->getToken()
        ]);
    }
}

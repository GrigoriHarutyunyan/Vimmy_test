<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequset;
use App\Services\Posts\PostsServiceInterface;
use App\Services\Users\UsersServiceInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    private UsersServiceInterface $usersService;
    private PostsServiceInterface $postsService;

    /**
     * @param UsersServiceInterface $usersService
     * @param PostsServiceInterface $postsService
     */
    public function __construct(UsersServiceInterface $usersService, PostsServiceInterface $postsService){

        $this->usersService = $usersService;
        $this->postsService = $postsService;
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function showUserPosts($id): View|Factory|Application
    {
        $userPosts = $this->usersService->getAllUserPosts($id);
        return view('posts.user_post', compact('userPosts'));
    }

    /**
     * @return Application|Factory|View
     */
    public function authUserPosts(): View|Factory|Application
    {
        $id = auth()->user()->id;
        $userPosts = $this->usersService->getAllUserPosts($id);
        return view('/dashboard', compact('userPosts'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('posts.create');
    }

    /**
     * @param PostRequset $request
     * @return RedirectResponse
     */
    public function store(PostRequset $request): RedirectResponse
    {
        $data = $request->only('content');
        $this->postsService->savePost($data);
        return redirect()->route('dashboard')->with('success', 'Цитата успешно сохранена.');
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id): View|Factory|Application
    {
        $post = $this->postsService->getPostById($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * @param PostRequset $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(PostRequset $request, $id): RedirectResponse
    {
        $data = $request->only('content');
        $this->postsService->updatePost($data, $id);
        return redirect()->route('dashboard')->with('success', 'Цитата успешно изменена.');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $this->postsService->deletePost($id);
        return redirect()->route('dashboard')->with('success', 'Цитата успешно удалена.');

    }
}

<?php

namespace App\Http\Controllers;

use App\Services\Users\UsersServiceInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    private UsersServiceInterface $usersService;

    /**
     * @param UsersServiceInterface $usersService
     */
    public function __construct(UsersServiceInterface $usersService)
    {
        $this->usersService = $usersService;
    }


    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $usersPost = $this->usersService->showAllLastPosts();
        return view('welcome', compact('usersPost'));
    }


}

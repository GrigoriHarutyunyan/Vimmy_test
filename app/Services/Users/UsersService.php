<?php

namespace App\Services\Users;

use App\Repositories\Users\UsersRepositoryInterface;

class UsersService implements UsersServiceInterface
{
    private UsersRepositoryInterface $usersRepository;

    /**
     * @param UsersRepositoryInterface $usersRepository
     */
    public function __construct(UsersRepositoryInterface $usersRepository){

        $this->usersRepository = $usersRepository;
    }

    /**
     * @return mixed
     */
    public function showAllLastPosts(): mixed
    {
        return $this->usersRepository->showAllLastPosts();
    }


    /**
     * @param $id
     * @return mixed
     */
    public function getAllUserPosts($id): mixed
    {
        return $this->usersRepository->getAllUserPosts($id);
    }
}

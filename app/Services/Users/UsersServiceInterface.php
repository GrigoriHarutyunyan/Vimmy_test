<?php

namespace App\Services\Users;

interface UsersServiceInterface
{
    /**
     * @return mixed
     */
    public function showAllLastPosts(): mixed;

    /**
     * @param $id
     * @return mixed
     */
    public function getAllUserPosts($id): mixed;
}

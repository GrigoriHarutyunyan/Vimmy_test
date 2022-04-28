<?php

namespace App\Repositories\Users;

interface UsersRepositoryInterface
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

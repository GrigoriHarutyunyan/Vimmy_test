<?php

namespace App\Repositories\Users;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class UsersRepository implements UsersRepositoryInterface
{
    /**
     * @return string
     */
    public function model(): string
    {
        return User::class;
    }

    /**
     * @return mixed
     */
    public function showAllLastPosts(): mixed
    {
        return $this->model()::with(['posts' => function($q){
            $q->latest();
        }])->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getAllUserPosts($id): mixed
    {
        return $this->model()::where('id', $id)->with(['posts' => function($q){
            $q->latest();
        }])->get();
    }
}

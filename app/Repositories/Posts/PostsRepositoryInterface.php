<?php

namespace App\Repositories\Posts;

interface PostsRepositoryInterface
{
    /**
     * @param $data
     * @return mixed
     */
    public function savePost($data): mixed;

    /**
     * @param $id
     * @return mixed
     */
    public function getPostById($id): mixed;

    /**
     * @param $data
     * @param $id
     * @return mixed
     */
    public function updatePost($data, $id): mixed;

    /**
     * @param $id
     * @return mixed
     */
    public function deletePost($id): mixed;
}

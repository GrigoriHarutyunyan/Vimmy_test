<?php

namespace App\Services\Posts;

interface PostsServiceInterface
{
    public function savePost($data);

    public function  getPostById($id);

    public function updatePost($data, $id);

    public function deletePost($id);
}

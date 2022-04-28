<?php

namespace App\Services\Posts;

use App\Repositories\Posts\PostsRepositoryInterface;

class PostsService implements PostsServiceInterface
{
    private PostsRepositoryInterface $postsRepository;

    /**
     * @param PostsRepositoryInterface $postsRepository
     */
    public function __construct(PostsRepositoryInterface $postsRepository){

        $this->postsRepository = $postsRepository;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function savePost($data): mixed
    {
        return $this->postsRepository->savePost($data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getPostById($id): mixed
    {
        return $this->postsRepository->getPostById($id);
    }

    /**
     * @param $data
     * @param $id
     * @return mixed
     */
    public function updatePost($data, $id): mixed
    {
        return $this->postsRepository->updatePost($data, $id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deletePost($id): mixed
    {
        return $this->postsRepository->deletePost($id);
    }
}

<?php

namespace App\Repositories\Posts;

use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostsRepository implements PostsRepositoryInterface
{
    /**
     * @return string
     */
    public function model(): string
    {
        return Post::class;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function savePost($data): mixed
    {
        DB::beginTransaction();
        try{
            $post = $this->model()::create(
                [
                    'content'=> $data['content'],
                    'user_id' => auth()->user()->id,
                ]);
            DB::commit();
            return $post;
        }catch (\Exception $e){
            DB::rollBack();
            return $e->getMessage();
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getPostById($id): mixed
    {
        return $this->model()::where('id', $id)->first();
    }

    public function updatePost($data, $id)
    {
        $post = $this->getPostById($id);
        DB::beginTransaction();
        try{
            $post->update(
                [
                    'content'=> $data['content'],
                ]);
            DB::commit();
            return $post;
        }catch (\Exception $e){
            DB::rollBack();
            return $e->getMessage();
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deletePost($id): mixed
    {
        return $this->getPostById($id)->delete();
    }
}

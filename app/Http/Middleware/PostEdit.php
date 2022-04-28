<?php

namespace App\Http\Middleware;

use App\Models\Post;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostEdit
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param  Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next): Response|RedirectResponse
    {
        $id = (int) $request->route()->parameters()['id'];
        $user_id = Post::find($id)->user_id;
        if (auth()->user()->id == $user_id){
            return $next($request);
        }
        return redirect()->back();

    }
}

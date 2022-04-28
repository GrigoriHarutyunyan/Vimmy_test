<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @if(session()->has('success'))
        <div style="background: green" role="alert">
            {{session()->get('success') }}
        </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div style="display: flex; justify-content: flex-end">
                        <a href="{{route('post.create')}}">
                            <b>Добавить цитату</b>
                        </a>
                    </div>
                    @foreach($userPosts as $userPost)
                        <h1>Автор: {{$userPost->name}}</h1><br>

                        Цитаты:  <br>

                        @if($userPost->posts->isEmpty())
                            <p><b>У пользователя нет цитат</b></p>
                        @else
                            @foreach($userPost->posts as $post)
                                <br>
                                <p style="word-break:break-word">{{$post->content}}</p>
                                <p>Дата: {{$post->created_at}} </p>
                                <div style="display: flex;justify-content:flex-end;">
                                    <form action="{{route('post.destroy', ['id' => $post->id])}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="delete" style="padding-right:15px;">Удалить</button>
                                    </form>
                                    <a href="{{route('post.edit', ['id'=>$post->id])}}">Изменить</a>
                                </div>
                                <hr style="border:1px solid black">
                            @endforeach
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    a:hover, .delete:hover {
        color: #2563eb;
    }
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Обовить цитату
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @error('content')
                    <div style="color: red">{{ $errors->first('content') }}</div>@enderror
                    <form action="{{route('post.update', ['id'=>$post->id])}}" method='post'>
                        @csrf
                        @method('PUT')
                        <label for="content" style="display: flex; flex-direction: column">Цитата:</label>
                        <textarea id="content" style="width: 500px; height: 150px" name="content"
                                  class="@error('content') is-invalid @enderror">{{$post->content}}</textarea>
                        <br>
                        <input type="submit" title="Сохранить" style="background: grey; padding: 10px"
                               value="Сохранить">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<style>
    a:hover {
        color: #2563eb;
    }

    input {
        cursor: pointer;
    }

    .is-invalid {
        border: 1px solid red;
    }
</style>


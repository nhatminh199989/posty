@extends('layout.app')

@section('content')
    <div class="flex justify-center">
        <div class="p-6 w-8/12 bg-white rounded-lg">
            <form action="{{route('posts')}}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="body" class="sr-only">Body</label>
                    <textarea name="body" id="body" cols="30" rows="10" value=""
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg 
                    @error('body') border-red-500 @enderror"
                    placeholder="Post something !"
                    ></textarea>

                    @error('body')
                        <div class="text-red-500 mt-2 text-sm">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded 
                    font-medium">Post</button>
                </div>
            </form>

            <div class="mt-10">
                @if($posts->count())
                
                @foreach ($posts as $post)
                    <x-post :post="$post"/>
                @endforeach
                
                @else
                    <p>There are no posts</p>
                @endif

                {{$posts->links()}}
            </div>
        </div>
    </div>  
@endsection
@extends('layouts.app')

@section('content')
    <div class="container px-4 mt-16">
        <h5 class="text-lg font-semibold">All Posts</h5>
        <div class="mt-4">
            <ul class="p-4 mb-4">
            @foreach(\App\Models\Post::all()->reverse() as $post)
                <li class="shadow-md p-2 bg-slate-100 rounded-md mb-2 border-gray-600">
                    <a href="/post/{{ $post->id }}">
                        <p class="text-2xl font-bold mb-2">{{ $post->title }}</p>
                        <div class="text-gray-800">{{ Str::limit(html_entity_decode(strip_tags($post->body)), 50) }}</div>
                    </a>
                    @if (auth()->check() && auth()->user()->role == "admin")
                    <div class="flex justify-end items-center gap-4 mt-1">
                        <a href="/post/delete/{{ $post->id }}" class="py-1 px-3 bg-red-500 text-white hover:bg-red-600 focus:bg-red-700 rounded-md">Delete</a>
                        <a href="/post/edit/{{ $post->id }}" class="py-1 px-3 bg-blue-500 text-white hover:bg-blue-600 focus:bg-blue-700 rounded-md">Edit</a>
                    </div>
                    @endif
                </li>
            @endforeach
            </ul>
        </div>
    </div>
@endsection
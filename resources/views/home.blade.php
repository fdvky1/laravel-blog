@extends('layouts.app')

@section('content')
    <div class="container px-4 mt-16">
        <h5 class="text-lg font-semibold">Latest Posts</h5>
        <div class="mt-4">
            <ul class="p-4 mb-4">
            @foreach(\App\Models\Post::take(5)->get() as $post)
                <li class="shadow-md p-2 bg-slate-100 rounded border-gray-600">
                    <a href="/post/{{ $post->id }}">
                        <p class="text-2xl font-bold mb-2">{{ $post->title }}</p>
                        <div class="text-gray-800">{{ Str::limit(html_entity_decode(strip_tags($post->body)), 100) }}</div>
                    </a>
                </li>
            @endforeach
            </ul>
            <a href="/blogs" class="text-white bg-gray-600 py-2 px-4 rounded-md">All Posts</a>
        </div>
    </div>
@endsection
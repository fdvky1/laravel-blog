<div>
    <div class="container mx-auto mt-8 pb-16">
        <h1 class="text-2xl font-bold text-gray-600 mb-4">{{ $post->title }}</h1>
        <article class="prose lg:prose-xl xl:prose-2xl mx-auto">
            {!! $post->body !!}
        </article>
    </div>
</div>
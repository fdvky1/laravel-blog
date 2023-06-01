<div>
    <div class="container mx-auto px-4 pb-16">
        <h1 class="text-4xl mt-6 tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">Create Post</h1>
        <p class="text-lg mt-2 text-gray-600">Start crafting your new post below.</p>
        <div wire:ignore class="space-y-8 divide-y divide-gray-200 w-full mt-10">

                @if ($message = Session::get('saved'))
                <div class="rounded-md bg-green-100 rounded-lg p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-green-800">Successfully Saved Post</h3>
                            <div class="mt-2 text-sm text-green-700">
                                <p>Your new post has been saved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <form wire:submit.prevent="savePost">
                <div class="sm:col-span-6">
                    <label for="title" class="block text-sm font-medium text-gray-700">
                        Post Title
                    </label>
                    <div class="mt-1">
                        <input id="title" wire:model.lazy="post.title" name="title" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                    </div>
                </div>
                <div class="sm:col-span-6 pt-5 mb-4">
                    <label for="body" class="block text-sm font-medium text-gray-700">Content</label>
                    <div class="mt-1">
                        @php $wysiwygFieldName = 'body'; @endphp
                        @include('includes.wysiwyg')
                    </div>
                </div>
                <button class="inline-flex justify-center px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-gray-500 border border-transparent rounded-md hover:bg-gray-700 focus:outline-none active:bg-gray-800 cursor-pointer" type="submit">Submit Post</button>
            </form>
        </div>
    </div>
</div>
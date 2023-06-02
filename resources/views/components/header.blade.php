<header class="text-gray-700 body-font border-b">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <nav class="flex lg:w-2/5 flex-wrap items-center text-base md:ml-auto">
            <a href="/" class="mr-5 hover:text-gray-900">Home</a>
            <a href="/blogs" class="mr-5 hover:text-gray-900">Blogs</a>
            <a href="/about" class="mr-5 hover:text-gray-900">About</a>
            @if (auth()->check())
            <a href="/post/create" class="mr-5 hover:text-gray-900">Create</a>
            <a href="/logout" class="hidden md:block items-center bg-gray-500 border-0 py-1 px-3 focus:outline-none hover:bg-gray-600 rounded text-base text-white">Logout</a>
            @else
            <a href="/login" class="items-center bg-gray-500 border-0 py-1 px-3 focus:outline-none hover:bg-gray-600 rounded text-base text-white">Login</a>
            @endif
        </nav>
        <a class="flex order-first lg:w-1/5 title-font font-bold items-center text-gray-900 lg:items-center lg:justify-center mb-4 md:mb-0">
            BLOG
        </a>
        @if (auth()->check())
        <a href="/logout" class="md:hidden mt-2 items-center bg-gray-500 border-0 py-1 px-3 focus:outline-none hover:bg-gray-600 rounded text-base text-white">Logout</a>
        @endif
    </div>
</header>
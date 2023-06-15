<header id="header-wrap" class="relative mb-20">     
    <div class="navigation fixed top-0 left-0 w-full z-30 duration-300">
        <div class="container">
            <nav class="navbar py-2 navbar-expand-lg flex justify-between items-center relative duration-300">
                <a class="navbar-brand" href="/">
                BLOG
                </a>
                <button class="navbar-toggler focus:outline-none block lg:hidden" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="toggler-icon"></span>
                    <span class="toggler-icon"></span>
                    <span class="toggler-icon"></span>
                </button>

                <div class="navbar-collapse hidden lg:block duration-300 shadow absolute top-100 left-0 mt-full bg-white z-20 px-5 py-3 w-full lg:static lg:bg-transparent lg:shadow-none" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto justify-center items-center lg:flex">
                        <li class="nav-item">
                        <a class="page-scroll" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="page-scroll" href="/blogs">Blogs</a>
                        </li>
                        <li class="nav-item">
                        <a class="page-scroll" href="/about">About</a>
                        </li>
                        @if (auth()->check())
                        @if (auth()->user()->role == "admin")
                        <li class="nav-item">
                        <a class="page-scroll" href="/post/create">Create</a>
                        </li>
                        @endif
                        <li class="nav-item">
                        <a class="page-scroll md:hidden" href="/logout">Logout</a>
                        </li>
                        @else
                        <li class="nav-item">
                        <a class="page-scroll md:hidden" href="/login">Login</a>
                        </li>
                        @endif
                    </ul>
                </div>
                @if (auth()->check())
                <div class="header-btn hidden sm:block sm:absolute sm:right-0 sm:mr-16 lg:static lg:mr-0">
                <a class="text-gray-700 border border-gray-700 px-10 py-3 rounded-full duration-300 hover:bg-gray-800 hover:text-white" href="/logout">LOGOUT</a>
                </div>
                @else
                <div class="header-btn hidden sm:block sm:absolute sm:right-0 sm:mr-16 lg:static lg:mr-0">
                <a class="text-gray-700 border border-gray-700 px-10 py-3 rounded-full duration-300 hover:bg-gray-800 hover:text-white" href="/login">LOGIN</a>
                </div>
                @endif
            </nav>
        </div>
    </div>
</header>
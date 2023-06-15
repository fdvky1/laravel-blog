<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield('title', 'Laravel Blog')</title>
    @if (Route::is('create') || Route::is('edit') || Route::is('post') )
    <script src="https://cdn.tiny.cloud/1/fh7b2wktxgatxap1e2orlpc26snv3w690y9j2kieg7sb0p1f/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    @endif
    @vite('resources/css/app.css')
    @if (Route::is('post'))
        <link href="{{ asset('css/unreset.min.css') }}" rel="stylesheet">
        <style>
            code {
            font-family: 'Courier New', Courier, monospace;
            color: #333;
            background-color: #f5f5f5;
            padding: 2px 4px;
            border-radius: 4px;
            }
            table{
                border: 1px;
                border-style: solid;
                border-collapse: collapse;
            }
            table td{
                border: 1px;
                border-style: solid;
                border-collapse: collapse;
            }
        </style>
    @endif
    @livewireStyles
</head>
<body class="bg-gray-200 w-full">
    <x-header></x-header>
    @yield('content')
    @livewireScripts
    <script>
        window.onscroll = function () {
        var header_navbar = document.querySelector(".navigation");
        var sticky = header_navbar.offsetTop;
            if (window.pageYOffset > sticky) {
            header_navbar.classList.add("sticky");
            } else {
            header_navbar.classList.remove("sticky");
            }
        }
        const navbarToggler = document.querySelector(".navbar-toggler");
        const navbarCollapse = document.querySelector(".navbar-collapse");

        navbarToggler.addEventListener('click', function () {
            navbarToggler.classList.toggle("active");
            navbarCollapse.classList.toggle('hidden')
        })
    </script>
</body>
</html>
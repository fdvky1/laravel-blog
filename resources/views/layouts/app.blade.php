<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel Blog')</title>
    @if (Route::is('create') || Route::is('edit') || Route::is('post') )
    <script src="https://cdn.tiny.cloud/1/fh7b2wktxgatxap1e2orlpc26snv3w690y9j2kieg7sb0p1f/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    @endif
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="bg-gray-200">
    <x-header></x-header>
    @yield('content')
    @livewireScripts
</body>
</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title ?? 'Laravel todolist' }}</title>
    </head>
    <body>
        <div>
            @auth
                Hello, {{Auth::user()->name}}
                <a href="{{ route('logout') }}">logout</a>
            @endauth

            @guest
                <a href="{{ route('login') }}">login</a>
                <a href="{{ route('register') }}">join</a>
            @endguest
        </div>
        <div
            class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @yield('content')
        </div>
    </body>
</html>

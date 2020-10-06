<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="dns-prefetch" href="//rsms.me">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title') - Medialibrary.pro</title>
        <meta name="description" content="Front-end components for spatie/laravel-medialibrary">

        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">

        @include('partials.favicon')
        @include('partials.socialMetaTags')

    </head>
    <body class="flex flex-col min-h-screen font-sans">

         @include('partials.header')

        @yield('content')

        <footer class="flex-1 -mt-32 pt-32 bg-blue-900">
            <p class="py-16 flex justify-around items-center text-white text-xs text-center leading-none font-medium">
                <span class="w-1/2 text-right">
                    <a class="a-border text-blue-300 | hover:text-blue-200" href="https://docs.spatie.be/laravel-medialibrary/">laravel-medialibrary<span class="hidden | sm:inline"> documentation</span></a>
                </span>

                <span class="mx-4 w-2 h-2 rounded-full bg-yellow-300"></span>

                <span class="w-1/2 text-left text-blue-300">
                    Made by <a class="a-border text-blue-300 uppercase tracking-wider | hover:text-blue-200" href="https://spatie.be">spatie</a>
                </span>
            </p>
        </footer>
    </body>
</html>

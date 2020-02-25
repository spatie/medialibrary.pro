<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="dns-prefetch" href="//rsms.me">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title') - Medialibrary.pro</title>
        <meta name="description" content="Front end components for spatie/laravel-medialibrary">

        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">

        @include('partials.favicon')
        @include('partials.socialMetaTags')

    </head>
    <body class="flex flex-col min-h-screen">
        <header class="py-8 flex justify-center">
            <a class="flex flex-col items-center" title="Home" href="/">
                <span class="block h-12 w-12">
                @include('partials.logo')
                </span>
                <h1 class="mt-3 text-xs uppercase tracking-logo leading-tight">
                    Medialibrary
                    <span class="text-red-500">Pro</span>
                </h1>
            </a>
        </header>

        <main class="z-10 flex-1 mx-auto px-8 w-full max-w-4xl bg-red-500 text-white">
            <blockquote class="py-12 font-extrabold text-4xl text-center">
                ‘Boy, I could cry’
            </blockquote>

            <div class="flex pb-32">
                <div class="w-1/2">
                    <h2 class="text-xl text-center font-semibold">Subscribe for updates</h2>
                </div>

                <ul class="w-1/2 text-xl text-right font-semibold">
                    <li class="text-yellow-300">
                        Coming spring 2020
                    </li>
                    <li class="mt-6">
                        Front end components for <span class="whitespace-no-wrap">laravel-medialibrary</span>
                    </li>
                    <li class="mt-6">
                        Includes Vanilla JS, React and Vue components
                    </li>
                    <li class="mt-6">
                        Laravel Vapor support
                    </li>
                </ul>
            </div>
        </main>

        <footer class="-mt-32 pt-32 bg-blue-900">
            <p class="py-16 flex justify-center items-baseline text-white text-xs text-center leading-none">
                <span>
                    <a href="https://spatie.be">laravel-medialibrary on GitHub</a>
                </span>
                <span class="mx-3 text-xl text-yellow-300">•</span>
                <span>
                    © {{ date('Y') }} <a href="https://spatie.be">spatie.be</a>
                </span>
            </p>
        </footer>
    </body>
</html>

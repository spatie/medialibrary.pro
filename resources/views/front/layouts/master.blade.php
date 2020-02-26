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
        <div class="logo-backlight"></div>

        <header class="py-12 flex justify-center">
            <a class="flex flex-col items-center" title="Home" href="/">
                <span class="logo">
                    @include('partials.logo')
                </span>
                <h1 class="mt-3 text-xs uppercase tracking-logo leading-tight font-medium">
                    Medialibrary
                    <span class="text-red-500">Pro</span>
                </h1>
            </a>
        </header>

        <main class="z-10 mt-2 px-4 | sm:px-8 | md:mt-4 md:px-12 | lg:mt-8 lg:px-16">
            <div class="mx-auto w-full max-w-4xl bg-red-500 shadow-logo rounded">
                <div class="🖼">
                    <img loading="eager" srcset="/images/frames-1000.jpg 1000w,
                    /images/frames-750.jpg 750w,
                    /images/frames-500.jpg 500w," sizes="(min-width: 1024px) 540px, (min-width: 640px) 50vw, 100vw" src="/images/frames-1000.jpg" alt="Picture by Andrew Neel | Unsplash">
                </div>

                <blockquote class="z-10 absolute top-0 left-0 w-full h-64 flex items-center justify-center font-bold text-white text-3xl text-center leading-tight | md:text-4xl | lg:text-5xl">
                    <span>
                        Every picture<br>needs a frame
                    </span>
                </blockquote>

                <div class="pt-48 pb-32 | sm:flex | lg:pt-64 lg:pb-48">
                    <div class="px-12 max-w-lg sm:flex flex-col items-center | sm:w-1/2">
                        <div class="max-w-xs w-full">
                            <form action="/subscribe" method="post">
                                <label for="email" class="font-bold text-yellow-300 text-lg leading-snug | lg:text-xl">
                                    {{ session()->has('subscribed')? "Thanks! You'll hear from us soon" : "Subscribe for updates" }}
                                </label>

                                @honeypot
                                @csrf

                                <div class="mt-6 subscribe">
                                    <input placeholder="Your email" class="subscribe-input" type="email" id="email" name="email" required autofocus/>

                                    <button type="submit" class="subscribe-button">
                                        <span class="subscribe-button-icon">-></span>
                                    </button>
                                </div>

                                <div class="mt-6 flex items-baseline text-white text-xs font-medium">
                                    @error('email')
                                        <span class="flex-none mr-2 text-red-500 bg-yellow-300 rounded-full h-6 w-6 inline-flex items-center justify-center font-bold ">!</span>
                                        <span class="opacity-75">{{ $message }}</span>
                                    @else
                                        <span class="opacity-75">Your address will only be used for updates on Medialibrary Pro</span>
                                    @enderror
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="px-12 pt-24 | sm:pt-0 sm:w-1/2 sm:text-right">
                        <ul class="text-lg text-white font-bold leading-snug | lg:text-xl">
                            <li class="text-yellow-300">
                                Coming spring 2020
                            </li>
                            <li class="mt-6">
                                UI elements for <a class="a-border whitespace-no-wrap" href="https://docs.spatie.be/laravel-medialibrary/">spatie/laravel-medialibrary</a>
                            </li>
                            <li class="mt-6">
                                Includes React and Vue <span class="whitespace-no-wrap">renderless components</span>
                            </li>
                            <li class="mt-6">
                                Laravel Vapor support
                            </li>
                            <li class="mt-6">
                                Temporary uploads
                            </li>
                            <li class="mt-6">
                                Tailwind CSS styles
                            </li>
                        </ul>
                        <p class="mt-6 text-white text-xs font-medium opacity-75">
                            This will be a fair-priced add-on. <br>Don't worry, the original Medialibrary will still be free!
                        </p>
                    </div>
                </div>
            </div>
        </main>

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

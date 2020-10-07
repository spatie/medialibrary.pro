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
    <body class="flex flex-col min-h-screen font-sans text-blue-900">

        @yield('content')

        @include('partials.footer')
    </body>
</html>

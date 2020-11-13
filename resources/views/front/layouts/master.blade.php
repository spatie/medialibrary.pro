<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="dns-prefetch" href="//rsms.me">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') - Medialibrary.pro</title>
    <meta name="description" content="Front-end components for spatie/laravel-medialibrary">

    @stack('scripts')

    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    @if($custom ?? false)
    <link href="{{ mix('css/app-custom.css') }}" rel="stylesheet">
    @else
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @endif

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link href="/fontawesome-pro-5.15.1-web/css/all.css" rel="stylesheet">

    <script src="/js/alpine.js" defer></script>
    <script src="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@10.2.1/build/highlight.min.js"></script>
    <script src="https://cdn.paddle.com/paddle/paddle.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            hljs.initHighlightingOnLoad();
        });
    </script>

    @include('partials.favicon')
    @include('partials.socialMetaTags')
</head>
<body class="flex flex-col min-h-screen font-sans text-blue-900">

@if(flash()->message)
    <div
        class="z-50 fixed top-0 right-0 px-6 py-4 font-semibold  {{ flash()->class =='error' ? 'bg-red-500 text-red-100' : 'bg-green-500 text-green-100' }}">
        {{ flash()->message }}
    </div>
@endif

<div>
    @yield('content')
</div>

@include('partials.footer')
</body>
</html>

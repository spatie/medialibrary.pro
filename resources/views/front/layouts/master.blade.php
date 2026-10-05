@use('Spatie\PriceApi\SpatiePriceApi')
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
    @vite('resources/css/app-custom.css')
    @else
    @vite('resources/css/app.css')
    @endif

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link href="{{ asset('fontawesome-pro-5.15.1-web/css/all.css') }}" rel="stylesheet">

    {{ SpatiePriceApi::scripts() }}
    <script src="{{ asset('js/alpine.js') }}" defer></script>
    <script src="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@10.2.1/build/highlight.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            hljs.initHighlightingOnLoad();
        });
    </script>

    @include('partials.referrer')
    @include('partials.favicon')
    @include('partials.socialMetaTags')
</head>
<body class="flex flex-col min-h-screen font-sans text-blue-900">

@yield('flash')

<div>
    @yield('content')
</div>

@include('partials.footer')
</body>
</html>

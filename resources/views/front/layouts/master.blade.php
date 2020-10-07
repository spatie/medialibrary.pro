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
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">

    @include('partials.favicon')
    @include('partials.socialMetaTags')
</head>
<body class="flex flex-col min-h-screen font-sans text-blue-900">

<script>
    window.errors = {!! $errors->isEmpty() ? '{}' : $errors !!};
</script>

@if(flash()->message)
    <div
        class="rounded-sm mb-8 px-4 py-2 {{ flash()->class =='error' ? 'bg-red-100 text-red-500' : 'bg-green-100 text-green-500' }}">
        {{ flash()->message }}
    </div>
@endif

<div id="app">
    @yield('content')
</div>

@include('partials.footer')
</body>
</html>

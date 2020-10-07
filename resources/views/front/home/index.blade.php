@extends('front.layouts.master')

@section('title', 'UI components')

@section('h1')
UI components <br>for
<a class="underline hover:text-yellow-300" href="https://github.com/spatie/laravel-medialibrary">
    laravel-medialibrary
</a>
@endsection

@section('content')

@include('partials.header')

<main>

    @include('partials.pricecard')

    <div class="my-16">
        @include('partials.features')
    </div>

    @include('partials.cta')
</main>

@endsection

@extends('front.layouts.master')

@section('title', 'UI components')

@section('content')

<main>

    @include('partials.pricecard')

    <div class="my-16">
        @include('partials.features')
    </div>

    @include('partials.cta')
</main>

@endsection

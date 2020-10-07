@extends('front.layouts.master')


@section('h1')
    @yield('title')
@endsection

@section('content')


    @include('partials.header', ['compact' => true])    

    <main class="-mt-24 mx-auto max-w-4xl px-4 sm:px-12">
        <section class="py-16 px-4 sm:px-12 border-8 border-blue-300 border-opacity-25 rounded-sm
        markup markup-links markup-lists markup-code markup-tables">
            @yield('article')
        </section>

    </main>
    
    @include('partials.cta')
    
@endsection

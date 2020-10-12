@extends('front.layouts.master')


@section('h1')
    @yield('title')
@endsection

@section('content')


    @include('partials.header', ['compact' => true])    

    <main class="-mt-24 mx-auto max-w-5xl px-4 sm:px-12 flex space-x-8">
        <nav class="bg-blue-50 px-6 py-8">
            <h3 class="text-xs uppercase tracking-wider font-semibold text-blue-400 pb-4">Pick an example</h3>
            <ul class="text-sm leading-loose">
                <li><a href="#" class="font-semibold">Single file upload</a></li>
                <li><a href="#" class="hover:text-red-500">Collection</a></li>
                <li><a href="#">…</a></li>
            </ul>
        </nav>
        <section class="flex-grow py-16 px-4 sm:px-12 border-8 border-blue-300 border-opacity-25 rounded-sm
        markup markup-links markup-lists markup-code markup-tables">
            @yield('demo')
        </section>

    </main>
    
    @include('partials.cta')
    
@endsection

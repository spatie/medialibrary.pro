@extends('front.layouts.master')


@section('h1')
    @yield('title')
@endsection

@section('content')

    @include('partials.header', ['compact' => true])    

    <main class="-mt-8 mx-auto max-w-5xl px-4 sm:px-12 flex items-stretch">
        <div>
            <nav class="sticky top-0 mb-8 -mt-12 -mr-8 bg-blue-50 bg-opacity-50 rounded-sm pl-6 pr-12 py-12 w-64">
                <h3 class="text-xs uppercase tracking-wider font-semibold text-blue-400 pb-4">Pick an example</h3>
                <ul class="markup-ol text-sm grid gap-2">
                    <li><a href="#" class="font-semibold">Attachment</a></li>
                    <li><a href="#" class="hover:text-red-500">Collection</a></li>
                    <li><a href="#">…</a></li>
                </ul>
            </nav>
        </div>
        
        <section class="flex-grow py-16 px-4 sm:pl-24 sm:pr-16 border-8 border-blue-300 border-opacity-25 rounded-sm
        markup markup-links markup-lists">
            @yield('demo')
        </section>

    </main>
    
    @include('partials.cta')
    
@endsection

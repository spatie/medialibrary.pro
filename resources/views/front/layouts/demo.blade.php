@extends('front.layouts.master',['custom' => $custom ?? false])


@section('h1')
    @yield('title')
@endsection

@section('content')

    @include('partials.header', ['compact' => true])

    <main class="-mt-12 md:-mt-8 mx-auto max-w-5xl px-4 sm:px-12 md:flex items-stretch">
        <div>
            <nav class="sticky top-0 mb-8 -mt-12 md:-mr-8 bg-blue-50 bg-opacity-50 rounded-sm pl-6 pr-12 py-12 md:w-64">
                <h3 class="text-xs uppercase tracking-wider font-semibold text-blue-400 pb-4">Pick an example</h3>
                <ul class="markup-ol text-sm grid gap-2">
                    <li><x-navigation-item route="demo-attachment">Attachment</x-navigation-item></li>
                    <li><x-navigation-item route="demo-collection">Collection</x-navigation-item></li>
                    <li><x-navigation-item route="demo-customized-collection">Customized Collection</x-navigation-item></li>

                </ul>
            </nav>
        </div>

        <section class="overflow-x-hidden flex-grow py-16 px-4 sm:px-8 md:pl-24 md:pr-16 border-8 border-blue-300 border-opacity-25 rounded-sm">
            @yield('demo')
        </section>

    </main>

    @include('partials.cta')

@endsection

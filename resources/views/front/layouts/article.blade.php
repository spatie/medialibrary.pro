@extends('front.layouts.master')

@section('content')
<main class="z-10 mt-8 -mb-24">
    <div class="absolute w-full top-0" style="bottom: 4rem">
        @include('front.partials.swooshBottom')
    </div>
    <section class="layout-col">
        <div class="mx-auto grid w-full z-10 shadow-2xl rounded-b overflow-hidden | lg:rounded">
            <div class="block bg-white">
                <div class="markup markup-links markup-lists-alt p-12">
                    @if(flash()->message)
                     <div class="mb-12 alert {{ flash()->class }}">
                            {{ flash()->message }}
                        </div>
                    @endif

                    @yield('article')
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

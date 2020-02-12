@extends('front.layouts.master')

@section('title', 'Laravel video course')

@section('content')

    <div class="absolute top-0 w-full" style="height:50rem">
        @include('front.partials.swooshBottom')
    </div>

    <main class="z-10">
        <section class="layout-col">
            
            @auth
                @if(auth()->user()->canAccessVideos())
                <div class="mt-8 alert alert-info">
                    You already have access to <a href="{{ route('video-course') }}">the video course</a> in your account.
                </div>
                @endif
            @endauth

            @include('front.videos.partials.intro')

            <div class="mx-auto -mt-16 grid w-full max-w-2xl z-10 shadow-2xl rounded-b overflow-hidden | lg:-mt-4 lg:rounded">
                @include('front.videos.partials.priceCard')
            </div>
        </section>

        <section class="py-24">
            <div class="layout-col">
                @include('front.videos.partials.toc')
            </div>
        </section>

        <div class="mt-8 z-10">
            <section class="layout-col">
                @include('front.videos.partials.cta')
            </section>
        </div>

        <section class="pt-24 pb-32 -mb-16">
            @include('front.partials.swooshBottom')

            <div class="layout-col">
                @include('front.videos.partials.outro')
            </div>
        </section>
    </main>

@endsection

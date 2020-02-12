@extends('front.layouts.master')

@section('title', "{$title} - MailCoach Docs")

@section('content')

    <main class="z-10 -mb-16">
        @include('front.partials.swooshBottom')

        <section class="layout-col">
            <div class="py-6 flex -ml-2">
                @include('front.docs.partials.switcher')
            </div>

            <div class="pb-12 grid gap-8 | sm:cols-auto-1fr">
                <div class="sm:pb-16 sm:w-48 md:w-64">
                    <input type="checkbox" class="hidden docs-sidebar-toggle" id="docs-sidebar-toggle">
                    <div class="flex justify-end h-0 z-10 docs-sidebar-button"
                    style="transform: translateY(-4rem)">
                        <label class="cursor-pointer ml-auto sm:hidden"
                            for="docs-sidebar-toggle">
                            <span class="docs-sidebar-button-show button px-0 text-center rounded-full w-10 h-10 bg-white text-black"><i class="fas fa-bars"></i></span>
                            <span class="docs-sidebar-button-hide button px-0 text-center rounded-full w-10 h-10 bg-white text-black"><i class="fas fa-times"></i></span>
                        </label>
                    </div>
                    <div class="docs-sidebar">
                        {{ $navigation->menu()->addClass('docs-menu') }}
                    </div>
                </div>
                <article class="min-w-0">
                    <div class="markup markup-lists markup-links markup-code markup-tables">
                        <div class="flex items-start">
                            <h1 id="{{ \Illuminate\Support\Str::slug($title) }}">
                                {{ $title }} <a href="#{{ \Illuminate\Support\Str::slug($title) }}"></a>
                            </h1>
                            <a href="{{ $gitHubUrl }}" class="flex items-center ml-auto mt-5 pl-4 text-black no-underline" target="_blank">
                                <span class="text-xs whitespace-no-wrap opacity-50 | hover:opacity-75">Edit on</span>
                                <i class="ml-2 text-lg fab fa-github"></i>
                            </a>
                        </div>
                        <div class="docs-content">
                            {!! $content !!}

                        </div>
                    </div>
                    @if($previousUrl || $nextUrl)
                    <div class="grid cols-auto gap-8 my-16 border-t-2 border-dark-50 pt-4">
                        @if($previousUrl)
                        <a class="justify-self-start opacity-75 hover:opacity-100" href="{{ url($previousUrl) }}">
                            <i class="fa fa-arrow-left text-sm opacity-50 mr-1"></i>
                            <span class="link-dimmed">Previous topic</span>
                        </a>
                        @endif
                        @if($nextUrl)
                        <a class="justify-self-end opacity-75 hover:opacity-100" href="{{ url($nextUrl) }}">
                            <span class="link-dimmed">Next topic</span>
                            <i class="fa fa-arrow-right text-sm opacity-50 ml-1"></i>
                        </a>
                        @endif
                    </div>
                    @endif
                </article>
                <div class="docs-submenu">

                    @if(count($tableOfContents))
                    <div class="sticky top-0 py-6 px-6">
                        <div class="pl-4 border-l-2 border-dark-50">
                            <h3 class="mb-3 text-dark-300 font-semibold uppercase tracking-widest text-xs">
                                On this page
                            </h3>
                            <ul class="grid gap-2">
                                @foreach($tableOfContents as $fragment => $title)
                                <li class="truncate">
                                    <a href="#{{ $fragment }}" class="docs-submenu-item">
                                        {{ $title }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </section>
    </main>
@endsection

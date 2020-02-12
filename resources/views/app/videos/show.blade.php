@extends('app.layouts.master')

@section('title', 'Videos')

@section('sidebar')
    @include('app.videos.partials.sidebar')
@endsection

@section('content')
        <div class="">
        @include('app.videos.partials.vimeo')

        <div class="w-full overflow-hidden md:flex justify-between pb-10">
            @if ($previousVideo)
                <a class="mb-2 no-underline text-black md:w-1/2 md:pr-4 flex items-center text-sm opacity-75 hover:opacity-100" href="{{ $previousVideo->url }}">
                    <i class="fa fa-arrow-left text-sm opacity-50 mr-1 hidden | md:inline-block"></i>
                    <span class="truncate"><span class="font-semibold">Previous: </span> {{ $previousVideo->title }}</span>
                </a>
            @endif
            @if ($nextVideo)
                <a class="mb-2 no-underline text-black md:w-1/2 md:pl-4 flex items-center md:justify-end ml-auto text-sm opacity-75 hover:opacity-100" href="{{ $nextVideo->url }}">
                    <span class="truncate"><span class="font-semibold">Next</span>: {{ $nextVideo->title  }}</span>
                    <i class="fa fa-arrow-right text-sm opacity-50 ml-1 hidden | md:inline-block"></i>
                </a>
            @endif
        </div>

        <div class="w-full aspect-16x9 shadow-lg" id="player"
                     data-video-id="{{ $currentVideo->id }}"
                     data-user-id="{{ auth()->user()->id }}"
                     data-video-title="{{ $currentVideo->title }}"
                >
                <iframe class="absolute pin w-full h-full" src="https://player.vimeo.com/video/{{ $currentVideo->vimeo_id }}?loop=false&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;transparent=0&amp;gesture=media" allowfullscreen allowtransparency></iframe>
        </div>

        <div class="flex justify-between items-baseline">

            <h2 class="mr-4">{{ $currentVideo->title }}</h2>

            @if (! auth()->user()->hasCompletedVideo($currentVideo))
                <form action="{{ action([\App\Http\App\Controllers\Videos\VideoCompletionController::class, 'store'], $currentVideo) }}" method="POST">
                    {{ csrf_field() }}
                    <button class="button">
                        Mark as completed
                    </button>
                </form>
            @else
                <form action="{{ action([\App\Http\App\Controllers\Videos\VideoCompletionController::class, 'store'], $currentVideo) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="button bg-green-500 hover:bg-green-600">
                        <i class="fas fa-check mr-1"></i> Completed
                    </button>
                </form>
            @endif

        </div>

        <div class="text-lg">
            {!! $currentVideo->formatted_description !!}
        </div>

        @if ($currentVideo->download_hd_url || $currentVideo->download_sd_url)
            <div class="mt-16 border-t-2 border-dark-100 pt-6">
                <h3 class="mt-0">Downloads</h3>
                @if ($currentVideo->download_hd_url)
                    <div class="py-2">
                        <a href="{{ $currentVideo->download_hd_url }}">
                            HD Video
                        </a>
                        <span class="opacity-75 text-black text-sm">— {{ formatBytes($currentVideo->download_hd_size) }}</span>
                    </div>
                @endif
                @if ($currentVideo->download_sd_url)
                    <div class="py-2">
                        <a href="{{ $currentVideo->download_sd_url }}" class="py-2">
                            SD Video
                        </a>
                        <span class="opacity-75 text-black text-sm">— {{ formatBytes($currentVideo->download_sd_size) }}</span>
                    </div>
                @endif
            </div>
        @endif
@endsection

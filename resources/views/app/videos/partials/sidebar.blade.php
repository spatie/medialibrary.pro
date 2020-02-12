<div class="flex-none pb-16 sm:w-48 sm:pr-8 md:w-64">
    <input type="checkbox" class="hidden docs-sidebar-toggle" id="docs-sidebar-toggle">
    <div class="flex justify-end h-0 z-10 docs-sidebar-button">
        <label class="cursor-pointer ml-auto sm:hidden"
            for="docs-sidebar-toggle">
            <span class="docs-sidebar-button-show button px-0 text-center rounded-full w-10 h-10 bg-white text-black"><i class="fas fa-bars"></i></span>
            <span class="docs-sidebar-button-hide button px-0 text-center rounded-full w-10 h-10 bg-white text-black"><i class="fas fa-times"></i></span>
        </label>
    </div>
    <div class="docs-sidebar">
        <ul class="docs-menu">
            @foreach ($chapters as $chapter)
                <li>
                    <h2>{{ $chapter->title }}</h2>
                    <ul>
                        @forelse ($chapter->videos as $video)
                            <li class="{{ isset($currentVideo) && $currentVideo->id === $video->id ? "active" : "" }}">
                                <a
                                   href="{{ route('video-course.show', [$chapter, $video]) }}"
                                >
                                    {{ $video->title }}
                                </a>
                            </li>
                        @empty
                            <li>No videos yet! Stay tuned...</li>
                        @endforelse
                    </ul>
                </li>
            @endforeach
        </ul>
    </div>
</div>


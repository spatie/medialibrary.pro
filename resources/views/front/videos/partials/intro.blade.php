<div class="py-16 grid lg:cols-2 gap-16 items-center">
    <div>
        <header class="">
            <h1 class="font-serif font-bold text-5xl leading-tight">The Mailcoach <br>video course</h1>
            <p class="mt-3 markup-baseline">More than 25 videos on Laravel development</p>
        </header>

        <p class="mt-12 text-xl max-w-3xl">
            Get a look behind the scenes of <a class="markup-link" href="/">Mailcoach</a>, a real world Laravel application for newsletters.
            Learn about the problems that we tackled and the clean code patterns that we applied.
            <br>Great insights from open source veterans SPATIE.
        </p>
    </div>

    <div class="flex justify-center xl:-mr-16" x-data="{ open: false }">
        <div class="w-full max-w-2xl">
            <div role="button" class="block aspect-16x9" @click="open = true">
                <div class="group absolute inset-0 grid place-center bg-white rounded-t shadow-xl | lg:rounded">
                    <img class="absolute w-full h-full object-cover" src="/images/screenshots/videos.png">
                    <button class="bg-dark-800 text-white rounded px-3 py-1 | group-hover:bg-dark-500">
                        <i class="fas fa-play"></i> <span class="ml-2 text-xs uppercase tracking-widest">Watch sample</span>
                    </button>
                </div>
            </div>

            <template x-if="open">
                <div class="fixed inset-0 p-8 lg:p-16 bg-backdrop z-50 flex items-center justify-center" @keydown.window.escape="open = false">
                    <div class="w-full max-w-screen-xl">
                        <div class="bg-white rounded-sm aspect-16x9 shadow-xl">
                            <iframe src="https://player.vimeo.com/video/381650670?autoplay=1" class="absolute inset-0 border-2 border-white rounded-sm" frameborder="0" allow="autoplay; fullscreen" allowfullscreen @click.away="open = false"></iframe>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>

</div>

<div class="-mx-8 bg-black text-white shadow-2xl overflow-hidden | md:-mx-12 | md:rounded-lg | xl:-mx-16">
    <div class="grid md:cols-2 items-stretch" x-data="{ open: false }">
        <div role="button"
         class="group grid place-center bg-dark-200 h-full w-full md:min-h-0" style="min-height: 56vw" @click="open = true">
            <img class="absolute w-full h-full object-cover object-left-top opacity-50" src="/images/screenshots/how-we-do-it.png">
            <button class="bg-dark-800 text-white rounded px-3 py-1 | group-hover:bg-dark-500">
                <i class="fas fa-play"></i> <span class="ml-2 text-xs uppercase tracking-widest">Watch sample</span>
            </button>
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

        <div class="px-8 py-24 | md:px-12 | xl:px-16">
            <header class="mb-12">
                <h2 class="markup-h1">See how we do it</h2>
                <p class="markup-baseline">More than 25 videos included</p>
            </header>


            <ul class="mt-4 markup-ul-alt text-lg grid gap-2">
                <li>Using and customizing Mailcoach</li>
                <li>The building process of the application</li>
                <li>Writing clear code in Laravel</li>
            </ul>

            <p class="mt-4 text-lg">
                <a href="/videos" class="markup-link-invers">Browse all topics</a>
            </p>

            <p class="mt-12 text-lg">
                Developer! These videos might be for you, even if you're not in the market for an email list solution.
                With our <a href="https://github.com/spatie" class="markup-link-invers">proven track record</a> in Laravel development, you can gain some real insights.
            </p>

            <p class="mt-16">
                <a class="button text-xl" href="{{ route('register') }}">
                    Grab the video course for
                    <span class="currency">$</span>49
                </a>
            </p>
            <p class="mt-3 uppercase font-medium text-xs text-light-500">
                <span class="uppercase tracking-widest">Instead of</span>
                <span class="currency">$</span><span class="font-bold tracking-widest">79</span>
            </p>
        </div>

    </div>
</div>

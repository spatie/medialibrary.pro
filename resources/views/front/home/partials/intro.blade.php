<div class="py-16 grid lg:cols-2 gap-16 items-center">
    <div>
        <header class="text-white">
            <h1 class="font-serif font-bold text-5xl leading-tight">Run your own <br>newsletter engine</h1>
            <p class="mt-3 markup-baseline text-blue-300 opacity-100">Cut the costs of a growing audience</p>
        </header>

        <p class="mt-12 text-xl text-white max-w-3xl">
            Mailcoach is a self-hosted email list manager. It integrates with services like Amazon SES, Mailgun or
            Sendgrid to send out mailings affordably.<br>
            Stand-alone, or integrated in a Laravel project, it's perfect for bloggers, artisans and entrepreneurs.
        </p>
    </div>

    <div class="flex justify-center xl:-mr-16" x-data="{ open: false }">
        <div class="w-full max-w-2xl">
            <div role="button" class="aspect-16x9" @click="open = true">
                <div class="group absolute inset-0 grid place-center bg-white rounded-t shadow-xl | lg:rounded">
                    <img class="absolute w-full h-full object-cover" src="/images/screenshots/intro.png">
                    <span class="bg-dark-800 text-white rounded px-3 py-1 | group-hover:bg-dark-500">
                        <i class="fas fa-play"></i> <span
                            class="ml-2 text-xs uppercase tracking-widest">Watch intro</span>
                    </span>
                </div>
            </div>
        </div>

        <template x-if="open">
            <div class="fixed inset-0 p-8 lg:p-16 bg-backdrop z-50 flex items-center justify-center"
                 @keydown.window.escape="open = false">
                <div class="w-full max-w-screen-xl">
                    <div class="bg-white rounded-sm aspect-16x9 shadow-xl">
                        <iframe src="https://player.vimeo.com/video/380361695?autoplay=1"
                                class="absolute inset-0 border-2 border-white rounded-sm" frameborder="0"
                                allow="autoplay; fullscreen" allowfullscreen @click.away="open = false"></iframe>
                    </div>
                </div>
            </div>
        </template>
    </div>

    @if (session()->has('subscribed'))
        You are now subscribed
    @endif
    <form action="/subscribe" method="post">
        @honeypot
        @csrf

        <input type="email" name="email"/>
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit">Subscribe</button>
    </form>
</div>

<header class="relative bg-blue-900 pt-8 mb-16">
    <img style="opacity:0.45" class="absolute top-0 left-0 h-full w-full object-cover" loading="eager" srcset="/images/header-600.jpg 600w,
                    /images/header-1200.jpg 1200w, /images/header-2400.jpg 2400w" sizes="100vw" src="/images/header-2400.jpg" alt="Picture by Andrew Neel | Unsplash">

    <div class="w-full max-w-5xl mx-auto px-4 sm:px-12 flex items-center justify-between">
        <div class="flex items-center">
            <a href="/" class="logo">
                @include('partials.logo')
            </a>

            <div class="hidden sm:block ml-3">
                <a href="/" class="inline-block logo-shine text-xs uppercase tracking-logo leading-tight font-medium">
                    <span class="text-white">Medialibrary</span>
                    <span class="text-red-500">Pro</span>
                </a>
                <div class="logo-author absolute top-0 mt-4">
                    <a href="https://spatie.be" class="text-xxs text-white opacity-50 leading-tight hover:underline">by Spatie</a>
                </div>
            </div>
        </div>

        <nav>
            <ul class="flex space-x-4 sm:space-x-12 text-xs uppercase tracking-logo leading-tight font-medium text-blue-100">
                <li><a href="{{ route('demo') }}" class="hover:text-yellow-300">Demo</a></li>
                <li><a href="https://spatie.be/docs/laravel-medialibrary" class="hover:text-yellow-300">Docs</a></li>
                <li><a href="https://spatie.be/products/medialibrary-pro" class=" hover:text-blue-900 bg-blue-500 hover:bg-yellow-300 rounded-sm px-4 py-2 transition-colors duration-200">Buy</a></li>
            </ul>
        </nav>
    </div>

    <div class="mt-16 w-full max-w-5xl mx-auto px-4 sm:px-12">
        <h1 class="mb-16 font-bold text-white leading-tight 
                text-2xl md:text-3xl lg:text-4xl">
            @yield('h1')
        </h1>

        @unless($compact ?? false)
        <div class="grid md:grid-cols-2 gap-16 justify-between items-stretch">
            <ul class="text-blue-100 text-lg font-medium space-y-4 md:pb-24">
                <li class="flex items-baseline">
                    <i class="mr-2 far fa-check text-yellow-300 text-sm"></i>
                    Components for uploads &amp; media collections
                </li>
                <li class="flex items-baseline">
                    <i class="mr-2 far fa-check text-yellow-300 text-sm"></i>
                    React, Vue &amp; Livewire powered Blade components
                </li>
                <li class="flex items-baseline">
                    <i class="mr-2 far fa-check text-yellow-300 text-sm"></i>
                    Clean UI in Tailwind CSS
                </li>
                <li class="flex items-baseline">
                    <i class="mr-2 far fa-check text-yellow-300 text-sm"></i>
                    Built for customization
                </li>
                <li class="flex items-baseline">
                    <i class="mr-2 far fa-check text-yellow-300 text-sm"></i>
                    Couples with a media manipulation powerhouse with more than 3 million downloads
                </li>
            </ul>
            <div x-data="{ zIndex: false, video: false }">
                <div id="intro" @mouseLeave="hideIntro()" @mouseEnter="showIntro()"  class="my-8
                            md:absolute top-0 left-0 w-full h-full md:ml-8 md:-mt-16 
                            bg-yellow-300 shadow-2xl">
                    <img src="/images/intro-1600.jpg" class="border-2 border-blue-500 md:absolute inset-0 w-full h-full object-cover">
                    <a @click="video=true" href="#" class="group flex justify-center items-start absolute inset-0 
                                bg-opacity-0 hover:bg-opacity-25 transition-all duration-200
                                bg-blue-900">
                        <span class="bg-blue-900 text-blue-200 group-hover:text-white shadow-lg border-t-2 border-blue-800 rounded-b-sm px-3 py-2 flex items-center justify-center text-xxs uppercase tracking-logo leading-tight font-semibold">
                            Watch intro
                        </span>
                        <span class="absolute flex items-center justify-center inset-0">
                            <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-200 rounded-full bg-blue-500 text-white w-12 h-12 flex items-center justify-center">
                                <i class="ml-1 text-lg far fa-play"></i>
                            </span>
                        </span>
                    </a>

                    <template x-if="video">
                        <div class="fixed bg-blue-900 bg-opacity-75 inset-0 p-8 lg:p-16 z-50 fix-z flex items-center justify-center" @keydown.window.escape="video=false">
                            <button class="absolute top-0 right-0 m-6 leading-none text-yellow-300 text-3xl">×</button>
                            <iframe src="https://player.vimeo.com/video/463793201?autoplay=1" class="w-full h-full" frameborder="0" allow="autoplay; fullscreen" allowfullscreen="" @click.away="video=false">
                            </iframe>
                        </div>
                    </template>

                    <script>
                        function showIntro(){
                            window.intro = setTimeout(function(){
                                document.getElementById('intro').classList.add('z-20');
                            }, 750)
                        }

                        function hideIntro(){
                            clearTimeout(window.intro);
                            document.getElementById('intro').classList.remove('z-20');
                        }
                    </script>
                </div>
                <div class="z-10 md:absolute md:bottom-0 md:left-0 w-full md:-mb-8" @mouseEnter="hideIntro()">
                    <a href="{{ route('demo') }}" class="group z-50 flex justify-center items-start absolute inset-0 
                                bg-opacity-0 hover:bg-opacity-25 transition-all duration-200
                                bg-blue-900">
                        <span class="bg-blue-900 text-blue-200 group-hover:text-white shadow-lg border-t-2 border-blue-800 rounded-b-sm px-3 py-2 flex items-center justify-center text-xxs uppercase tracking-logo leading-tight font-semibold">
                            View demo
                        </span>
                    </a>
                    @include('partials.medialibrary-dummy')
                </div>

            </div>
        </div>
        @endunless
    </div>

</header>

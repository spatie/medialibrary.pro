<header class="relative bg-blue-900 pt-8 mb-16">
    <img style="opacity:0.45" class="absolute top-0 left-0 h-full w-full object-cover" loading="eager" srcset="/images/frames-1000.jpg 1000w,
                    /images/frames-750.jpg 750w,
                    /images/frames-500.jpg 500w," sizes="(min-width: 1024px) 540px, (min-width: 640px) 50vw, 100vw" src="/images/frames-1000.jpg" alt="Picture by Andrew Neel | Unsplash">

    <div class="w-full max-w-4xl mx-auto px-4 flex items-center justify-between">
        <div class="flex items-center">
            <div class="logo">
                @include('partials.logo')
            </div>

            <div class="ml-3">
                <div class="logo-shine text-xs uppercase tracking-logo leading-tight font-medium">
                    <span class="text-white">Medialibrary</span>
                    <span class="text-red-500">Pro</span>
                </div>
                <div class="logo-author absolute top-0 mt-3">
                    <a href="https://spatie.be" class="text-xxs text-white opacity-50 leading-tight hover:underline">by Spatie</a>
                </div>
            </div>
        </div>

        <nav>
            <ul class="flex space-x-12 text-xs uppercase tracking-logo leading-tight font-medium text-blue-100">
                <li><a href="#" class="hover:text-yellow-300">Demo</a></li>
                <li><a href="#" class="hover:text-yellow-300">Docs</a></li>
                <li><a href="#" class=" hover:text-blue-900 bg-blue-400 hover:bg-yellow-300 rounded-sm px-4 py-2 transition-colors duration-200">Buy</a></li>
            </ul>
        </nav>
    </div>

    <div class="mt-16 w-full max-w-4xl mx-auto px-4">
        <h1 class="font-bold text-white text-2xl leading-tight | md:text-3xl | lg:text-4xl">
            UI components <br>for
            <a class="underline hover:text-yellow-300" href="https://github.com/spatie/laravel-medialibrary">
                laravel-medialibrary
            </a>
        </h1>

        <div class="mt-16 flex justify-between">
            <ul class="text-blue-100 text-lg font-medium space-y-4 leading-snug">
                <li class="flex items-baseline">
                    <i class="mr-2 far fa-check text-yellow-300 text-sm"></i>
                     Components for uploads &amp; media collections
                </li>
                <li class="flex items-baseline">
                    <i class="mr-2 far fa-check text-yellow-300 text-sm"></i>
                     React, Vue &amp; Livewire variants
                </li>
                <li class="flex items-baseline">
                    <i class="mr-2 far fa-check text-yellow-300 text-sm"></i>
                     Clean UI in Tailwind CSS
                </li>
                <li class="flex items-baseline">
                    <i class="mr-2 far fa-check text-yellow-300 text-sm"></i>
                     Built for customization
                </li>
            </ul>
            <div class="ml-8 -mb-12 lg:-mr-8">
                @include('partials.medialibrary-dummy')
            </div>
        </div>
    </div>

</header>

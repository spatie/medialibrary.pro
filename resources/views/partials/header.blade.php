<header class="relative bg-blue-900 pt-8 mb-16">
    <img style="opacity:0.45" class="absolute top-0 left-0 h-full w-full object-cover" loading="eager" srcset="/images/header-600.jpg 600w,
                    /images/header-1200.jpg 1200w, /images/header-2400.jpg 2400w" sizes="100vw" src="/images/header-2400.jpg" alt="Picture by Andrew Neel | Unsplash">

    <div class="w-full max-w-4xl mx-auto px-4 sm:px-12 flex items-center justify-between">
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
                <li><a href="https://docs.spatie.be/laravel-medialibrary" class="hover:text-yellow-300">Docs</a></li>
                <li><a href="https://spatie.be/products" class=" hover:text-blue-900 bg-blue-500 hover:bg-yellow-300 rounded-sm px-4 py-2 transition-colors duration-200">Buy</a></li>
            </ul>
        </nav>
    </div>

    <div class="mt-16 w-full max-w-4xl mx-auto px-4 sm:px-12">
        <h1 class="mb-16 font-bold text-white leading-tight
                text-2xl md:text-3xl lg:text-4xl">
            @yield('h1')
        </h1>

        @unless($compact ?? false)
        <div class="md:flex justify-between">
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
            <div class="mt-8 md:mt-0 md:ml-8 -mb-12 lg:-mr-8">
                @include('partials.medialibrary-dummy')
            </div>
        </div>
        @endunless
    </div>

</header>

<section id="pricecard" class="mt-16 md:mt-24 w-full max-w-5xl mx-auto px-4 sm:px-12">
    <div class="md:flex mb-12">
        <div
            class="z-10 flex-grow flex flex-col items-center py-12 px-12 md:pl-8 md:pr-16 border-8 border-yellow-300 shadow-lg rounded">
            <h2 class="h-12 flex items-center justify-center text-3xl font-semibold">
                Unlimited applications
            </h2>

            @if($couldFetchUnlimitedPrice)
                <p class="py-8 flex justify-center items-start">
                    @if($unlimitedDiscount->active)
                        <del class="text-red-400 font-semibold">
                            <span>{{ $unlimitedPriceWithoutDiscount->formattedPrice() }}</span>
                        </del>
                    @endif
                    <ins class="ml-2 no-underline text-3xl font-semibold">
                        <span>{{ $unlimitedPrice->formattedPrice() }}</span>
                    </ins>
                </p>

                @include('partials.discount', ['discount' => $unlimitedDiscount])
            @endif

            <ul class="mb-8 text-sm lg:text-base text-blue-600 font-medium space-y-2 leading-snug">
                <li class="flex items-baseline">
                    <i class="mr-2 far fa-angle-right text-yellow-300 text-sm"></i>
                    No limits on number of applications
                </li>
                <li class="flex items-baseline">
                    <i class="mr-2 far fa-angle-right text-yellow-300 text-sm"></i>
                    May be built into a SaaS product
                </li>
                <li class="flex items-baseline">
                    <i class="mr-2 far fa-angle-right text-yellow-300 text-sm"></i>
                    Includes a year of updates
                </li>
                <li class="flex items-baseline">
                    <i class="mr-2 far fa-angle-right text-yellow-300 text-sm"></i>
                    Includes all components and flavors
                </li>
                <li class="flex items-baseline">
                    <i class="mr-2 far fa-angle-right text-yellow-300 text-sm"></i>
                    Gives access to the private repo
                </li>
            </ul>

            <div class="flex justify-center">
                <a href="{{spatieUrl('https://spatie.be/products/media-library-pro')}}">
                    <x-animated-button textClass="text-xl">
                        Buy license
                    </x-animated-button>
                </a>
            </div>
        </div>

        <div
            class="flex-grow flex flex-col items-center -mt-6 mx-4 md:my-6 md:-ml-12 md:mr-0 py-6 px-12 md:pl-16 md:pr-8 border-8 border-blue-50 rounded-r">
            <h2 class="h-12 flex items-center justify-center text-xl font-semibold">
                Single application
            </h2>
            @if($couldFetchSinglePrice)
                <p class="py-8 flex justify-center items-start">
                    @if($singleDiscount->active)
                        <del class="text-red-400 font-semibold">
                        <span>
                            {{ $singlePriceWithoutDiscount->formattedPrice() }}
                        </span>
                        </del>
                    @endif
                    <ins class="ml-2 no-underline text-3xl font-semibold">
                        <span>{{ $singlePrice->formattedPrice() }}</span>
                    </ins>
                </p>

                @include('partials.discount', ['discount' => $singleDiscount])
            @endif

            <ul class="mb-8 text-sm lg:text-base text-blue-600 font-medium space-y-2 leading-snug">
                <li class="flex items-baseline">
                    <i class="mr-2 far fa-angle-right text-blue-200 text-sm"></i>
                    Valid for a single application
                </li>
                <li class="flex items-baseline">
                    <i class="mr-2 far fa-angle-right text-blue-200 text-sm"></i>
                    Includes a year of updates
                </li>
                <li class="flex items-baseline">
                    <i class="mr-2 far fa-angle-right text-blue-200 text-sm"></i>
                    Includes all components and flavors
                </li>
                <li class="flex items-baseline">
                    <i class="mr-2 far fa-angle-right text-blue-200 text-sm"></i>
                    Gives access to the private repo
                </li>
            </ul>

            <div class="flex justify-center">
                <a href="{{spatieUrl('https://spatie.be/products/media-library-pro')}}">
                    <x-animated-button bgClass="bg-blue-100">
                        Buy license
                    </x-animated-button>
                </a>
            </div>
        </div>
    </div>

    <div class="markup-links text-xs text-center opacity-75">
        Are you planning to distribute these components in a commercial product?
        <br>
        <a href="mailto:support@spatie.be">Contact us</a> to discuss licensing.
    </div>
</section>


<section id="pricecard" class="mt-12 w-full max-w-4xl mx-auto px-4 sm:px-12">
    <div class="mb-8 flex justify-center">
        <div class="px-4 sm:px-12 py-2 text-center text-blue-500 bg-blue-50 rounded text-lg">
            Introduction offer ends in <strong class="font-semibold">09 days 3 hours</strong>
        </div>
    </div>

    <div class="md:flex mb-12">
        <div class="z-10 flex-grow flex flex-col items-center p-12 border-8 border-yellow-300 shadow-lg rounded">
            <h2 class="h-12 flex items-center justify-center text-3xl font-semibold">
                Unlimited applications
            </h2>
            <p class="py-8 flex justify-center items-start">
                <del class="text-red-400">$249</del>
                <ins class="ml-2 no-underline text-3xl font-semibold">$199</ins>
            </p>

            <ul class="mb-8 text-sm text-blue-600 font-medium space-y-1 leading-snug">
                <li class="flex items-baseline">
                    <i class="mr-2 far fa-angle-right text-yellow-300 text-sm"></i>
                    No limits on number of applications
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
                @include('partials.button', ["label" => "Buy license"])
            </div>
        </div>

        <div class="flex-grow flex flex-col items-center -mt-6 mx-4 md:my-6 md:-ml-12 md:mr-0 py-6 px-12 border-8 border-blue-50 rounded-r">
            <h2 class="h-12 flex items-center justify-center text-xl font-semibold">
                Single application
            </h2>
            <p class="py-8 flex justify-center items-start">
                <del class="text-blue-300">$49</del>
                <ins class="ml-2 no-underline text-3xl font-semibold">$35</ins>
            </p>

            <ul class="mb-8 text-sm text-blue-600 font-medium space-y-1 leading-snug">
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
                @include('partials.button', ["label" => "Buy license", "class" => "bg-blue-100"])
            </div>
        </div>
    </div>
</section>

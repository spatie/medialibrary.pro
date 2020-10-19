<section id="pricecard" class="mt-16 md:mt-24 w-full max-w-5xl mx-auto px-4 sm:px-12">
    <div class="mb-8 flex justify-center">
        <div class="px-4 sm:px-12 py-2 text-center text-blue-500 bg-blue-50 rounded text-lg">
            Introduction offer ends in <strong class="font-semibold">09 days 3 hours</strong>
        </div>
    </div>

    <div class="md:flex mb-12">
        <div class="z-10 flex-grow flex flex-col items-center py-12 px-12 md:pl-8 md:pr-16 border-8 border-yellow-300 shadow-lg rounded">
            <h2 class="h-12 flex items-center justify-center text-3xl font-semibold">
                Unlimited applications
            </h2>
            <p class="py-8 flex justify-center items-start">
                <del class="text-red-400">
                    <span data-id="original-currency-{{ config('services.paddle.product_id_unlimited') }}"></span>
                    <span data-id="original-price-{{ config('services.paddle.product_id_unlimited') }}"></span>
                </del>
                <ins class="ml-2 no-underline text-3xl font-semibold">
                    <span data-id="current-currency-{{ config('services.paddle.product_id_unlimited') }}"></span>
                    <span data-id="current-price-{{ config('services.paddle.product_id_unlimited') }}"></span>
                </ins>
            </p>

            <ul class="mb-8 text-sm lg:text-base text-blue-600 font-medium space-y-2 leading-snug">
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
                <a href="https://spatie.be/products/medialibrary-pro">
                    <x-animated-button textClass="text-xl">
                        Buy license
                    </x-animated-button>
                </a>
            </div>
        </div>

        <div class="flex-grow flex flex-col items-center -mt-6 mx-4 md:my-6 md:-ml-12 md:mr-0 py-6 px-12 md:pl-16 md:pr-8 border-8 border-blue-50 rounded-r">
            <h2 class="h-12 flex items-center justify-center text-xl font-semibold">
                Single application
            </h2>
            <p class="py-8 flex justify-center items-start">
                <del class="text-blue-300">
                    <span data-id="original-currency-{{ config('services.paddle.product_id_single') }}"></span>
                    <span data-id="original-price-{{ config('services.paddle.product_id_single') }}"></span>
                </del>
                <ins class="ml-2 no-underline text-3xl font-semibold">
                    <span data-id="current-currency-{{ config('services.paddle.product_id_single') }}"></span>
                    <span data-id="current-price-{{ config('services.paddle.product_id_single') }}"></span>
                </ins>
            </p>

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
                <a href="https://spatie.be/products/medialibrary-pro">
                    <x-animated-button bgClass="bg-blue-100">
                        Buy license
                    </x-animated-button>
                </a>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    function indexOfFirstDigitInString(string) {
        let firstDigit = string.match(/\d/);

        return string.indexOf(firstDigit);
    }

    function displayPaddleProductPrice(productId) {
        Paddle.Product.Prices(productId, function(prices) {
            let priceString = prices.price.net;

            let indexOFirstDigitInString = indexOfFirstDigitInString(priceString);

            let price = priceString.substring(indexOFirstDigitInString);
            price = price.replace('.00', '').replace(/,/g, '');

            let currencySymbol = priceString.substring(0, indexOFirstDigitInString);
            currencySymbol = currencySymbol.replace('US', '');

            document.querySelector(`[data-id="current-currency-${productId}"]`).innerHTML = currencySymbol;
            document.querySelector(`[data-id="current-price-${productId}"]`).innerHTML = price;

            document.querySelector(`[data-id="original-currency-${productId}"]`).innerHTML = currencySymbol;
            document.querySelector(`[data-id="original-price-${productId}"]`).innerHTML = Math.round(price * 1.3355);
        });
    }


    displayPaddleProductPrice({{ config('services.paddle.product_id_single') }});
    displayPaddleProductPrice({{ config('services.paddle.product_id_unlimited') }});
</script>


@php
    $coupon = \App\Support\Coupon::forCouponName('default')
@endphp

<section id="pricecard" class="mt-16 md:mt-24 w-full max-w-5xl mx-auto px-4 sm:px-12">
    <div class="mb-8 flex justify-center">
        @if($coupon->active())
            <div class="flex items-center px-4 sm:px-12 py-2 text-center text-blue-500 bg-blue-50 rounded text-lg">
                <span>{{ $coupon->label() }} ends in</span>
                <span class="font-semibold">
                    <x-countdown class="ml-2 space-x-1" :expires="$coupon->expiresAt()">
                        <span>
                            <span class="markup-tabular" x-text="timer.days">{{ $component->days() }}</span> <span class="text-sm">days</span>
                        </span>
                        <span>
                            <span class="markup-tabular" x-text="timer.hours">{{ $component->hours() }}</span> <span class="text-sm">hours</span>
                        </span>
                        <span>
                            <span class="markup-tabular" x-text="timer.minutes">{{ $component->minutes() }}</span> <span class="text-sm">minutes</span>
                        </span>
                        <span>
                            <span class="markup-tabular" x-text="timer.seconds">{{ $component->seconds() }}</span> <span class="text-sm">seconds</span>
                        </span>
                    </x-countdown>
                </span>
            </div>
        @endif
    </div>

    <div class="md:flex mb-12">
        <div class="z-10 flex-grow flex flex-col items-center py-12 px-12 md:pl-8 md:pr-16 border-8 border-yellow-300 shadow-lg rounded">
            <h2 class="h-12 flex items-center justify-center text-3xl font-semibold">
                Unlimited applications
            </h2>
            <p class="py-8 flex justify-center items-start">
                <del data-id="original-display-{{ config('services.paddle.product_id_unlimited') }}" class="hidden text-red-400 font-semibold">
                    <span data-id="original-currency-{{ config('services.paddle.product_id_unlimited') }}"></span>
                    <span data-id="original-price-{{ config('services.paddle.product_id_unlimited') }}"></span>
                </del>
                <ins class="ml-2 no-underline text-3xl font-semibold">
                    <span data-id="current-currency-{{ config('services.paddle.product_id_unlimited') }}"></span>
                    <span data-id="current-price-{{ config('services.paddle.product_id_unlimited') }}"></span>
                </ins>
            </p>

            @if ($coupon->active())
            <p class="mb-6 text-center text-blue-500 text-xs leading-relaxed">
                Use coupon <code class="px-2 py-1 bg-blue-50 bg-opacity-50 rounded">{{ $coupon->code() }}</code> 
                <br>to get <strong>{{ $coupon->percentage()  }}%</strong> off during checkout!
            </p>
            @endif

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
                <a href="https://spatie.be/products/media-library-pro">
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
                <del data-id="original-display-{{ config('services.paddle.product_id_single') }}" class="hidden text-red-400 font-semibold">
                    <span data-id="original-currency-{{ config('services.paddle.product_id_single') }}"></span>
                    <span data-id="original-price-{{ config('services.paddle.product_id_single') }}"></span>
                </del>
                <ins class="ml-2 no-underline text-3xl font-semibold">
                    <span data-id="current-currency-{{ config('services.paddle.product_id_single') }}"></span>
                    <span data-id="current-price-{{ config('services.paddle.product_id_single') }}"></span>
                </ins>
            </p>

            @if ($coupon->active())
            <p class="mb-6 text-center text-blue-500 text-xs leading-relaxed">
                Use coupon <code class="px-2 py-1 bg-blue-50 bg-opacity-50 rounded">{{ $coupon->code() }}</code> 
                <br>to get <strong>{{ $coupon->percentage()  }}%</strong> off during checkout!
            </p>
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
                <a href="https://spatie.be/products/media-library-pro">
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

<script type="text/javascript">
    function indexOfFirstDigitInString(string) {
        let firstDigit = string.match(/\d/);

        return string.indexOf(firstDigit);
    }

    function displayPaddleProductPrice(productId) {
        Paddle.Product.Prices(productId, function(prices) {
            let priceString = prices.price.net;

            let factor = {{ $coupon->active() ? (100 - $coupon->percentage())/100 : 1 }};

            let indexOFirstDigitInString = indexOfFirstDigitInString(priceString);

            let price = priceString.substring(indexOFirstDigitInString);
            price = price.replace('.00', '').replace(/,/g, '');

            let currencySymbol = priceString.substring(0, indexOFirstDigitInString);
            currencySymbol = currencySymbol.replace('US', '');

            document.querySelector(`[data-id="original-currency-${productId}"]`).innerHTML = currencySymbol;
            document.querySelector(`[data-id="original-price-${productId}"]`).innerHTML = price;

            document.querySelector(`[data-id="current-currency-${productId}"]`).innerHTML = currencySymbol;
            document.querySelector(`[data-id="current-price-${productId}"]`).innerHTML = Math.ceil(price * factor);
            
            if(factor < 1) {
                document.querySelector(`[data-id="original-display-${productId}"]`).classList.remove('hidden');
            }
        });
    }

    displayPaddleProductPrice({{ config('services.paddle.product_id_single') }});
    displayPaddleProductPrice({{ config('services.paddle.product_id_unlimited') }});
</script>


@php
    $coupon = \App\Support\Coupon::forCouponName('default')
@endphp

<section class="z-10 mt-16 sm:mt-32">
    <div class="mx-auto w-full max-w-5xl px-4 sm:px-12">
        <div class="px-4 py-16 sm:px-16 sm:py-24  bg-red-500 shadow-logo rounded-sm">
            <div class="🖼">
                <img loading="eager" srcset="/images/frames-1000.jpg 1000w,
                    /images/frames-750.jpg 750w,
                    /images/frames-500.jpg 500w," sizes="(min-width: 1024px) 540px, (min-width: 640px) 50vw, 100vw" src="/images/frames-1000.jpg" alt="Picture by Andrew Neel | Unsplash">
            </div>

            <h2 class="font-bold text-white text-2xl text-left leading-tight | sm:text-3xl | lg:text-5xl">
                @if($coupon->active())
                    Don't miss out <br>on this offer
                @else
                    Get your license now
                @endif
            </h2>

            @if($coupon->active())
            <div class="flex items-center mt-4 text-lg text-yellow-300 font-bold leading-snug | lg:text-xl">
                    <span>Ends in</span>
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
            </div>
            @endif

            <div class="text-right">
                <a href="https://spatie.be/products/media-library-pro">
                    <x-animated-button textClass="text-2xl" bgClass="bg-yellow-300" shadowClass="bg-white">
                        Pick a license
                    </x-animated-button>
                </a>
            </div>
        </div>
    </div>
</section>

@extends('app.layouts.master')

@section('title', 'Licenses')

@section('content')
    <h1>Licenses</h1>

    @if($justMadePurchase)
        @if(count($licenses))
            <div class="-my-8 alert alert-success text-sm">
                <p class=text-lg>Thanks, you have successfully purchased a license!</p>
                <p class=text-lg>What's next:</p>
                <ul class="text-lg markup-ul mt-4 grid gap-1">
                    <li>Tie a valid domain to this license in the ‘My licenses’ list below</li>
                    <li>Copy the associated blue license key</li>
                    <li>Head over to the <a href="/docs/app/installation/in-an-existing-laravel-app">documentation</a>
                        to start installing Mailcoach
                    </li>
                    <li>Grab some popcorn, and watch <a href="/video-course">the video course</a></li>
                </ul>
            </div>
        @else
            <div class="-my-8 alert alert-success text-sm">
                <p class=text-lg>Thanks, you have successfully purchased <a href="/video-course">the video course!</a></p>
            </div>
        @endif
    @else
        <div class="-my-8 alert alert-info text-sm">
            A Mailcoach license:
            <ul class="markup-ul mt-4 grid gap-1">
                <li>Is valid for 1 production domain</li>
                <li>Includes the package, app and videos</li>
                <li>Includes 1 year of updates and access to our private repository</li>
                <li>Is renewable if you want to stay on the latest release</li>
            </ul>

            <p class="text-xs text-gray-300">Third party email services and hosting costs are not included. Mailcoach requires PHP 7.4</p>
        </div>
    @endif

    @include('app.licenses.partials.paddle')

    <h2>Add a license</h2>

    <div class="grid sm:cols-auto-1fr items-center justify-start gapx-8 gapy-4">
        <div>
            <x-buy-button :product="$standardProduct">
                Purchase {{ count($licenses) ? 'additional ': ' ' }}license for ${{ $standardProduct->price }}
            </x-buy-button>
        </div>
        <div>
            @if(count($licenses))
                <span class="text-blue-500">-></span> 
                <a href="javascript:void();" 
                data-product-label="{{ $standardProduct->label }}"
                data-product-id="{{ $standardProduct->paddle_product_id }}"
                >Add a license</a> for an extra domain
            @else
                <span class="text-blue-500">-></span> Includes the package, app and videos
            @endif
        </div>

        @if(auth()->user()->canAccessVideos())
            <button disabled class="button">
                Purchase video course for ${{ $videosProduct->price }}
            </button>
            <div>
                <span class="text-blue-500">-></span> You already have access to <a href="{{ route('video-course') }}">the videos</a>
            </div>
        @else
            <x-buy-button :product="$videosProduct">
                Purchase video course ${{ $videosProduct->price }}
            </x-buy-button>
            <div>
                <span class="text-blue-500">-></span> Includes access to the <a href="{{ route('videos') }}">video course</a>
            </div>
        @endif
    </div>



    @if(count($licenses))
        <h2>My licenses</h2>

        @foreach($errors->all() as $error)
            <p class="my-6 text-red-500">{{ $error }}</p>
        @endforeach

        <div class="grid sm:cols-1fr-auto">
            @foreach($licenses as $license)
                <div class="py-6 sm:border-b-2 sm:border-gray-100">
                    <div class="grid cols-auto-1fr items-center gapx-4 gapy-2 text-xs">
                        <div class="text-gray-300">Domain</div>
                        <div>
                            <form
                                action="{{ action([\App\Http\App\Controllers\Licenses\UpdateLicenseController::class, 'update'], $license) }}"
                                method="POST"
                                class="flex"
                            >
                                @method('PUT')
                                @csrf
                                <input class="input min-h-0 h-8" type="text" name="domain"
                                       placeholder="Add a domain for this license"
                                       value="{{ $license->domain }}">
                                <button type="submit"
                                        class="ml-1 button-white shadow-none bg-blue-100 text-blue-400 h-8">
                                    Save
                                </button>
                            </form>
                        </div>

                        <div class="text-gray-300">{{ $license->isExpired() ? 'Expired' : 'Expires' }}</div>
                        <div class="{{ $license->isExpired() ? 'text-red-500' : '' }}">
                            {{ $license->expires_at->format('j F Y') }}
                        </div>

                        <div class="text-gray-300">Type</div>
                        <div>{{ $license->product->name }}</div>

                        <div class="text-gray-300">Key</div>
                        <div>
                            <code
                                class="break-all {{ $license->isExpired() ? 'text-red-500' : 'text-blue-500' }}"">{{ $license->key }}</code>
                        </div>

                    </div>

                </div>
                <div class="py-6 sm:pl-16 sm:text-right border-b-2 border-gray-100">
                    @if($license->product->type === \App\Models\Product::TYPE_STANDARD)
                        <x-buy-button :product="$standardRenewalProduct" :license="$license">
                            Extend license for
                            ${{ $standardRenewalProduct->price }}
                        </x-buy-button>
                    @endif
                    <div class="mt-1 text-xs text-gray-300">
                        Extend until {{ $license->expirationDateWhenRenewed()->format('j F Y')  }}
                    </div>
                </div>
            @endforeach
        </div>
    @endif

@endsection

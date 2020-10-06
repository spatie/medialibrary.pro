@extends('front.layouts.master')

@section('title', 'UI components')

@section('content')

<main class="z-10 mt-2 px-4 | sm:px-8 | md:mt-4 md:px-12 | lg:mt-8 lg:px-16">
            <div class="mx-auto w-full max-w-4xl bg-red-500 shadow-logo rounded">
                <div class="🖼">
                    <img loading="eager" srcset="/images/frames-1000.jpg 1000w,
                    /images/frames-750.jpg 750w,
                    /images/frames-500.jpg 500w," sizes="(min-width: 1024px) 540px, (min-width: 640px) 50vw, 100vw" src="/images/frames-1000.jpg" alt="Picture by Andrew Neel | Unsplash">
                </div>

                <blockquote class="z-10 absolute top-0 left-0 w-full h-64 flex items-center justify-center font-bold text-white text-3xl text-center leading-tight | md:text-4xl | lg:text-5xl">
                    <span>
                        Every picture<br>needs a frame
                    </span>
                </blockquote>

                <div class="pt-48 pb-32 | sm:flex | lg:pt-64 lg:pb-48">
                    <div class="px-12 max-w-lg sm:flex flex-col items-center | sm:w-1/2">
                        <div class="max-w-xs w-full">
                            <form action="/subscribe" method="post">
                                <label for="email" class="font-bold text-yellow-300 text-lg leading-snug | lg:text-xl">
                                    {{ session()->has('subscribed')? "Thanks! You'll hear from us soon" : "Subscribe for updates" }}
                                </label>

                                @honeypot
                                @csrf

                                <div class="mt-6 subscribe">
                                    <input placeholder="Your email" class="subscribe-input" type="email" id="email" name="email" required />

                                    <button type="submit" class="subscribe-button">
                                        <span class="subscribe-button-icon">-></span>
                                    </button>
                                </div>

                                <div class="mt-6 flex items-baseline text-white text-xs font-medium">
                                    @error('email')
                                        <span class="flex-none mr-2 text-red-500 bg-yellow-300 rounded-full h-6 w-6 inline-flex items-center justify-center font-bold ">!</span>
                                        <span class="opacity-75">{{ $message }}</span>
                                    @else
                                        <span class="opacity-75">Your address will only be used for updates on Medialibrary Pro</span>
                                    @enderror
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="px-12 pt-24 | sm:pt-0 sm:w-1/2 sm:text-right">
                        <ul class="text-lg text-white font-bold leading-snug | lg:text-xl">
                            <li class="text-yellow-300">
                                Coming fall 2020
                            </li>
                            <li class="mt-6">
                                UI elements for <a class="a-border whitespace-no-wrap" href="https://docs.spatie.be/laravel-medialibrary/">spatie/laravel-medialibrary</a>
                            </li>
                            <li class="mt-6">
                                Includes React and Vue <span class="whitespace-no-wrap">renderless components</span>
                            </li>
                            <li class="mt-6">
                                Includes Livewire components
                            </li>
                            <li class="mt-6">
                                Laravel Vapor support
                            </li>
                            <li class="mt-6">
                                Temporary uploads
                            </li>
                            <li class="mt-6">
                                Tailwind CSS styles
                            </li>
                        </ul>
                        <p class="mt-6 text-white text-xs font-medium opacity-75">
                            This will be a fair-priced add-on. <br>Don't worry, the original Medialibrary will still be free!
                        </p>
                    </div>
                </div>
            </div>
        </main>

@endsection

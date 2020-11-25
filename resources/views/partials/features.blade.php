<section id="features" class="bg-blue-100">
    <div x-data="{ tech: 'blade' }" class="w-full max-w-5xl mx-auto px-4 sm:px-12 pt-12 pb-24">
        <h2 class="text-xs uppercase tracking-logo leading-tight font-medium text-blue-400 text-center">Key features</h2>

        <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-16">
            @include('partials.features.flavor')

            @include('partials.features.useCase')

            @include('partials.features.customization')

            @include('partials.features.tailwind')

            <div>

                <h3 class="text-xl font-bold">Extra punch under the hood</h3>
                <p class="mt-4 font-medium leading-snug">
                    We included the following pro features:
                </p>
                <ul class="font-medium mt-2 list-disc list-outside pl-4  leading-snug  grid gap-2">
                    <li>Temporary uploads ensure that users don't need to upload files when submitting an invalid form</li>
                    <li>You can use the components inside your Blade views, no Livewire knowledge needed. Alternatively, you can also used them within Livewire components</li>
                    <li>Extensive validation rules ensure that only files you expect get persisted</li>
                    <li>Support for Laravel Vapor (Vue and React components)</li>
                    <li>Built on rock solid foundation of <a class="underline" href="https://spatie.be/docs/laravel-medialibrary/v9/introduction">Media Library</a> which has been downloaded over three million times.</li>
                </ul>
            </div>

            <div>

                <h3 class="text-xl font-bold">Buy once (a year)</h3>
                <p class="mt-4 font-medium leading-snug">
                    We have a license for a single Laravel project or for agencies with multiple projects.
                    Every license includes:
                </p>
                <ul class="font-medium mt-2 list-disc list-outside pl-4 leading-snug grid gap-2">
                    <li>Run forever on the current release. Every purchase includes one year of upgrades</li>
                    <li>Optionally renew your license every year to stay on the latest release and keep using our package repository.</li>
                </ul>
            </div>
        </div>

        <div class="mt-24 flex justify-center space-x-8 pt-8 border-t-8 border-blue-200">
            <a href="https://spatie.be/docs/laravel-medialibrary/v9/handling-uploads-with-media-library-pro/introduction" class="underline text-xl font-medium hover:text-blue-600">Read the docs</a>
            <a href="{{ route('demo') }}" class="underline text-xl font-medium hover:text-blue-600">Try the demo</a>
        </div>
    </div>
</section>

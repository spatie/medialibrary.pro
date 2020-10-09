<section id="features" class="bg-blue-100">
    <div x-data="{ tech: 'livewire' }" class="w-full max-w-5xl mx-auto px-4 sm:px-12 pt-12 pb-24">
        <h2 class="text-xs uppercase tracking-logo leading-tight font-medium text-blue-400 text-center">Key features</h2>

        <div class="mt-12 grid md:grid-cols-2 gap-x-16 gap-y-24">
            <div>
                <ul class="h-10 flex items-center justify-center space-x-6 text-xxs text-gray-500">
                    <li>
                        <a href="#" @click.prevent="tech = 'livewire'" :class="{ 'text-blue-900' : tech === 'livewire' }">
                            Livewire
                            <div x-show="tech === 'livewire'" class="absolute w-full top-0 -mt-4 left-0 text-center text-yellow-500 text-sm">
                                •
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" @click.prevent="tech = 'react'" :class="{ 'text-blue-900' : tech === 'react' }">
                            React
                            <div x-show="tech === 'react'" class="absolute w-full top-0 -mt-4 left-0 text-center text-yellow-500 text-sm">
                                •
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" @click.prevent="tech = 'vue'" :class="{ 'text-blue-900' : tech === 'vue' }">
                            Vue
                            <div x-show="tech === 'vue'" class="absolute w-full top-0 -mt-4 left-0 text-center text-yellow-500 text-sm">
                                •
                            </div>
                        </a>
                    </li>
                </ul>

                <div x-show="tech === 'livewire'" class="mb-8">
                    <pre><code class="html">   
    &lt;!-- Livewire --&gt;  
    &lt;x-media-library-attachment 
        name="media" 
        rules="mimes:png,jpeg,pdf" 
    /&gt;
                    </code></pre>
                </div>

                <div x-show="tech === 'react'" class="mb-8">
                    <pre><code class="react">   
    /* React */  
    &lt;MediaLibraryAttachment
        name="media"
        initialValue={window.oldValues.media}
        uploadEndpoint={window.uploadEndpoint}
        validation=@{{ accept: ['image/png', 'image/jpeg', 'application/pdf'] }}
        validationErrors={window.errors}
    &gt;&lt;/MediaLibraryAttachment&gt;
                    </code></pre>
                </div>

                <div x-show="tech === 'vue'" class="mb-8">
                    <pre><code class="vue">   
    /* Vue */  
    …
                    </code></pre>
                </div>

                <h3 class="text-xl font-bold">Pick your flavor</h3>
                <p class="mt-4 font-medium leading-snug">
                    We have components for React & Vue, as well as Livewire Blade components.
                    All integrated seamlessly and playing nicely with your Laravel Media Models.
                </p>
            </div>

            <div>
                <div class="bg-blue-200 h-48 mb-8"></div>

                <h3 class="text-xl font-bold">Pick a use case</h3>
                <p class="mt-4 font-medium leading-snug">
                    Out-of-the box components cover use cases from single file uploads, multiple thumbnails to displaying entire collections with custom fields.
                    Do you want to roll out your own variant? Read on…
                </p>
            </div>

            <div>

                <ul class="h-10 flex items-center justify-center space-x-6 text-xxs text-gray-500">
                    <li>
                        <a href="#" @click.prevent="tech = 'livewire'" :class="{ 'text-blue-900' : tech === 'livewire' }">
                            Livewire
                            <div x-show="tech === 'livewire'" class="absolute w-full top-0 -mt-4 left-0 text-center text-yellow-500 text-sm">
                                •
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" @click.prevent="tech = 'react'" :class="{ 'text-blue-900' : tech === 'react' }">
                            React
                            <div x-show="tech === 'react'" class="absolute w-full top-0 -mt-4 left-0 text-center text-yellow-500 text-sm">
                                •
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" @click.prevent="tech = 'vue'" :class="{ 'text-blue-900' : tech === 'vue' }">
                            Vue
                            <div x-show="tech === 'vue'" class="absolute w-full top-0 -mt-4 left-0 text-center text-yellow-500 text-sm">
                                •
                            </div>
                        </a>
                    </li>
                </ul>

                <div x-show="tech === 'livewire'" class="mb-8">
                    <pre><code class="html">   
    &lt;!-- Livewire --&gt;  
    &lt;x-media-library-attachment 
        name="media" 
        rules="mimes:png,jpeg,pdf" 
    /&gt;
                    </code></pre>
                </div>

                <div x-show="tech === 'react'" class="mb-8">
                    <pre><code class="react">   
    /* React */  
    &lt;MediaLibraryAttachment
        name="media"
        initialValue={window.oldValues.media}
        uploadEndpoint={window.uploadEndpoint}
        validation=@{{ accept: ['image/png', 'image/jpeg', 'application/pdf'] }}
        validationErrors={window.errors}
    &gt;&lt;/MediaLibraryAttachment&gt;
                    </code></pre>
                </div>

                <div x-show="tech === 'vue'" class="mb-8">
                    <pre><code class="vue">   
    /* Vue */  
    …
                    </code></pre>
                </div>
                <h3 class="text-xl font-bold">Made to customize</h3>
                <p class="mt-4 font-medium leading-snug">
                    All components have been designed from the ground up to be customized or extended. There are slots for the list, an media item, the props and item fields, so you can pay with every part of the components.
                </p>
            </div>

            <div>
                <div class="bg-blue-200 h-48 mb-8"></div>

                <h3 class="text-xl font-bold">Tailwind CSS support</h3>
                <p class="mt-4 font-medium leading-snug">
                    Medialibrary pro ships with a clean design that can be used as is, or integrates with your own tailwind.config.js to use your apps color scheme and settings. Nothing stops you to go even further and adjust every little detail with custom CSS.
                </p>
            </div>

            <div>

                <h3 class="text-xl font-bold">Extra punch under the hood</h3>
                <p class="mt-4 font-medium leading-snug">
                    We includes following pro features:
                </p>
                <ul class="font-medium mt-2 list-disc list-outside pl-4  leading-snug  grid gap-2">
                    <li>Laravel Vapor support for Media Collections</li>
                    <li>Temporary uploads to persist media in incomplete forms</li>
                    <li>…</li>
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
            <a href="https://spatie.be/docs/laravel-medialibrary" class="underline text-xl font-medium hover:text-blue-600">Read the docs</a>
            <a href="{{ route('demo') }}" class="underline text-xl font-medium hover:text-blue-600">Try the demo</a>
        </div>
    </div>
</section>

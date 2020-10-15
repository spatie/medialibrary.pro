@extends('front.layouts.demo')

@section('title', 'Demo: collection')

@push('scripts')
    <script defer src="/js/vue/app.js"></script>
    <script>
        window.initialValues = {};
        window.initialValues.images = {{ $images }};
        window.initialValues.downloads = {{ $downloads }};
    </script>
@endpush

@section('demo')

    <form method="POST" ref="form">
        @csrf

        <div class="grid gap-8 justify-items-start">
            <p class="text-lg">
                A <em>Collection</em> is a component to manage your media data. Load and add items, fill in properties and sort rows.
            </p>

            <x-field label="name">
                <x-input id="name" name="name" placeholder="Your first name" value="{{ old('name', $formSubmission->name) }}" />
            </x-field>

            <x-field label="images">
                <media-library-collection
                    name="images"
                    :initial-value="window.oldValues.images || window.initialValues.images"
                    upload-endpoint="{{ route('media-library-upload') }}"
                    :validation="{ accept: ['image/png', 'image/jpeg'] }"
                    :validation-errors="window.errors"
                    :max-items="3"
                />
            </x-field>

            <x-field label="downloads">
                <media-library-collection
                    name="downloads"
                    :initial-value="window.oldValues.downloads || window.initialValues.downloads"
                    upload-endpoint="{{ route('media-library-upload') }}"
                    :validation="{ accept: ['application/pdf'] }"
                    :validation-errors="window.errors"
                    :max-items="2"
                />
            </x-field>

            <x-animated-button>Submit</x-animated-button>
        </div>

        <h3 class="mt-24 pt-8 border-t-8 border-blue-300 border-opacity-25">Source</h3>

        <pre><code class="vue">
        /* Vue */
        …
        </code></pre>
    </form>

@endsection

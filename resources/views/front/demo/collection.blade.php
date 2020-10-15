@extends('front.layouts.demo')

@section('title', 'Demo: collection')

@push('scripts')
    <script defer src="/js/vue/app.js"></script>
    <script>
        window.oldValues = @json(Session::getOldInput());
        window.initialValues = {};
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
{{ $errors }}
            <x-field label="downloads">
                <media-library-collection
                    name="downloads"
                    :initial-value="window.oldValues.downloads || window.initialValues.downloads"
                    upload-endpoint="{{ route('media-library-upload') }}"
                    :validation="{ accept: ['image/png', 'image/jpeg'], maxSize: 500 }"
                    :validation-errors="window.errors"
                    :max-items="3"
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

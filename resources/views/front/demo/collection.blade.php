@extends('front.layouts.demo')

@section('title', 'Demo: collection')

@push('scripts')
    <script defer src="/js/vue/app.js"></script>
@endpush

@section('demo')

    <form method="POST" ref="form">
        @csrf

        <div class="grid gap-8 justify-items-start">
            <p class="text-lg">
                A <em>Collection</em> is a component to manage your media data. Load and add items, fill in properties
                and sort rows.
            </p>

            <p class="text-lg">
                The collection below will display files that are uploaded in this session. We'll delete any files that
                are older than 10 minutes.
                You can test out the component with any file under 1 Mb. We've configured this collection so it can
                hold a maximum of three files.
            </p>

            <x-field label="downloads">
    <media-library-collection
        name="downloads"
        upload-endpoint="{{ route('media-library-temporary-uploads') }}"
        :validation-rules="{ accept: ['image/png', 'image/jpeg'], maxSize: 1024 }"
        :initial-value="{{ $downloads }}"
        :validation-errors="{{ $errors }}"
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

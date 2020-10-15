@extends('front.layouts.demo')

@section('title', 'Demo: attachment')

@push('scripts')
    <script>
        window.errors = {!! $errors->isEmpty() ? '{}' : $errors !!};
    </script>
    <script defer src="/js/vue/app.js"></script>
@endpush

@section('demo')

    <form method="POST">
        @csrf

        <div class="grid gap-8 justify-items-start">
            <p class="text-lg">
                The <em>Attachment</em> is a typical component in a front facing form. Think uploading a CV, an avatar
                etc.
            </p>

            <p class="text-lg">
                You can test out the component with any file under 512 Kb. Uploaded files will immediately be discarded.
            </p>

            <x-field label="file">
                <media-library-attachment
                    name="media"
                    upload-endpoint="/temp-upload"
                    :validation="{ accept: ['image/png', 'image/jpeg'], maxSize: 1  }"
                    :validation-errors="window.errors || {}"

                    :initial-value="{{ json_encode(old('media')) }}"
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

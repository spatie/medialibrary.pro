@extends('front.layouts.demo')

@section('title', 'Demo: attachment')

@push('scripts')
<script defer src="/js/vue/app.js"></script>
<script>
    window.errors = {!! $errors->isEmpty() ? '{}' : $errors !!};
</script>
@endpush

@section('demo')

<form method="POST">
    @csrf

    <div class="grid gap-8 justify-items-start">
        <p class="text-lg">
            The <em>Attachment</em> is a typical component in a front facing form. Think uploading a CV, an avatar etc.
        </p>

        <x-field label="name">
            <x-input id="name" name="name" placeholder="Name" value="{{ old('name') }}" />
        </x-field>
{{ print_r($errors) }}
        {{ json_encode($errors->all()) }}
        <x-field label="file">
            <media-library-attachment
                name="media"
                upload-endpoint="/temp-upload"
                :validation="{ accept: ['image/png', 'image/jpeg'] }"
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

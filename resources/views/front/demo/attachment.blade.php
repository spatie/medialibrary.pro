@extends('front.layouts.demo')

@section('title', 'Attachment demo')

@push('scripts')
<script defer src="/js/vue/app.js"></script>
@endpush

@section('demo')

<form method="POST">
    @csrf

    <x-grid>
        <x-field label="name">
            <x-input id="name" name="name" placeholder="Name" value="{{ old('name') }}" />
        </x-field>

        <x-field label="file">
            <media-library-attachment
                name="media"
                upload-endpoint="/temp-upload"
                :validation="{ accept: ['image/png', 'image/jpeg'] }"
                :validation-errors="{}"
                :initial-value="{{ json_encode(old('media')) }}"
            />
        </x-field>

        <x-animated-button>Submit</x-animated-button>
    </x-grid>
</form>

@endsection

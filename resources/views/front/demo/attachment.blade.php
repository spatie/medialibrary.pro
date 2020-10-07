@extends('front.layouts.master')

@push('scripts')
    <script defer src="/js/vue/app.js"></script>
@endpush

@section('content')

    <x-h2>Attachment demo</x-h2>

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
                    :validation-errors="window.errors"
                    :initial-value="{{ json_encode(old('media')) }}"
                />
            </x-field>

            <x-button>Submit</x-button>
        </x-grid>
    </form>

@endsection

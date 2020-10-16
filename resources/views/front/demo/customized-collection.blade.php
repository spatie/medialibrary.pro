@extends('front.layouts.demo')

@section('title', 'Demo: customized collection')

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
                A both the <em>Attachment</em> and <em>Collection</em> components can be customized. You can change the looks and event can add extra fields.
            </p>

            <p class="text-lg">
                The collection below will display files that are uploaded in this session. We'll delete any files that
                are older than 10 minutes.
                You can test out the component with any file under 512 Kb. We've configured this collection so it can
                hold a maximum of three files.
            </p>

            <x-field label="downloads">
                <media-library-collection
                    name="downloads"
                    :initial-value="window.oldValues.downloads || window.initialValues.downloads"
                    upload-endpoint="{{ route('media-library-temporary-uploads') }}"
                    :validation="{ accept: ['image/png', 'image/jpeg'], maxSize: 500 }"
                    :validation-errors="window.errors"
                    :max-items="3">

                    <template
                        slot="fieldsView"
                        slot-scope="{
            object,
            getCustomPropertyInputProps,
            getCustomPropertyInputListeners,
            getCustomPropertyInputErrors,
            getNameInputProps,
            getNameInputListeners,
            getNameInputErrors,
        }"
                    >
                        <input
                            placeholder="name"
                            v-bind="getNameInputProps()"
                            v-on="getNameInputListeners()"
                        />
                        <p v-for="error in getNameInputErrors()" :key="error">@{{ error }}</p>

                        <input
                            placeholder="Extra field"
                            v-bind="getCustomPropertyInputProps('extra_field')"
                            v-on="getCustomPropertyInputListeners('extra_field')"
                        />
                        <p v-for="error in getCustomPropertyInputErrors('extra_field')" :key="error">
                            @{{ error }}
                        </p>
                    </template>
                </media-library-collection>
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

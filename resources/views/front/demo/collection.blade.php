@extends('front.layouts.demo')

@section('title', 'Demo: collection')

@push('scripts')
    <script defer src="/js/vue/app.js"></script>
@endpush

@section('demo')

    <form method="POST" ref="form" id="app">
        @csrf

        <div class="grid gap-8 justify-items-start">
            <p class="text-lg">
                A <em>Collection</em> is a component to manage your media data. Load and add items, fill in properties
                and sort rows.
            </p>

            <x-field label="downloads">
                <media-library-collection
                    name="downloads"
                    :initial-value="{{ $downloads }}"
                    :max-items="3"
                    :validation-rules="{ accept: ['image/png', 'image/jpeg'], maxSizeInKB: 1024 }"
                    :validation-errors="{{ $errors }}"
                />
            </x-field>

            <x-animated-button>Submit</x-animated-button>

            <p class="text-lg">
                The collection above will display files that are uploaded in this session. We'll delete any files that
                are older than 10 minutes.
                You can test out the component with any file under 1 Mb. We've configured this collection so it can
                hold a maximum of three files.
            </p>
        </div>
    </form>

    <h3 class="mt-24 pt-8 border-t-8 border-blue-300 border-opacity-25">Source</h3>

    <div x-data="{ tech: 'blade' }">
        @include('partials.features.techNav')

        <div x-show="tech === 'blade'">
        <pre><code class="html h-auto">&lt;!-- Livewire and Blade --&gt;
&lt;x-media-library-collection
    name="downloads"
    :model="$formSubmission"
    collection="downloads"
    max-items="3"
    rules="mimes:png,jpeg|max:1024"
/&gt;</code></pre>
        </div>

        <div x-show="tech === 'react'">
        <pre><code class="html h-auto"><span class="hljs-comment">/* React */</span>
&lt;MediaLibraryCollection
    name="downloads"
    initialValue={downloads}
    maxItems={3}
    validationRules=@{{ accept: ['image/png', 'image/jpeg'], maxSizeInKB: 1024  }}
    validationErrors=@{{ errors }}
/&gt;
        </code></pre>
        </div>

        <div x-show="tech === 'vue'">
        <pre><code class="html h-auto">&lt;!-- Vue --&gt;
&lt;media-library-collection
    name="downloads"
    :initial-value="@{{ $downloads }}"
    :max-items="3"
    :validation-rules="{ accept: ['image/png', 'image/jpeg'], maxSizeInKB: 1024  }"
    :validation-errors="@{{ $errors }}"
/&gt;
        </code></pre>
        </div>
    </div>

@endsection

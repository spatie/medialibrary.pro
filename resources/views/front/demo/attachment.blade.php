@extends('front.layouts.demo')

@section('title', 'Demo: attachment')

@push('scripts')
    <script defer src="/js/vue/app.js"></script>
@endpush

@section('demo')

    <form method="POST" id="app">
        @csrf

        <div class="grid gap-8 justify-items-start">
            <p class="text-lg">
                The <em>Attachment</em> is a typical component in a front facing form. Think uploading a resume, an avatar
                etc.
            </p>

            <x-field label="file">
                <media-library-attachment
                    name="media"
                    :validation-rules="{ accept: ['image/png', 'image/jpeg', 'application/pdf'], maxSizeInKB: 1024  }"
                    :validation-errors="{{ $errors }}"
                />
            </x-field>

            <x-animated-button>Submit</x-animated-button>

            <p class="text-lg">
                You can test out the component with any file under 1 Mb. Uploaded files will immediately be discarded.
            </p>
        </div>
    </form>

    <h3 class="mt-24 pt-8 border-t-8 border-blue-300 border-opacity-25">Source</h3>

    <div x-data="{ tech: 'blade' }">
        @include('partials.features.techNav')

        <div x-show="tech === 'blade'">
        <pre><code class="html h-auto">&lt;!-- Livewire and Blade --&gt;
&lt;x-media-library-attachment
   name="media"
   rules="mimes:png,jpeg,pdf|max:1024"
/&gt;
        </code></pre>
        </div>

        <div x-show="tech === 'react'">
        <pre><code class="html h-auto"><span class="hljs-comment">/* React */</span>
&lt;MediaLibraryAttachment
    name="media"
    validationRules=@{{ accept: ['image/png', 'image/jpeg', 'application/pdf'], maxSizeInKB: 1024  }}
    validationErrors=@{{ errors }}
/&gt;
        </code></pre>
        </div>

        <div x-show="tech === 'vue'">
        <pre><code class="html h-auto">&lt;!-- Vue --&gt;
&lt;media-library-attachment
    name="media"
    :validation-rules="{ accept: ['image/png', 'image/jpeg', 'application/pdf'], maxSizeInKB: 1024  }"
    :validation-errors="@{{ $errors }}"
/&gt;
        </code></pre>
        </div>
    </div>

@endsection

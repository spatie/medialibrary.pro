@extends('front.layouts.demo', ['custom' => true])

@section('title', 'Demo: customized collection')

@push('scripts')
    <script defer src="/js/vue/app.js"></script>
@endpush

@section('demo')

    <form method="POST" ref="form" id="app">
        @csrf

        <div class="grid gap-8 justify-items-start">
            <p class="text-lg">
                Both the <em>Attachment</em> and <em>Collection</em> components can be customized. You can customize the CSS and even add extra fields.
            </p>

            <x-field label="downloads">
                <media-library-collection
                    name="downloads"
                    :initial-value="{{ $downloads }}"
                    :max-items="3"
                    :validation-rules="{ accept: ['image/png', 'image/jpeg'], maxSizeInKB: 1024 }"
                    :validation-errors="{{ $errors }}"
                >
                    <template
                        slot="fields"
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
                        <div class="media-library-properties">
                            <div class="media-library-field">
                                <label class="media-library-label">Name</label>
                                <input
                                    class="media-library-input"
                                    v-bind="getNameInputProps()"
                                    v-on="getNameInputListeners()"
                                />
                                <p v-for="error in getNameInputErrors()" :key="error" class="media-library-text-error">
                                    @{{ error }}
                                </p>
                            </div>

                            <div class="media-library-field">
                                <label class="media-library-label">Extra field</label>
                                <input
                                    class="media-library-input"
                                    v-bind="getCustomPropertyInputProps('extra_field')"
                                    v-on="getCustomPropertyInputListeners('extra_field')"
                                />
                                <p v-for="error in getCustomPropertyInputErrors('extra_field')" :key="error" class="media-library-text-error">
                                    @{{ error }}
                                </p>
                            </div>
                        </div>
                    </template>
                </media-library-collection>
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
        <pre><code class="html h-auto">&lt;!-- Blade --&gt;
&lt;x-media-library-collection
    name="downloads"
    :model="$formSubmission"
    collection="downloads"
    max-items="3"
    rules="mimes:png,jpeg"
    fields-view="uploads.blade.partials.fields"
/&gt;
        </code></pre>
        </div>

        <div x-show="tech === 'react'">
        <pre><code class="html h-auto"><span class="hljs-comment">/* React */</span>  
&lt;MediaLibraryCollection
    name="downloads"
    initialValue={downloads}
    maxItems={3}
    validationRules=@{{ accept: ['image/png', 'image/jpeg'], maxSizeInKB: 1024  }}
    validationErrors=@{{ errors }}
    fieldsView={({
        getCustomPropertyInputProps,
        getCustomPropertyInputErrors,
        getNameInputErrors,
        getNameInputProps,
    }) => (
        &lt;div className="media-library-properties"&gt;
            &lt;div className="media-library-field"&gt;
                &lt;label className="media-library-label"&gt;Name&lt;/label&gt;
                &lt;input
                    className="media-library-input"
                    {...getNameInputProps()}
                /&gt;

                {getNameInputErrors().map(error =&gt; (
                    &lt;p key={error} className="media-library-text-error"&gt;
                        {error}
                    &lt;/p&gt;
                ))}
            &lt;/div&gt;

            &lt;div className="media-library-field"&gt;
                &lt;label className="media-library-label"&gt;Extra field&lt;/label&gt;
                &lt;input
                    className="media-library-input"
                    {...getCustomPropertyInputProps('extra_field')}
                /&gt;

                {getCustomPropertyInputErrors('extra_field').map(error =&gt; (
                    &lt;p key={error} className="media-library-text-error"&gt;
                        {error}
                    &lt;/p&gt;
                ))}
            &lt;/div&gt;
        &lt;/div&gt;
    )}
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
&gt;
    &lt;template
        slot="fields"
        slot-scope="{
            object,
            getCustomPropertyInputProps,
            getCustomPropertyInputListeners,
            getCustomPropertyInputErrors,
            getNameInputProps,
            getNameInputListeners,
            getNameInputErrors,
        }"
    &gt;
        &lt;!-- Vue 3 scoped slot: #fields="{ getCustomPropertyInputProps, … } --&gt;
        &lt;div class="media-library-properties"&gt;
            &lt;div class="media-library-field"&gt;
                &lt;label class="media-library-label"&gt;Name&lt;/label&gt;
                &lt;input
                    class="media-library-input"
                    v-bind="getNameInputProps()"
                    v-on="getNameInputListeners()"
                /&gt;
                &lt;p v-for="error in getNameInputErrors()" :key="error" class="media-library-text-error"&gt;
                    @{{ error }}
                &lt;/p&gt;
            &lt;/div&gt;

            &lt;div class="media-library-field"&gt;
                &lt;label class="media-library-label"&gt;Extra field&lt;/label&gt;
                &lt;input
                    class="media-library-input"
                    v-bind="getCustomPropertyInputProps('extra_field')"
                    v-on="getCustomPropertyInputListeners('extra_field')"
                /&gt;
                &lt;p v-for="error in getCustomPropertyInputErrors('extra_field')" :key="error" class="media-library-text-error"&gt;
                    @{{ error }}
                &lt;/p&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/template&gt;
&lt;/media-library-collection&gt;
        </code></pre>
        </div>
    </div>
    

@endsection

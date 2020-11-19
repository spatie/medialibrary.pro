<div>

    @include('partials.features.techNav')
    <div class="code-center">
        <div x-show="tech === 'blade'">
            <pre><code class="html">&lt;!-- Livewire and Blade --&gt;
&lt;x-media-library-collection
    name="media"
    properties-view="uploads.partials.properties"
/&gt;
                        </code></pre>
        </div>

        <div x-show="tech === 'react'">
            <pre><code class="html"><span class="hljs-comment">/* React */</span>
&lt;MediaLibraryCollection
    name="media"
    propertiesView={({ object }) => (
        &lt;div&gt;{object.attributes.name}&lt;/div&gt;
    )}
/&gt;
                        </code></pre>
        </div>

        <div x-show="tech === 'vue'">
            <pre><code class="html">&lt;!-- Vue --&gt;
&lt;media-library-collection name="media"&gt;
    &lt;div slot="properties" slot-scope="{ object }"&gt;
        &lt;div&gt;@{{ object.attributes.name }}&lt;/div&gt;
    &lt;/div&gt;
&lt;/media-library-collection&gt;
                        </code></pre>
        </div>
    </div>

    <h3 class="mt-5 text-xl font-bold">Made to customize</h3>
    <p class="mt-4 font-medium leading-snug">
        All components have been designed from the ground up to be customized or extended. There are slots for the list, a media item, the props and item fields, so you can play with every part of the components.
    </p>
    <p x-show="tech === 'vue'">
        Learn how to <a class="underline" href="https://spatie.be/docs/laravel-medialibrary/v9/handling-uploads-with-media-library-pro/creating-custom-vue-components">create custom Vue components</a>.
    </p>
    <p x-show="tech === 'react'">
        Learn how to <a class="underline" href="https://spatie.be/docs/laravel-medialibrary/v9/handling-uploads-with-media-library-pro/creating-custom-react-components">create custom React components</a>.
    </p>
</div>

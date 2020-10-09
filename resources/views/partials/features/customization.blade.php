<div>

    @include('partials.features.techNav')

    <div x-show="tech === 'livewire'">
        <pre><code class="html">   
    &lt;!-- Livewire --&gt;  
    &lt;x-media-library-attachment 
        name="media" 
        rules="mimes:png,jpeg,pdf" 
    /&gt;
                    </code></pre>
    </div>

    <div x-show="tech === 'react'">
        <pre><code class="react">   
    /* React */  
    &lt;MediaLibraryAttachment
        name="media"
        initialValue={window.oldValues.media}
        uploadEndpoint={window.uploadEndpoint}
        validation=@{{ accept: ['image/png', 'image/jpeg', 'application/pdf'] }}
        validationErrors={window.errors}
    &gt;&lt;/MediaLibraryAttachment&gt;
                    </code></pre>
    </div>

    <div x-show="tech === 'vue'">
        <pre><code class="vue">   
    /* Vue */  
    …
                    </code></pre>
    </div>
    <h3 class="mt-5 text-xl font-bold">Made to customize</h3>
    <p class="mt-4 font-medium leading-snug">
        All components have been designed from the ground up to be customized or extended. There are slots for the list, an media item, the props and item fields, so you can pay with every part of the components.
    </p>
</div>

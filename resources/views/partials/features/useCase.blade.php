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
        validationRules=@{{ accept: ['image/png', 'image/jpeg', 'application/pdf'] }}
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

    <h3 class="mt-5 text-xl font-bold">Pick use case</h3>
    <p class="mt-4 font-medium leading-snug">
        Out-of-the box components cover use cases from single file uploads, multiple thumbnails to displaying entire collections with custom fields.
        Do you want to roll out your own variant? Read on…
    </p>
</div>

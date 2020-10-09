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

    <h3 class="mt-5 text-xl font-bold">Pick your flavor</h3>
    <p class="mt-4 font-medium leading-snug">
        We have components for React & Vue, as well as Livewire Blade components.
        All integrated seamlessly and playing nicely with your Laravel Media Models.
    </p>
</div>

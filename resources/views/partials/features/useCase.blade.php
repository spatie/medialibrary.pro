<div>
    @include('partials.features.techNav')

    <div x-show="tech === 'blade'">
        <pre><code class="html code-center">&lt;!-- Blade --&gt;  
&lt;x-media-library-collection 
    name="media" 
    rules="mimes:png,jpeg" 
/&gt;
        </code></pre>
    </div>

    <div x-show="tech === 'react'">
        <pre><code class="html code-center"><span class="hljs-comment">/* React */</span>   
&lt;MediaLibraryCollection
    name="media"
    initialValue={media}
    validationRules=@{{ accept: ['image/png', 'image/jpeg'], maxSizeInKB: 1024 }}
    validationErrors={errors}
/&gt;
        </code></pre>
    </div>

    <div x-show="tech === 'vue'">
        <pre><code class="html code-center">&lt;!-- Vue --&gt;  
&lt;media-library-collection
    name="media"
    :initial-value="@{{ $media }}"
    :validation-rules="{ accept: ['image/png', 'image/jpeg'], maxSizeInKB: 1024 }"
    :validation-errors="@{{ $errors }}"
/&gt;
                    </code></pre>
    </div>
    
    <h3 class="mt-5 text-xl font-bold">Pick use case</h3>
    <p class="mt-4 font-medium leading-snug">
        Out-of-the box components cover use cases from single file uploads, multiple thumbnails to displaying entire collections with custom fields.
        Do you want to roll out your own variant? Read on…
    </p>
</div>

<button
    
    class="{{ $attributes['textClass'] ?? '' }} relative group inline-flex items-center font-medium leading-none no-underline select-none whitespace-no-wrap hover:z-10"
>
    <span 
        style="padding: .65em .75em"
        class="{{ $attributes['bgClass'] ?? 'bg-yellow-300' }} rounded-sm font-semibold inline-block z-10">{{ $slot ?? 'Submit' }}</span>
    <span 
        style="top: .2em; left: .2em;"
        class="pointer-events-none absolute pr-1-em h-full w-full flex items-center justify-end rounded-sm transform translate-x-0 group-hover:translate-x-5-em transition-transform duration-200
        text-inherit border-transparent border-4 {{ $attributes['shadowClass'] ?? 'bg-blue-600' }} bg-opacity-25
    ">
        -> 
    </span>    
</button>
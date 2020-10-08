<button
    
    class="{{ $textClass ?? '' }} relative group inline-flex items-center font-medium leading-none no-underline select-none whitespace-no-wrap hover:z-10"
>
    <span 
        style="padding: .65em .75em"
        class="{{ $bgClass ?? 'bg-yellow-300' }} rounded-sm font-semibold inline-block z-10">{{ $label ?? 'Submit' }}</span>
    <span 
        style="top: .2em; left: .2em;"
        class="pointer-events-none absolute pr-2-em h-full w-full flex items-center justify-end rounded-sm transform translate-x-0 group-hover:translate-x-5-em transition-transform duration-200
        text-inherit border-transparent border-4 {{ $shadowClass ?? 'bg-blue-600' }} bg-opacity-25
    ">
        <i style="font-size: .75em" class="far fa-angle-right opacity-0 group-hover:opacity-50 transition-opacity duration-100"></i> 
    </span>    
</button>
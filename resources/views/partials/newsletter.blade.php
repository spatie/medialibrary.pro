<form action="/subscribe" method="post">
    <label for="email" class="block text-center font-bold text-blue-500 text-lg leading-snug | lg:text-xl">
        Subscribe for updates & promotions
    </label>

    @honeypot
    @csrf

    <div class="mt-6 updates">
        <input placeholder="Your email" class="updates-input" type="email" id="email" name="email" required/>

        <button type="submit" class="updates-button">
            <span class="updates-button-icon">-></span>
        </button>
    </div>

    <div class="mt-6 flex items-baseline justify-center text-blue-300 text-xs font-medium">
        @error('email')
            <span class="flex-none mr-2 text-red-500 bg-yellow-300 rounded-full h-6 w-6 inline-flex items-center justify-center font-bold ">!</span>
            <span class="opacity-75">{{ $message }}</span>
        @else
            <span class="opacity-75">Your address will only be used for updates on Medialibrary Pro</span>
        @enderror
    </div>
</form>

@if(session()->has('subscribed'))
<div x-data="{ open: true }" x-show="open">       
        <div class="fixed z-50 fix-z top-0 left-0 h-16 w-full flex items-center justify-center py-8 px-4 bg-green-500 border-b border-black border-opacity-50 shadow-xl {{ flash()->class }} md:text-xl text-white text-center">
            Thanks! You'll hear from us soon

            <a href="#" @click="open = false" class="p-4 opacity-50 hover:opacity-75">&times;</a>
        </div>
</div>
@endif

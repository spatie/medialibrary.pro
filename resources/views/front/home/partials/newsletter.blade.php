@if(session()->has('subscribed'))
    <p class="flex items-center -mt-6 py-4 px-6 shadow-xl bg-green-100 rounded text-xl text-green-500 leading-snug">
        Howdy partner! <br>
        You are now subscribed and will hear from us soon.
    </p>
@else
    <form
        action="{{ action(\App\Http\Front\Controllers\SubscribeToEmailListController::class) }}"
        method="post"
        accept-charset="utf-8"
        class="grid rounded shadow-xl -mt-6 mb-2 | sm:cols-1fr-auto"
    >
        @csrf
        @honeypot
        <input type="email" id="email" name="email" placeholder="Your e-mail address" class="flex-1 h-12 px-4 bg-white rounded-t placeholder-gray-300 border border-r-0 border-transparent focus:border-blue-400 | sm:rounded-tr-none sm:rounded-l" aria-label="E-mail" required>
        <input type="submit" name="submit" id="submit" value="Keep me posted" class="h-12 px-6 bg-blue-500 rounded-t-none rounded-b font-semibold text-sm text-white uppercase tracking-wide hover:bg-blue-400 | sm:rounded-bl-none sm:rounded-r">
    </form>
    @error('email')
        <p class="text-red-500 text-sm">
            Shoot! {{ $message }}
        </p>
    @else
        <p class="text-gray-300 text-sm">
            Subscribe to follow project progress, nothing else.
        </p>
    @enderror

@endif

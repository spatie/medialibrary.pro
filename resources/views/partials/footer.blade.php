<footer class="flex-1 -mt-24 pt-48 px-4 sm:px-16 text-blue-300 bg-blue-900">

    <div class="mx-auto max-w-md w-full">
        @include('partials.newsletter')
    </div>

    <div class="py-16 flex flex-col sm:flex-row justify-center items-center text-xs text-center leading-none font-medium">
        <ul class="flex space-x-4">
            <li><a class="hover:text-blue-200 underline" href="{{ route('privacy') }}">Privacy policy</a></li>
            <li><a class="hover:text-blue-200 underline" href="{{ route('termsOfUse') }}">Terms of use</a></li>
        </ul>

        <span class="hidden sm:inline-block m-4 w-2 h-2 rounded-full bg-yellow-300"></span>

        <span class="mt-4 sm:mt-0">
            Made by <a class="uppercase tracking-wider hover:text-blue-200 underline" href="https://spatie.be">Spatie</a>
        </span>
    </div>
</footer>

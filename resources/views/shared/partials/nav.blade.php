<nav>
    <ul class="nav">
        @guest
            <x-navigation-item :href="route('videos')">Videos</x-navigation-item>
            <x-navigation-item :href="route('docs')">Docs</x-navigation-item>
            <x-navigation-item :href="route('login')">Login</x-navigation-item>
            <li>
                <a class="button" href="/register">
                    Register
                </a>
            </li>
        @endguest

        @auth
            <x-navigation-item :href="route('licenses')">Licenses</x-navigation-item>
            @if(auth()->user()->canAccessVideos())
                <x-navigation-item :href="route('video-course')">Videos</x-navigation-item>
            @else 
                <x-navigation-item :href="route('videos')">Videos</x-navigation-item>
            @endif
            <x-navigation-item :href="route('docs')">Docs</x-navigation-item>
            <x-navigation-item :href="route('purchases')">Purchases</x-navigation-item>

            <li>
                <a href="{{ route('account') }}">
                    <i title="{{ Auth::user()->name }}" class="fas fa-user"></i>
                </a>
            </li>

            <li>
                <x-form-button :action="route('logout')">
                    <i title="Log out" class="fas fa-power-off hover:text-red-500"></i>
                </x-form-button>
            </li>

            @if(auth()->user()->admin)
                <x-navigation-item href="/mailcoach">
                    <i title="Mailcoach" class="fas fa-horse text-blue-500"></i>
                </x-navigation-item>
            @endif
        @endauth
    </ul>
</nav>
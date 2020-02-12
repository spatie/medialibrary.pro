@extends('auth.layouts.auth')

@section('title', 'Login')

@section('auth')
    <h1>{{ __('Login') }}</h1>

    @if (Route::has('password.request'))
    <p class="mb-6">
        <a href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
    </p>
    @endif

    <form class="form-grid" method="POST" action="{{ route('login') }}">

        @csrf

        <div class="form-row">
            <label for="email" class="label">{{ __('E-Mail Address') }}</label>

            @error('email')
                <div class="form-error" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        </div>

        <div class="form-row">
            <label for="password" class="label">{{ __('Password') }}</label>

            @error('password')
                <p class="form-error" role="alert">
                    {{ $message }}
                </p>
            @enderror

            <input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        </div>

        <div class="form-row">
            <label class="checkbox-label" for="remember">
                <input class="checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                {{ __('Remember Me') }}
            </label>
        </div>

        <div class="form-buttons">
            <button type="submit" class="button">
                {{ __('Login') }}
            </button>
        </div>
    </form>

@endsection

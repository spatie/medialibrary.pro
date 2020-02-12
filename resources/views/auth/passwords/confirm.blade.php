@extends('auth.layouts.auth')

@section('auth')

    <h1>{{ __('Confirm Password') }}</h1>

    <p class="mb-6">
        {{ __('Please confirm your password before continuing.') }}
    </p>

    @if (Route::has('password.request'))
        <p class="mb-6">
            <a class="" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
            </a>
        </p>
    @endif

    <form class="form-grid" method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="form-group">
            <label for="password" class="label">{{ __('Password') }}</label>

            @error('password')
                <div class="form-error" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        </div>

        <div class="form-buttons">
            <button type="submit" class="button">
                {{ __('Confirm Password') }}
            </button>
        </div>
    </form>

@endsection

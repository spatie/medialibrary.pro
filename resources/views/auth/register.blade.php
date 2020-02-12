@extends('auth.layouts.auth')

@section('title', 'Register')

@section('auth')

    <h1>{{ __('Create account') }}</h1>

    <p class="alert alert-info">
        To start with Mailcoach, you'll first need an account.
    </p>

    <form class="form-grid" method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-row md:span-2">
            <label for="name" class="label">{{ __('Name') }}</label>

            @error('name')
                <div class="form-error" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <input id="name" type="text" class="input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        </div>

        <div class="form-row md:span-2">
            <label for="email" class="label">{{ __('E-Mail Address') }}</label>

            @error('email')
                <div class="form-error" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
        </div>

        <div class="form-row">
            <label for="password" class="label">{{ __('Password') }}</label>

            @error('password')
                <div class="form-error" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        </div>

        <div class="form-row md:start-2 align-self-end">
            <label for="password-confirm" class="label">{{ __('Confirm Password') }}</label>

            <input id="password-confirm" type="password" class="input" name="password_confirmation" required autocomplete="new-password">
        </div>

        <div class="form-buttons">
            <button type="submit" class="button">
                {{ __('Register') }}
            </button>
        </div>
    </form>

@endsection

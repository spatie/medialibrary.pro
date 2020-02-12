@extends('auth.layouts.auth')

@section('auth')
    <h1>{{ __('Reset Password') }}</h1>

    <form class="form-grid" method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-row">
            <label for="email" class="label">{{ __('E-Mail Address') }}</label>

            @error('email')
                <div class="form-error" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
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

        <div class="form-row">
            <label for="password-confirm" class="label">{{ __('Confirm Password') }}</label>

            <input id="password-confirm" type="password" class="input" name="password_confirmation" required autocomplete="new-password">
        </div>

        <div class="form-buttons">
            <button type="submit" class="button">
                {{ __('Reset Password') }}
            </button>
        </div>
    </form>

@endsection

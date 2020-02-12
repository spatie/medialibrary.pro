@extends('auth.layouts.auth')

@section('auth')

    <h1>{{ __('Reset Password') }}</h1>

        @if (session('status'))
            <p class="alert alert-success" role="alert">
                {{ session('status') }}
            </p>
        @endif

        <form class="form-grid" method="POST" action="{{ route('password.email') }}">
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

            <div class="form-buttons">
                <button type="submit" class="button">
                    {{ __('Send Password Reset Link') }}
                </button>
            </div>
        </form>

@endsection
